<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Trabajador;
use Illuminate\Database\QueryException;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = Empleado::paginate();
        $trabajadores = Trabajador::paginate();
        return view('empleado.index', compact('empleados', 'trabajadores'))
            ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
    }

    public function create()
    {
        $trabajadors = Trabajador::all();
        $empleado = new Empleado();

        return view('empleado.create', compact('empleado', 'trabajadors'));
    }

    public function store(Request $request)
    {
        try{
            $empleado = Empleado::create($request->all());
            return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado correctamente.');
        }catch(\Illuminate\Database\QueryException $e){
            if ($e->errorInfo[1] == 1062){
                return redirect()->route('empleados.create')
                ->with('error', 'Ya existe un empleado con ese trabajador');
            }else{
                throw $e;
            }
        }


    }


    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    public function edit($id)
    {
        $trabajadors = Trabajador::all();
        $empleado = Empleado::find($id);

        return view('empleado.edit', compact('empleado', 'trabajadors'));
    }

    public function update(Request $request, Empleado $empleado)
    {

        try{
            $empleado->update($request->all());
            return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
        }catch(\Illuminate\Database\QueryException $e){
            if ($e->errorInfo[1] == 1062){
                return redirect()->route('empleados.edit', $empleado->id)
                ->with('error', 'Está actualizando otro empleado');
            }else{
                throw $e;
            }
        }
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
