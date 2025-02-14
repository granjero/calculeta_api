<div class="">
    @include('layout.breadcrumbs')
    <section class="box flex-grow:3">
        <hr>
        <h3 class="inline">Series de 1000mts</h3>
        <dl>
            <dt>Record</dt>
            <dd><strong>Fecha: </strong> {{ $grafico->menorTiempoFecha }}</dd>
            <dd><strong> Tiempo: </strong> {{ $grafico->menorTiempo }}</dd>
        </dl>
        <div>
            <canvas id="grafico" width="400" height="200"></canvas>
        </div>
        <hr>

    </section>
</div>
<script>
    function grafico() {
        let grafico = document.getElementById('grafico');
        let data = {
            labels: [ {!! $grafico->fecha !!} ],
            datasets: [{
                label: 'Segundos',
                data: [ {!! $grafico->segundos !!} ],
                fill: false,
                borderColor: 'rgb(12, 150, 12)',
                tension: 0
            }]
    };
    new Chart(grafico, {
        type: "line",
        data: data,
    });
    }
    grafico();
</script>
