@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times; </span>
</button>
</div>
@endif
<a href="{{ url('cliente/create') }}" class="btn btn-success">Crear un nuevo cliente</a>
<br>
<br>
<table class="table table-light">
    
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>

        @foreach($clientes as $cliente)
        <tr>
            <td> {{ $cliente->id }} </td>
            <td> {{ $cliente->Nombre }} </td>
            <td> {{ $cliente->ApellidoPaterno }} </td>
            <td> {{ $cliente->ApellidoMaterno }} </td>
            <td> {{ $cliente->Correo }} </td>
            <td> {{ $cliente->Telefono }} </td>
            <td> 
            
            <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}" class="btn btn-warning">
            Editar
            </a>
            
            | 
            
            <form action="{{ url('/cliente/'.$cliente->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
            
            </form>
            
            
            </td>            
        </tr>
        @endforeach
    </tbody>

</table>
{!! $clientes->links() !!}

</div>
@endsection