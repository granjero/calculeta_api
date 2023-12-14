@extends('layout.layout')
@section('titulo', 'Piletas')

@section('contenido')
<h1>Panel</h1>

<div class="">
    <section class="box flex-grow:3">
        <div>
            <h2>Nado</h2>
            <ul role="list" class="f-switch dense">
                <li class="box">
                    <h2 class="<h4>">Fecha</h2>
                    <p>{{ \Carbon\Carbon::parse($pileta->fecha)->format('d/m/Y') }}</p>
                </li>
                <li class="box">
                    <h2 class="<h4>">Piletas</h2>
                    <p>{{ $pileta->piletas }} o {{ $pileta->piletas * 50 }}mts.</p>
                </li>
                <li class="box">
                    <h2 class="<h4>">Tiempo</h2>
                    <p> {{ floor($pileta->tiempoTotal/60) }}m {{ $pileta->tiempoTotal%60 }}s</p>
                </li>
            </ul>
        </div>
    </section>
    <section class="box flex-grow:3">
        @foreach($pileta->series as $serie)
                @php
                    $tiemposSerie['P'] = 0;
                    $tiemposSerie['D'] = 0;
                @endphp
            @foreach($serie as $datos)
                {{-- <pre> {{ var_dump($datos) }}</pre> --}}
                @php
                    $dato = explode(':', $datos);
                    if ($dato[0] == 'P') $tiemposSerie['P'] += $dato[1];
                    else $tiemposSerie['D'] += $dato[1];
                @endphp
            @endforeach
            <div>
                <div class="box info">
                    <p class="chip ok">
                    Serie de
                    <strong> {{ count($serie) - 1 }} </strong>
                    piletas en
                    <strong> {{ floor($tiemposSerie['P']/60) }}m {{ floor($tiemposSerie['P']%60) }}s </strong>
                    con descando de
                    <strong> {{ floor($tiemposSerie['D']/60) }}m {{ floor($tiemposSerie['D']%60) }}s</p> </strong>
                    {{-- <pre> {{ var_dump($serie) }}</pre> --}}
                    <h3>Piletas</h3>
                    <table class="container width:100%">
                    <tr>
                        <th>#</th>
                        <th>Tiempo</th>
                    </tr>
                        @foreach($serie as $datos)
                        @if(!$loop->last)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ substr($datos, 2) }} segundos</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>

            </div>
        @endforeach
    </section>
    @endsection
