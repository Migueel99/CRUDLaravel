
<form method="POST" action="{{ route('personas.store') }}">
    @csrf

    <div>
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos') }}" required>
    </div>
    <div>
        <label for="edad" class="mt-3">Edad</label>
        <input type="text"  class="form-control"  name="edad" id="edad"  required>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-dark mt-2">Agregar persona</button>
    </div>
</form>
