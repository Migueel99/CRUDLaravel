@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container text-center mb-3">
            <form action="" method="POST">
                <a class="btn btn-sm btn-dark" href="{{ route('gerentes.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Gerentes') }}</a>
                <a class="btn btn-sm btn-dark " href="{{ route('trabajadors.index') }}"><i class="fa fa-fw fa-eye"></i> {{ __('Trabajadores') }}</a>
                <a class="btn btn-sm btn-dark" href="{{ route('personas.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Personas') }}</a>
            </form>
            </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Empleado') }}
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
                                        <th>ID Empleado</th>
                                        <th>Trabajador Id</th>
										<th>Nombre</th>
                                        <th>Apellidos</th>
										<th>Horastrabajadas</th>
										<th>Precioporhora</th>
                                        <th>Salario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ $empleado->id}}</td>
											<td>{{ $empleado->trabajador_id }}</td>
                                            <td>{{ $empleado->trabajador->persona->nombre }}</td>
                                            <td>{{ $empleado->trabajador->persona->apellidos }}</td>
											<td>{{ $empleado->horasTrabajadas }}</td>
											<td>{{ $empleado->precioPorHora }}</td>
                                            <td>{{ $empleado->calcularSueldo() }}</td>
                                            <td>

                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleados.show',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection
