@extends('layout.layout')
@section('titulo', 'Calculeta')

@section('contenido')
<p class="center">
    <img class="clickable" hx-get="/inicio" hx-swap="innerHTML" hx-target="#contenido" hx-indicator="#pensando"
        src="{{ asset('img/calculeta.png') }}" alt="Calculeta Logo">
</p>
@endsection
