@extends('layouts.app')

@section('template_title')
    Gerente
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container text-center mb-3">
                <form action="" method="POST">
                    <a class="btn btn-sm btn-dark" href="{{ route('trabajadors.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Trabajadores') }}</a>
                    <a class="btn btn-sm btn-dark " href="{{ route('empleados.index') }}"><i class="fa fa-fw fa-eye"></i> {{ __('Empleado') }}</a>
                    <a class="btn btn-sm btn-dark" href="{{ route('trabajadors.index') }}"><i class="fa fa-fw fa-edit"></i> {{ __('Personas') }}</a>
                </form>
                </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gerente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gerentes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-error">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
										<th>ID Persona</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Teléfono</th>
										<th>Salario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gerentes as $gerente)
                                        <tr>
                                            <td>{{ $gerente->id}}</td>
                                            <td>{{$gerente->trabajador->persona_id}}</td>
                                            <td>{{ $gerente->trabajador->persona->nombre }}</td>
                                            <td>{{ $gerente->trabajador->persona->apellidos }}</td>
											<td>{{ $gerente->trabajador->telefono }}</td>
											<td>{{ $gerente->salario }}</td>

                                            <td>
                                                <form action="{{ route('gerentes.destroy',$gerente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gerentes.show',$gerente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gerentes.edit',$gerente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $gerentes->links() !!}
            </div>
        </div>
    </div>
@endsection
