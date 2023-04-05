@extends('layouts.app')

@section('template_title')
    Trabajador
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container text-center mb-3">
            <form action="" method="POST">
                <a class="btn btn-sm btn-dark" href="{{ route('gerentes.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Gerentes') }}</a>
                <a class="btn btn-sm btn-dark " href="{{ route('empleados.index') }}"><i class="fa fa-fw fa-eye"></i> {{ __('Empleado') }}</a>
                <a class="btn btn-sm btn-dark" href="{{ route('personas.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Personas') }}</a>
            </form>
            </div>
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Trabajador') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('trabajadors.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Trabajador') }}
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
                                        <th>Persona Id</th>
                                        <th>Telefono</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Salario</th>
                                        <th>Tipo Trabajo</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($trabajadors as $trabajador)
                                        <tr>
                                            <td>{{ $trabajador->id }}</td>

                                            <td>{{ $trabajador->persona_id }}</td>
                                            <td>{{ $trabajador->telefono }}</td>
                                            <td>{{ $trabajador->persona->nombre }}</td>
                                            <td>{{ $trabajador->persona->apellidos }}</td>
                                            <td>
                                            @if (isset($trabajador->gerente->salario))
                                                {{ $trabajador->gerente->salario}}
                                            @endif
                                            @if (($trabajador->empleado)!=null)
                                            {{ $trabajador->empleado->calcularSueldo()}}
                                            @endif

                                            </td>
                                            <td>
                                                @if (isset($trabajador->gerente))
                                                    Gerente
                                                @else
                                                    Empleado
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('trabajadors.destroy', $trabajador->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('trabajadors.show', $trabajador->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('trabajadors.edit', $trabajador->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $trabajadors->links() !!}
            </div>
        </div>
    </div>
@endsection
