@extends('layouts.user')

{{-- Content --}}
@section('content')
<div class="heading-text heading-section text-center">
	<h2>Monitoring</h2>
</div>
<div class="card m-4">
	<div class="row">
		<div class="col-7">
			<div class="row">
				<div class="col-12 p-3">
					<div class="d-flex justify-content-center">
						<div id="airvalue-index" class="p-3 mb-2 bg-success text-white w-25 text-center display-1 rounded">
							23
							<a id="information-air" href="#" data-toggle="modal" data-target="#exampleModalCenter">
								<i  class="fas fa-info-circle icon-top" style="font-size:25px;"></i>
							</a>
						</div>
						<div class="ml-3">
							<div id="airvalue-text" class="airvalue-text text-success display-3">
								Good
							</div>
							<div>
								Updated on 
								<span id="updated-day">Monday </span><b id="updated-time">07:00</b>.
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<canvas id="canvas"></canvas>
				</div>
			</div>
		</div>
		<div class="col-5" style="padding-top:15px;padding-bottom:10px;">
			<div class="row">
				<div class="col-6">
					<div>
						<h5 class="title-chartstatus">Temperature</h5>
						<div id="chart_temperature" style="width: 200px; height: 200px;"></div>
					</div>
				</div>
				<div class="col-6">
					<div>
						<h5 class="title-chartstatus">Humidity</h5>
						<div id="chart_humidity" style="width: 200px; height: 200px;"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div>
						<h5 class="title-chartstatus">CO2</h5>
						<div id="chart_c02" style="width: 200px; height: 200px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="title-modal w-100 text-center" id="exampleModalLongTitle">About the Air Quality Levels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<table id="air-information" class="table table-bordered" style="text-align:left;">
			<thead style="background:#F6F9F9;">
				<tr>
					<td class="align-vertically">AQI</td>
					<td class="align-vertically">Air Pollution Level</td>
					<td class="align-vertically">Health Implications</td>
					<td class="align-vertically">Cautionary Statement (for PM2.5)</td>
				</tr>
			</thead>
			<tbody>
				<tr class="bg-success text-white">
					<td class="align-vertically" nowrap="true">0 - 50</td>
					<td class="align-vertically">Good</td>
					<td class="align-vertically">Air quality is considered satisfactory, and air pollution poses little or no risk</td>
					<td class="align-vertically">None</td>
				</tr>
				<tr class="bg-warning">
					<td class="align-vertically" nowrap="true">51 - 100</td>
					<td class="align-vertically">Moderate</td>
					<td class="align-vertically">Air quality is acceptable; however, for some pollutants there may be a moderate health concern for a very small number of people who are unusually sensitive to air pollution.</td>
					<td class="align-vertically">Active children and adults, and people with respiratory disease, such as asthma, should limit prolonged outdoor exertion.</td>
				</tr>
				<tr class="bg-orange">
					<td class="align-vertically" nowrap="true">101 - 150</td>
					<td class="align-vertically">Unhealthy for Sensitive Groups</td>
					<td class="align-vertically">Members of sensitive groups may experience health effects. The general public is not likely to be affected.</td>
					<td class="align-vertically">Active children and adults, and people with respiratory disease, such as asthma, should limit prolonged outdoor exertion.</td>
				</tr>
				<tr class="bg-danger text-white">
					<td class="align-vertically" nowrap="true">151 - 200</td>
					<td class="align-vertically">Unhealthy</td>
					<td class="align-vertically">Everyone may begin to experience health effects; members of sensitive groups may experience more serious health effects</td>
					<td class="align-vertically">Active children and adults, and people with respiratory disease, such as asthma, should avoid prolonged outdoor exertion; everyone else, especially children, should limit prolonged outdoor exertion</td>
				</tr>
				<tr class="bg-purple text-white">
					<td class="align-vertically" nowrap="true">201 - 300</td>
					<td class="align-vertically">Very Unhealthy</td>
					<td class="align-vertically">Health warnings of emergency conditions. The entire population is more likely to be affected.</td>
					<td class="align-vertically">Active children and adults, and people with respiratory disease, such as asthma, should avoid all outdoor exertion; everyone else, especially children, should limit outdoor exertion.</td>
				</tr>
				<tr class="bg-blood text-white">
					<td class="align-vertically" nowrap="true">300+</td>
					<td class="align-vertically">Hazardous</td>
					<td class="align-vertically">Health alert: everyone may experience more serious health effects</td>
					<td class="align-vertically">Everyone should avoid all outdoor exertion</td>
				</tr>
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
	#information-air {
		color: inherit !important;
	}
	.icon-top {
		float: right;
		right: 10px !important;
		top: 0px !important;
	}
	.modal-body {
		overflow-x: auto;
	}
	.bg-orange {
		background-color: #FF9933;
	}
	.bg-purple {
		background-color: #660099;
	}
	.bg-blood {
		background-color: #7E0023;
	}
	.align-vertically {
		vertical-align: middle !important;
	}
	.title-modal {
		font-family: 'Lato', sans-serif;
		font-size: 2rem;
		line-height: 2;
		font-weight: bold !important;
	}
</style>
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
		drawStatusCharts(false);
        setInterval(() => {
			drawMainChart(true);
			drawStatusCharts(true);
        }, 10000);
		// $('.highcharts-credits').text('');
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
					label: 'Temperature (°C)',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: getData('temperature'), // Function get grades from the type of enviorment.
					fill: false,
				}, {
					label: 'Humidity (% RH)',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: getData('humidity'), // Function get grades from the type of enviorment.
				}, {
					label: 'Carbon Dioxide (%)',
					fill: false,
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [13,17,26,31,44,43,39,37,40,41],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: ['Environmental Quality Index', 'current past 10 hours data']
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
                            display: true
                            // labelString: 'Grades' // To show name of left side main chart.
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

	// Draw each element.
	function drawStatusCharts() {
		google.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Label', 'Value'],
    			['°C', 3]
			]);
			var options = {
				width: 200,
				height: 200,
				redFrom: 20,
				redTo: 10,
				yellowFrom: 10,
				yellowTo: 5,
				greenFrom: 5,
				greenTo: 0,
				minorTicks: 20,
				max: 0,
				min: 20,
				majorTicks: ['20', '1']
			};
			var chart = new google.visualization.Gauge(document.getElementById('chart_temperature'));
			chart.draw(data, options);

			var chart = new google.visualization.Gauge(document.getElementById('chart_humidity'));
			chart.draw(data, options);

			var chart = new google.visualization.Gauge(document.getElementById('chart_c02'));
			chart.draw(data, options);
		}
	}
    
</script>
@endsection