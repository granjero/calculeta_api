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
                label: 'Tiempo (minutos:segundos)',
                data: [ {!! $grafico->segundos !!} ],
                fill: false,
                borderColor: 'rgb(12, 150, 12)',
                tension: 0
            }]
        };
        let config = {
            type: 'line',
            data:data,
            options: {
                scales: {
                    y: {
                        ticks: {
                            callback:
                                function(segundos) {
                                    return formatoTiempo(segundos)
                                }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(valor) {
                                let segundos = valor.raw;
                                let minutosSegundos = formatoTiempo(segundos);
                                return 'Tiempo: ' + minutosSegundos;
                            }
                        }
                    }
                }
            }
        };
        new Chart(grafico, config);
    }
    // Helper function to convert seconds to mm:ss format
    function formatoTiempo(tiempo) {
        const minutos = Math.floor(tiempo / 60);
        const segundos = tiempo % 60;
        return `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
    }

    grafico();
</script>
