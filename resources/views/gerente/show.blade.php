@extends('layouts.app')

@section('template_title')
    Mostrar Gerente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Gerente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gerentes.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Trabajador Id:</strong>
                            {{ $gerente->trabajador_id }}
                        </div>

                        <div class="form-group">
                            <strong>Nombre y Apellidos:</strong>
                            {{ $gerente->trabajador->persona->nombre }}
                            {{ $gerente->trabajador->persona->apellidos }}

                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ $gerente->salario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
