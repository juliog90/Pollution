@extends('layouts.user')

{{-- Content --}}
@section('content')
<section class="contenedor seccion" style="width: 90%; text-align:center;padding:10px;">
    <div class="icono" style="padding:15px;">
		<canvas id="canvas"></canvas>
	</div>
</section>

<script type="text/javascript">

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

(function(global) {
	var MONTHS = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	];

	var COLORS = [
		'#4dc9f6',
		'#f67019',
		'#f53794',
		'#537bc4',
		'#acc236',
		'#166a8f',
		'#00a950',
		'#58595b',
		'#8549ba'
	];

	var Samples = global.Samples || (global.Samples = {});
	var Color = global.Color;

	Samples.utils = {
		// Adapted from http://indiegamr.com/generate-repeatable-random-numbers-in-js/
		srand: function(seed) {
			this._seed = seed;
		},

		rand: function(min, max) {
			var seed = this._seed;
			min = min === undefined ? 0 : min;
			max = max === undefined ? 1 : max;
			this._seed = (seed * 9301 + 49297) % 233280;
			return min + (this._seed / 233280) * (max - min);
		},

		numbers: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 1;
			var from = cfg.from || [];
			var count = cfg.count || 8;
			var decimals = cfg.decimals || 8;
			var continuity = cfg.continuity || 1;
			var dfactor = Math.pow(10, decimals) || 0;
			var data = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = (from[i] || 0) + this.rand(min, max);
				if (this.rand() <= continuity) {
					data.push(Math.round(dfactor * value) / dfactor);
				} else {
					data.push(null);
				}
			}

			return data;
		},

		labels: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 100;
			var count = cfg.count || 8;
			var step = (max - min) / count;
			var decimals = cfg.decimals || 8;
			var dfactor = Math.pow(10, decimals) || 0;
			var prefix = cfg.prefix || '';
			var values = [];
			var i;

			for (i = min; i < max; i += step) {
				values.push(prefix + Math.round(dfactor * i) / dfactor);
			}

			return values;
		},

		months: function(config) {
			var cfg = config || {};
			var count = cfg.count || 12;
			var section = cfg.section;
			var values = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = MONTHS[Math.ceil(i) % 12];
				values.push(value.substring(0, section));
			}

			return values;
		},

		color: function(index) {
			return COLORS[index % COLORS.length];
		},

		transparentize: function(color, opacity) {
			var alpha = opacity === undefined ? 0.5 : 1 - opacity;
			return Color(color).alpha(alpha).rgbString();
		}
	};

	Samples.utils.srand(Date.now());

}(this));
    var temperatures;
    var humidities;
    $(document).ready(function() {
        $('a[href="/"]').removeClass("active");
		$('#logo').addClass("active");
        $('a[href="/dashboard"]').addClass("active");
        $('#headerInicio').css("height", "20vh");
        $('#headerInicio').css("min-height", "auto");
        $('#textHeader').html("");
        drawMainChart(false);
        setInterval(() => {
            drawMainChart(true);
        }, 10000);
    });

    function drawMainChart(request) {
        if (request) {
            $.ajax({
                url: 'dashboard/update',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: null,
                success: function(data, textStatus, xhr) {
                    if( xhr.status === 200 ) {
                        // Updating main chart.
                        temperatures = data.temperatures;
                        humidities = data.humidities;
                        window.myLine.data.labels.splice(0, 1); // Remove first label.
                        var totalTemp = temperatures.length;
                        var totalHum = humidities.length;
                        window.myLine.data.labels.push(temperatures[totalTemp-1].hour); // Se actualiza la hora.
                        window.myLine.data.datasets[0].data[9] = temperatures[totalTemp - 1].grade; // Actualiza los grados.
                        window.myLine.data.datasets[1].data[9] = humidities[totalHum - 1].grade; // Actualiza los grados.
                        window.myLine.update();
                    } else {
                        console.log("Ajax not successed");
                    }
                }
            });
        } else {
            // Get data from controller and pass to js variable.
            temperatures = {!! json_encode($temperatures->toArray()) !!};
            humidities = {!! json_encode($humidities->toArray()) !!};
            createMainChart();
        }

        function getLabels() {
            var qty = temperatures.length; 
            // BUG: If the data is less than 10, make an error.
            return [temperatures[qty-10].hour, temperatures[qty-9].hour, temperatures[qty-8].hour, temperatures[qty-7].hour, temperatures[qty-6].hour, temperatures[qty-5].hour, temperatures[qty-4].hour, temperatures[qty-3].hour, temperatures[qty-2].hour, temperatures[qty-1].hour];
        }

        function getData(data) {
            if (data == "temperature") {
                var typeData = temperatures;
            } else if (data == "humidity") {
                var typeData = humidities;
            }
            var total = typeData.length;
            return [typeData[total-10].grade, typeData[total-9].grade, typeData[total-8].grade, typeData[total-7].grade, typeData[total-6].grade, typeData[total-5].grade, typeData[total-4].grade, typeData[total-3].grade, typeData[total-2].grade, typeData[total-1].grade];
        }

        function getMinimum() {
            var minimum = 0;
            var index = 0;
            var total = temperatures.length;
            // For temperatures.
            for (var i = 0;i < 10; i++) {
                index = index - 1;
                if (temperatures[total + index].grade < minimum) {
                    minimum = temperatures[total + index].grade;
                }
            }
            var total = humidities.length;
            var index = 0;
            // For humidities.
            for (var x = 0;x < 10; x++) {
                index = index - 1;
                if (humidities[total + index].grade < minimum) {
                    minimum = humidities[total + index].grade;
                }
            }
            return minimum;
        }

        function getMaximum() {
            var maximum = 0;
            var index = 0;
            var total = temperatures.length;
            // For temperatures.
            for (var i = 0;i < 10; i++) {
                index = index - 1;
                if (temperatures[total + index].grade > maximum) {
                    maximum = temperatures[total + index].grade;
                }
            }
            var total = humidities.length;
            var index = 0;
            // For humidities.
            for (var x = 0;x < 10; x++) {
                index = index - 1;
                if (humidities[total + index].grade > maximum) {
                    maximum = humidities[total + index].grade;
                }
            }
            return maximum;
        }

        // Creating main chart.
        function createMainChart() {
            var config = {
			type: 'line',
			data: {
				labels: getLabels(),
				datasets: [{
					label: 'Temperature',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: getData('temperature'), // Function get grades from the type of enviorment.
					fill: false,
				}, {
					label: 'Humidity',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: getData('humidity'), // Function get grades from the type of enviorment.
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Environmental Quality Index'
				},
				scales: {
					yAxes: [{
						ticks: {
							// the data minimum used for determining the ticks is Math.min(dataMin, suggestedMin)
							suggestedMin: getMinimum(), // Get the minimum grade.

							// the data maximum used for determining the ticks is Math.max(dataMax, suggestedMax)
							suggestedMax: getMaximum() // Get the miximum grade.
						},
                        scaleLabel: {
                            display: true,
                            labelString: 'Grades'
                        }
					}],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Time'
                        }
                    }]
				}
			}
		};

            window.onload = function() {
                var ctx = document.getElementById('canvas').getContext('2d');
                window.myLine = new Chart(ctx, config);
            };
        }
    }

    
</script> 

<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
</style>
@endsection