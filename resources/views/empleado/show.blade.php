@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Trabajador Id:</strong>
                            {{ $empleado->trabajador_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre y Apellidos:</strong>
                            {{ $empleado->trabajador->persona->nombre }}
                            {{ $empleado->trabajador->persona->apellidos }}

                        </div>
                        <div class="form-group">
                            <strong>Horas Trabajadas:</strong>
                            {{ $empleado->horasTrabajadas }}
                        </div>
                        <div class="form-group">
                            <strong>Precio por hora:</strong>
                            {{ $empleado->precioPorHora }}
                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ $empleado->calcularSueldo() }}


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
