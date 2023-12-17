<div class="">
    <section class="box flex-grow:3">
        <div>
            <h2 class="inline">Nado</h2>
            <h3 class="inline">{{ \Carbon\Carbon::parse($pileta->fecha)->format('d/m/Y') }}</h3>
            <ul role="list" class="f-switch dense">
                <li class="box">
                    <h2 class="<h4>">Piletas</h2>
                    <p>{{ $pileta->piletas }}</p>
                </li>
                <li class="box">
                    <h2 class="<h4>">Distancia</h2>
                    <p> {{ $pileta->piletas * 50 }} mts.</p>
                </li>
                <li class="box">
                    <h2 class="<h4>">Tiempo</h2>
                    <p> {{ floor($pileta->tiempoTotal/60) }}m {{ $pileta->tiempoTotal%60 }}s</p>
                </li>
            </ul>
        </div>
    </section>
    @foreach($pileta->series as $id => $serie)
        <div>
            <details>
                <summary>
                    <span class="chip ok"> <strong>{{ count($serie) - 1 }} </strong>piletas</span>
                    <span class="chip purpura"><strong> tiempo {{ $pileta->datosSeries[$id]['P'] }}</strong></span>
                    <span class="chip warn"><strong> descanso {{ $pileta->datosSeries[$id]['D'] }}</strong></span>
                    <span class="chip info"><strong> promedio {{ $pileta->datosSeries[$id]['promedio'] }}</strong></span>
                    </span>
                </summary>
                    <br/>
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
            </details>
        </div>
    @endforeach
</div>
