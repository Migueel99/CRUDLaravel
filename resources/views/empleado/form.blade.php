<form method="POST" action="{{ route('empleados.store') }}">
    @csrf
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
 @endif
    <div class="selector mb-2">

        <label for="Trabajador">Trabajador</label>
        <select name="trabajador_id" class="form-select ">
            <option selected>Seleccione un trabajador</option>
            @foreach ($trabajadors as $trabajador)
                <option value="{{ $trabajador->id }}">{{ $trabajador->persona->nombre }} {{ $trabajador->persona->apellidos }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="horasTrabajadas">Horas Trabajadas</label>
        <input type="text" class="form-control" name="horasTrabajadas" id="horasTrabajadas"  required>
    </div>
    <div>
        <label for="precioPorHora" class="mt-3">Precio por Horas</label>
        <input type="text"  class="form-control"  name="precioPorHora" id="precioPorHora"  required>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-dark mt-2">Agregar empleado</button>
    </div>
</form>
