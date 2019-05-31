@extends('layouts.app')

@section('content')

<!-- <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
<script type="text/javascript">
	window.onload = myAlert;

    function myAlert(){
		// $denvData = @json($denvData);
		alert($denvData);
	}



	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Year', 'Sales', 'Expenses'],
			['2004',  1000,      400],
			['2005',  1170,      460],
			['2006',  660,       1120],
			['2007',  1030,      540]
		]);

		var options = {
			title: 'Company Performance',
			curveType: 'function',
			legend: { position: 'bottom' }
		};

		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		chart.draw(data, options);
	}
</script>

<div class="container" style="margin-top: 2%">

	<div id="curve_chart" style="width: 100%; height: 500px"></div>
</div> -->
@endsection
