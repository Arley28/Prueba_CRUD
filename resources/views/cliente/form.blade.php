<h1>{{ $modo }} Cliente</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">

<ul>
    
@foreach( $errors->all() as $error)

<li>

{{ $error }}

</li>
@endforeach

</ul>

</div>

@endif

<div class="form-group">
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($cliente->Nombre)?$cliente->Nombre:old('Nombre') }}" >
</div>
<div class="form-group">
<label for="ApellidoPaterno"> Apellido Paterno </label>
<input type="text" class="form-control" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ isset($cliente->ApellidoPaterno)?$cliente->ApellidoPaterno:old('ApellidoPaterno') }}">
</div>
<div class="form-group">
<label for="ApellidoMaterno"> Apellido Materno </label>
<input type="text" class="form-control" name="ApellidoMaterno" id="ApellidoMaterno" value="{{ isset($cliente->ApellidoMaterno)?$cliente->ApellidoMaterno:old('ApellidoMaterno') }}">
</div>
<div class="form-group">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" id="Correo" value="{{ isset($cliente->Correo)?$cliente->Correo:old('Correo') }}">
</div>
<div class="form-group">
<label for="Telefono"> Telefono </label>
<input type="number" class="form-control" name="Telefono" id="Telefono" value="{{ isset($cliente->Telefono)?$cliente->Telefono:old('Telefono') }}">
</div>
<input type="submit" class="btn btn-success" value="{{ $modo }} Datos">
<a href="{{ url('cliente') }}" class="btn btn-primary">Regresar</a>