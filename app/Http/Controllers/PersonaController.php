<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::paginate();

        return view('persona.index', compact('personas'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }


    public function create()
    {
        $persona = new Persona();
        return view('persona.create', compact('persona'));
    }

    public function store(Request $request)
    {

        $persona = Persona::create($request->all());

        return redirect()->route('personas.index')
            ->with('success', 'Persona creada correctamente.');
    }

    public function show($id)
    {
        $persona = Persona::find($id);

        return view('persona.show', compact('persona'));
    }

    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('persona.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {

      try{
        $persona->update($request->all());
        return redirect()->route('personas.index')
            ->with('success', 'Persona editada correctamente');
      } catch(\Illuminate\Database\QueryException $e){
        if ($e->errorInfo[1] == 1062){
            return redirect()->route('personas.edit', $persona->id)
            ->with('error', 'Está actualizando otra persona');
        }else{
            throw $e;
        }
    }

    }
    public function destroy($id)
    {
        $persona = Persona::find($id)->delete();

        return redirect()->route('personas.index')
            ->with('success', 'Persona eliminada correctamente');
    }
}
