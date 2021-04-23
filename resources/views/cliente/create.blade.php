@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/cliente') }}" method="post">
@csrf
@include('cliente.form', ['modo'=>'Crear']);

</form>

</div>
@endsection