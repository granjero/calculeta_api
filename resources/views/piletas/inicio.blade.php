<div id="content" class="f-row flex-wrap:wrap">
    <section class="box flex-grow:2">
        <h3>Nados</h3>
        <table class="container width:100%">
            <tr>
                <th>ver</th>
                <th>fecha</th>
                <th>piletas</th>
                <th>metros</th>
                <th>tiempo</th>
            </tr>
            @foreach($piletas as $pileta)
            <tr>
                <td><span class="clickable" hx-get="/pileta/{{ $pileta->id }}" hx-target="#contenido" hx-swap="ineerHTML">🏊</span></td>
                <td>{{ \Carbon\Carbon::parse($pileta->fecha)->format('d-m-Y') }}</td>
                <td>{{ $pileta->totalPiletas }}</td>
                <td>{{ $pileta->totalPiletas * 50 }}</td>
                <td>{{ floor($pileta->tiempoTotal/60) }}m {{ floor($pileta->tiempoTotal%60) }}s</td>
            </tr>
            @endforeach
        </table>
    </section>
</div>
