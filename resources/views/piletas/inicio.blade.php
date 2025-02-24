<div class="">
    <div>
        @include('layout.breadcrumbs')
    </div>
    <section class="box flex-grow:3">
        <h2 class="inline">Nados</h2>
        <div class="overflow:auto ">
            <table class="container width:100%">
                <tr>
                    <th>ver</th>
                    <th>fecha</th>
                    <th>piletas</th>
                    <th>distancia</th>
                    <th>tiempo</th>
                </tr>
                @foreach($piletas as $pileta)
                <tr class="clickable"
                    hx-get="/pileta/{{ $pileta->id }}"
                    hx-indicator="#pensando"
                    hx-target="#contenido"
                    hx-swap="ineerHTML">
                    <td><span>🏊</span></td>
                    <td>{{ \Carbon\Carbon::parse($pileta->fecha)->format('d-m-Y') }}</td>
                    <td>{{ $pileta->totalPiletas }}</td>
                    <td>{{ $pileta->totalPiletas * 50 }} mts</td>
                    <td>{{ floor($pileta->tiempoTotal/60) }}m {{ floor($pileta->tiempoTotal%60) }}s</td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>
