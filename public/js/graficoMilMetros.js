
    let grafico = document.getElementById('grafico');
    let data = {
        labels: [{!! $grafico['fecha']!!}],
        datasets: [{
            label: 'Segundos',
            data: [{!! $grafico['segundos']!!}],
        fill: false,
        borderColor: 'rgb(12, 150, 12)',
        tension: 0.01
        }]
    };
    new Chart(grafico, {
        type: "line",
        data: data,
    });

    delete grafico;
    delete data;
