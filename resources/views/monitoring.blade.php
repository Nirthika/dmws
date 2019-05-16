@extends('layouts.app')

@section('content')
<script>
	$(function(){
		from.max = new Date().toISOString().split("T")[0];
		to.max = new Date().toISOString().split("T")[0];

		document.getElementById('from').value = "{{ $from }}";
		document.getElementById('to').value = "{{ $to }}";		
	});

	window.onload = myAlert;
	// window.onload = magnify;

    function myAlert(){
		initialize_map();

		$latitude = @json($latitude);
		$longitude = @json($longitude);
		$gSDivName = @json($gSDivName);
		$count = [];
		$lat = [];
		$lng = [];
		$gSDiv = [];

		for ($i = 0; $i < $gSDivName.length; $i++) { 
			$c = 1;
			$tempLat = $latitude[$i];
			$tempLng = $longitude[$i];
			$tempGS = $gSDivName[$i];

			for ($j = $i+1; $j < $gSDivName.length; $j++) {
				if ($tempGS == $gSDivName[$j]) {
					$c++;

					for ($k = $j; $k < $gSDivName.length-1; $k++) {
						$latitude[$k] = $latitude[$k+1];
						$longitude[$k] = $longitude[$k+1];
						$gSDivName[$k] = $gSDivName[$k+1];
					}
					$gSDivName.length = $gSDivName.length-1;
				}
			}
			$count[$i] = $c;
			$lat[$i] = $tempLat;
			$lng[$i] = $tempLng;
			$gSDiv[$i] = $tempGS;
		}

		for ($i = 0; $i < $lat.length; $i++) {  
			$label = $gSDiv[$i]+ "-("+$count[$i]+")";
			add_map_point($lat[$i], $lng[$i], $label);
        }
            // add_map_point(9.66947, 80.005798);

        magnify();
	}

	var map;

	function initialize_map() {
		map = new ol.Map({
			target: "map",
			layers: [
				new ol.layer.Tile({
					source: new ol.source.OSM({
						url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
					})
				})
			],
			view: new ol.View({
				center: ol.proj.fromLonLat([80.1180238598406, 9.611119540064163]), // center of zoom is "Ariyalai East Road, Ariyalai East 7, Sri Lanka"
				zoom: 11.45 // map default zoom
			})
		});
	}

	function add_map_point(lat, lng, count) {
		var vectorLayer = new ol.layer.Vector({
			source:new ol.source.Vector({
				features: [new ol.Feature({
					geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
				})]
			}),
			style: new ol.style.Style({
				image: new ol.style.Icon({
					anchor: [0.5, 0.5],
					anchorXUnits: "fraction",
					anchorYUnits: "fraction",
					src: "<?= asset('images/location.png') ?>"					
				}),
				text: new ol.style.Text({
			        text: count,
			        font: '16px Verdana',
			        textAlign: 'center',			        
			        offsetX : 0,
      				offsetY : -19,
      				// fill: new ol.style.Fill({
			       //      color: '#000000'
			       //  }),
                    stroke: new ol.style.Stroke({
                        color: 'red',
                        width: 0.5
                    })
			    })
			})
		});

		map.addLayer(vectorLayer);
	}

	function setMinToDate() {
		var from = new Date(document.getElementById('from').value);
		document.getElementById('to').value = "";
		to.min = from.toISOString().split("T")[0];
	}

	function magnify(imgID, zoom) {
		var img, glass, w, h, bw;
		img = document.getElementById(imgID);
		// create magnifier glass:
		glass = document.createElement("DIV");
		glass.setAttribute("class", "img-magnifier-glass");
		// insert magnifier glass:
		img.parentElement.insertBefore(glass, img);
		// set background properties for the magnifier glass:
		glass.style.backgroundImage = "url('" + img.src + "')";
		glass.style.backgroundRepeat = "no-repeat";
		glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
		bw = 3;
		w = glass.offsetWidth / 2;
		h = glass.offsetHeight / 2;
		// execute a function when someone moves the magnifier glass over the image:
		glass.addEventListener("mousemove", moveMagnifier);
		img.addEventListener("mousemove", moveMagnifier);
		// and also for touch screens:
		glass.addEventListener("touchmove", moveMagnifier);
		img.addEventListener("touchmove", moveMagnifier);
		function moveMagnifier(e) {
			var pos, x, y;
			// prevent any other actions that may occur when moving over the image
			e.preventDefault();
			// get the cursor's x and y positions:
			pos = getCursorPos(e);
			x = pos.x;
			y = pos.y;
			// prevent the magnifier glass from being positioned outside the image:
			if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
			if (x < w / zoom) {x = w / zoom;}
			if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
			if (y < h / zoom) {y = h / zoom;}
			// set the position of the magnifier glass:
			glass.style.left = (x - w)-30 + "px";
			glass.style.top = (y - h)-20 + "px";
			// display what the magnifier glass "sees":
			glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
		}
		function getCursorPos(e) {
			var a, x = 0, y = 0;
			e = e || window.event;
			// get the x and y positions of the image:
			a = img.getBoundingClientRect();
			// calculate the cursor's x and y coordinates, relative to the image:
			x = e.pageX - a.left;
			y = e.pageY - a.top;
			// consider any page scrolling:
			x = x - window.pageXOffset;
			y = y - window.pageYOffset;
			return {x : x, y : y};
		}
	}
</script>
<script src="{{ asset('js/map/ol.js') }}" type="text/javascript"></script>
<div class="container">
	<div class="card-header text-center">
        <h3><b><font color="#0033cc">Dengue Risk Map</font></b></h3>
    </div>
	<nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-riskArea-tab" data-toggle="tab" href="#nav-riskArea" role="tab" aria-controls="nav-riskArea" aria-selected="true">Risk Area</a>
            <a class="nav-item nav-link" id="nav-heatMap-tab" data-toggle="tab" href="#nav-heatMap" role="tab" aria-controls="nav-draftForm" aria-selected="false">Heat Map</a>            
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-riskArea" role="tabpanel" aria-labelledby="nav-riskArea-tab">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/monitoring">
                        @csrf
				    	<table class="table table-borderless">
				            <tbody>
				                <tr>
				                    <td>
				                        <div class="form-group row">
				                            <label for="from" class="col-sm-1.5 col-form-label">From</label>
				                            <div class="col-sm-4">
				                                <input type="date" class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" id="from" name="from" value="{{ old('from') }}" required autofocus>
				                            </div>
				                            <label for="to" class="col-sm-0.5 col-form-label">To</label>
				                            <div class="col-sm-4">
				                                <input type="date" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" id="to" name="to" value="{{ old('to') }}" required autofocus>
				                            </div>
				                            &emsp;
				                            <div class="col-sm-1">
							                	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							                </div>
				                        </div>			                        
				                    </td>
				                </tr>
				            </tbody>
				        </table>
				    </form>
				    <div id="map"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-heatMap" role="tabpanel" aria-labelledby="nav-heatMap-tab">
        	<br/>
            <div class="accordion" id="accordionExample">
		        <div class="row justify-content-center">
		            <div class="card">		                
		                <div class="img-magnifier-container">
		                    <img class="card-img-bottom" id="map1" src="images/denqueRiskMap4GS.jpg">
		                </div>
		            </div>     
		        </div>
		        <br/>		        
		    </div>
		</div>
    </div>
</div>
<script>
	// Initiate Magnify Function with the id of the image, and the strength of the magnifier glass:
	magnify("map1", 3);	
</script>
@endsection
