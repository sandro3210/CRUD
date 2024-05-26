<?php
use App\Models\Inquilino;
use App\Models\Servicio;
use Illuminate\Http\Request;




class InquilinoController extends Controller
{
    public function index()
    {
        $inquilinos = Inquilino::with('servicios')->get();
        return view('inquilinos.index', compact('inquilinos'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        return view('inquilinos.create', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:inquilinos,email',
            'servicios' => 'required|array',
            'servicios.*' => 'exists:servicios,id',
        ]);

        $inquilino = Inquilino::create($request->only('nombre', 'email'));

        if ($request->has('servicios')) {
            $inquilino->servicios()->attach($request->servicios);
        }

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino creado exitosamente');
    }

    public function show($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        return view('inquilinos.show', compact('inquilino'));
    }

    public function edit($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        $servicios = Servicio::all();
        return view('inquilinos.edit', compact('inquilino', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:inquilinos,email,' . $id,
            'servicios' => 'required|array',
            'servicios.*' => 'exists:servicios,id',
        ]);

        $inquilino = Inquilino::findOrFail($id);
        $inquilino->update($request->only('nombre', 'email'));

        $inquilino->servicios()->sync($request->servicios);

        return redirect()->route('inquilinos.index')->with('success', 'Inquilino actualizado exitosamente');
    }

    public function destroy($id)
    {
        $inquilino = Inquilino::findOrFail($id);
        $inquilino->servicios()->detach();
        $inquilino->delete();
        return redirect()->route('inquilinos.index')->with('success', 'Inquilino eliminado exitosamente');
    }
}

