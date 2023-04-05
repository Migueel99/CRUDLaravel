@extends('layouts.app')

@section('template_title')
    Persona
@endsection

@section('content')
<div class="container text-center mb-3">
    <form action="" method="POST">
        <a class="btn btn-sm btn-dark" href="{{ route('trabajadors.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Trabajadores') }}</a>
        <a class="btn btn-sm btn-dark " href="{{ route('empleados.index') }}"><i class="fa fa-fw fa-eye"></i> {{ __('Empleado') }}</a>
        <a class="btn btn-sm btn-dark" href="{{ route('gerentes.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Gerente') }}</a>
    </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Persona') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Añadir Persona') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
                                        <th>Telefono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <td>{{$persona->id }}</td>

                                            <td>{{ $persona->nombre }}</td>
                                            <td>{{ $persona->apellidos }}</td>
                                            <td>{{ $persona->edad }}</td>
                                            <td>@if (isset($persona->trabajador->telefono))
                                                    {{ $persona->trabajador->telefono }}
                                                @else
                                                    No tiene
                                            @endif</td>

                                            <td>
                                                <form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('personas.show', $persona->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('personas.edit', $persona->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $personas->links() !!}
            </div>
        </div>
    </div>
@endsection
