use App\Models\Propietario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    public function index()
    {
        $propietarios = Propietario::with('departamentos')->get();
        return view('propietarios.index', compact('propietarios'));
    }

    public function create()
    {
        return view('propietarios.create');
    }

    public function store(Request $request)
    {
        $propietario = Propietario::create($request->all());
        $propietario->departamentos()->createMany($request->departamentos);
        return redirect()->route('propietarios.index')->with('success', 'Propietario creado exitosamente');
    }

    public function show($id)
    {
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.show', compact('propietario'));
    }

    public function edit($id)
    {
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.edit', compact('propietario'));
    }

    public function update(Request $request, $id)
    {
        $propietario = Propietario::findOrFail($id);
        $propietario->update($request->all());
        foreach ($request->departamentos as $departamento) {
            Departamento::updateOrCreate(['id' => $departamento['id']], $departamento);
        }
        return redirect()->route('propietarios.index')->with('success', 'Propietario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $propietario = Propietario::findOrFail($id);
        $propietario->departamentos()->delete();
        $propietario->delete();
        return redirect()->route('propietarios.index')->with('success', 'Propietario eliminado exitosamente');
    }
}
