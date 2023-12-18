@extends('layout.layout')
@section('titulo', 'Piletas')

@section('contenido')
<div id="content" class="f-row flex-wrap:wrap">
    <section class="box flex-grow:2">
        <h3>Nados</h3>
        <table class="container width:100%">
            <tr>
                <th>fecha</th>
                <th>piletas</th>
                <th>metros</th>
                <th>tiempo</th>
            </tr>
            @foreach($piletas as $pileta)
            <tr>
                <td><a hx-indicator="#pensando" hx-get="/pileta/{{ $pileta->id }}"> {{ \Carbon\Carbon::parse($pileta->fecha)->format('d-m-Y') }}</a></td>
                <td>{{ $pileta->totalPiletas }}</td>
                <td>{{ $pileta->totalPiletas * 50 }}</td>
                <td>{{ floor($pileta->tiempoTotal/60) }}m {{ floor($pileta->tiempoTotal%60) }}s</td>
            </tr>
            @endforeach
        </table>
    </section>
@endsection
