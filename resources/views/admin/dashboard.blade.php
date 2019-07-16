@extends('admin.master')
@section('content')
    <h1>saassa</h1>
    <canvas id="grafik_lav"></canvas>
    <script type="text/javascript" src="http://www.chartjs.org/dist/2.7.2/Chart.bundle.js"></script>
    <script type="text/javascript" src="http://www.chartjs.org/samples/latest/utils.js"></script>
    <script type="text/javascript">
        var color = Chart.helpers.color;
        var barChartData = {
        labels: {!! $label !!},
        datasets: [{
            label: 'Jumlah Pembelian Per Produk',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: {!! $value !!},
            }],
        };
        window.onload = function() {
            var ctx = document.getElementById('grafik_lav').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Data Produk'
                    }
                }
            });
        };
    </script>
@endsection