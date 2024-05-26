<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Departamento;
use App\Models\Inquilino;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function create()
    {
        return view('fotos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|in:departamento,inquilino',
            'modelo_id' => 'required|integer',
            'url' => 'required|string|max:255',
        ]);

        if ($request->tipo === 'departamento') {
            $modelo = Departamento::findOrFail($request->modelo_id);
        } elseif ($request->tipo === 'inquilino') {
            $modelo = Inquilino::findOrFail($request->modelo_id);
        }

        $foto = new Foto();
        $foto->url = $request->url;
        $modelo->fotos()->save($foto);

        return redirect()->route('fotos.create')->with('success', 'Foto creada exitosamente');
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        $foto->delete();
        return redirect()->route('fotos.index')->with('success', 'Foto eliminada exitosamente');
    }
}
