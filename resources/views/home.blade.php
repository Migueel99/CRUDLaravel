@extends('layouts.app')

@section('content')
<div class="container text-center mb-3">
<form action="" method="POST">
    <a class="btn btn-sm btn-dark " href="http://127.0.0.1:8000/personas"><i class="fa fa-fw fa-eye"></i> {{ __('Personas') }}</a>
    <a class="btn btn-sm btn-dark" href="http://127.0.0.1:8000/trabajadors"><i class="fa fa-fw fa-edit"></i> {{ __('Trabajadores') }}</a>
    <a class="btn btn-sm btn-dark " href="http://127.0.0.1:8000/empleados"><i class="fa fa-fw fa-eye"></i> {{ __('Empleado') }}</a>
    <a class="btn btn-sm btn-dark" href="http://127.0.0.1:8000/gerentes"><i class="fa fa-fw fa-edit"></i> {{ __('Gerente') }}</a>
</form>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
