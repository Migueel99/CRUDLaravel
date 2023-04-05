
<form method="POST" action="{{ route('gerentes.store') }}">
    @csrf
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
 @endif
    <div class="selector mb-2">
        <label for="Trabajador">Trabajador</label>
        <select name="trabajador_id" class="form-select">
            <option selected>Seleccione un trabajador</option>
            @foreach ($trabajadors as $trabajador)
                <option value="{{ $trabajador->id }}"> {{ $trabajador->persona->nombre }} {{ $trabajador->persona->apellidos }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="salario">Salario</label>
        <input type="text" class="form-control" name="salario" id="salario" required>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-dark mt-2">Agregar gerente</button>
    </div>
</form>
