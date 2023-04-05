<form method="POST" action="{{ route('trabajadors.store') }}">
    @csrf

    <div class="selector mb-2">
        <label for="Persona">Persona</label>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
     @endif
        <select name="persona_id" class="form-select ">
            <option selected>Seleccione una persona</option>

            @foreach ($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombre }} {{$persona->apellidos}}</option>
            @endforeach

        </select>
    </div>

    <div>
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-dark mt-2">Agregar trabajador</button>
    </div>
</form>
