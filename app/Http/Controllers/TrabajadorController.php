<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use App\Models\Persona;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{

    public function index()
    {
        $trabajadors = Trabajador::paginate();

        return view('trabajador.index', compact('trabajadors'))
            ->with('i', (request()->input('page', 1) - 1) * $trabajadors->perPage());
    }


    public function create()
    {
        $personas = Persona::all();
        $trabajador = new Trabajador();
        return view('trabajador.create', compact('trabajador','personas'));
    }

    public function store(Request $request)
    {
        try{
            Trabajador::create($request->all());
            return redirect()->route('trabajadors.index')
            ->with('success', 'Trabajador creado correctamente.');
        }
        catch(\Illuminate\Database\QueryException $e){
            if ($e->errorInfo[1] == 1062){
                return redirect()->route('trabajadors.create')
                ->with('error', 'Ya existe un trabajador con esa persona');
            }else{
                throw $e;
            }
        }
    }


    public function show($id)
    {

        $trabajador = Trabajador::find($id);

        return view('trabajador.show', compact('trabajador'));
        }


    public function edit($id)
    {
        $personas = Persona::all();
        $trabajador = Trabajador::find($id);

        return view('trabajador.edit', compact('trabajador', 'personas'));
    }

    public function update(Request $request, Trabajador $trabajador)
    {
        $personas = Persona::all();

        try{
            $trabajador->update($request->all());
            return redirect()->route('trabajadors.index')
            ->with('success', 'Trabajador actualizado correctamente.');
        }
        catch(\Illuminate\Database\QueryException $e){
            if ($e->errorInfo[1] == 1062){
                return redirect()->route('trabajadors.edit', $trabajador->id)
                ->with('error', 'Está actualizando otro trabajador');
            }else{
                throw $e;
            }
        }

    }

    public function destroy($id)
    {
        $trabajador = Trabajador::find($id)->delete();

        return redirect()->route('trabajadors.index')
            ->with('success', 'Trabajador eliminado correctamente');
    }
}
