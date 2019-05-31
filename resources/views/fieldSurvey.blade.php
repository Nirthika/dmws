@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script type="text/javascript">
	function totalContainers() {
    	document.getElementById('totalContainer').value = parseInt(document.getElementById('waterTank').value) +
    			parseInt(document.getElementById('bottle').value) + parseInt(document.getElementById('teaCup').value) +
    			parseInt(document.getElementById('coconutShell').value) + parseInt(document.getElementById('flowerPot').value) + 
    			parseInt(document.getElementById('yoghurtCup').value) + parseInt(document.getElementById('petWaterSource').value) + 
    			parseInt(document.getElementById('fridgeWasteWaterContainer').value) + parseInt(document.getElementById('other').value);
    }
    function validate(id){
	    if (id.value == '') {
	        id.value = 0;
	    }
	    else if (id.value > 9999) {
	        id.value = 0;
	    }
	}
	function validateMaxYear(id){
		var year = (new Date()).getFullYear();
	   	if (id.value > year) {
	        id.value = '';
	    }
	}
	function validateMinYear(id){
	    if (id.value < 2017) {
	        id.value = '';
	    }	   	
	}
	function setMin(id){
		var tot = parseInt(document.getElementById('totalContainer').value);
		var larPos = parseInt(document.getElementById('larvaPositive').value);
	    if (id.value > tot) {
	        id.value = 0;
	    }
	    else if (id.value == '') {
	        id.value = 0;
	    }
	    document.getElementById('containerIndex').value = (larPos/tot)*100;
	}
	function confSubmit() {
        var x = confirm("Are you sure you want to submit the form?");
        if (x) return true;
        else return false;
    }
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'Principal Investigator')
            <li class="breadcrumb-item"><a href="/pIHome" style="text-decoration: none;">Home</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">Add Results</li>
        <li class="breadcrumb-item"><a href="/fieldSurveySummary" style="text-decoration: none;">Summary</a></li>
    </ol>
</nav>

<div class="container" style="margin-top: 2%">
    <div class="col-12">
        <div class="card-deck">
            <div class="card w-100">
                <div class="card-header"><h5>Field Survey</h5></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" action="/fieldSurvey" onsubmit="return confSubmit()">
                            @csrf
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Visit Date</td>
                                        <td> 
                                        	<div class="form-group row">
                                        		<div class="col-sm-7">
                                                	<select id="month" name="month" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" value="{{ old('month') }}" required autofocus>
						                                <option value="" disabled selected>Select a month</option>
						                                <option value="January">January</option>
						                                <option value="February">February</option>
						                                <option value="March">March</option>
						                                <option value="April">April</option>
						                                <option value="May">May</option>
						                                <option value="June">June</option>
						                                <option value="July">July</option>
						                                <option value="August">August</option>
						                                <option value="September">September</option>
						                                <option value="October">October</option>
						                                <option value="November">November</option>
						                                <option value="December">December</option>
						                            </select>
						                            <small id="month" class="form-text text-muted">Month</small>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" id="year" name="year" min="2017" max="9999" value="{{ old('year') }}" oninput="validateMaxYear(this);" onchange="validateMinYear(this);" required autofocus>
                                                    <small id="year" class="form-text text-muted">Year</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Field Visit Area</td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select id="visitArea" name="visitArea" class="form-control{{ $errors->has('visitArea') ? ' is-invalid' : '' }}" value="{{ old('visitArea') }}" required autofocus>
						                                <option value="" disabled selected>Select an Area</option>
						                                <option value="Gurunagar">Gurunagar</option>
						                                <option value="Navanthurai">Navanthurai</option>
						                                <option value="Uduvil">Uduvil</option>
						                                <option value="Allaipiddy">Allaipiddy</option>
						                                <option value="Thirunelvely">Thirunelvely</option>
						                            </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Number of Container Inspected</td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control{{ $errors->has('totalContainer') ? ' is-invalid' : '' }}" id="totalContainer" name="totalContainer" min="0" value="0" autofocus readonly>
                                                </div>
                                            </div>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td></td>
                                        <td>
                                    		<div class="form-group row">
                                                <label for="patientName" class="col-sm-2 col-form-label">Water Tank</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('waterTank') ? ' is-invalid' : '' }}" id="waterTank" name="waterTank" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            	<label for="bottle" class="col-sm-2 col-form-label">Bottle</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('bottle') ? ' is-invalid' : '' }}" id="bottle" name="bottle" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            	<label for="teaCup" class="col-sm-2 col-form-label">Tea Cup</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('teaCup') ? ' is-invalid' : '' }}" id="teaCup" name="teaCup" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            </div>
                                            <div class="form-group row">
                                            	<label for="coconutShell" class="col-sm-2 col-form-label">Coconut Shell</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('coconutShell') ? ' is-invalid' : '' }}" id="coconutShell" name="coconutShell" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            	<label for="flowerPot" class="col-sm-2 col-form-label">Flower Pot</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('flowerPot') ? ' is-invalid' : '' }}" id="flowerPot" name="flowerPot" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            	<label for="yoghurtCup" class="col-sm-2 col-form-label">Yoghurt Cup</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('yoghurtCup') ? ' is-invalid' : '' }}" id="yoghurtCup" name="yoghurtCup" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            </div>
                                            <div class="form-group row">
                                            	<label for="petWaterSource" class="col-sm-2 col-form-label">Pet Water Source</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('petWaterSource') ? ' is-invalid' : '' }}" id="petWaterSource" name="petWaterSource" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            	<label for="fridgeWasteWaterContainer" class="col-sm-2 col-form-label">Fridge Waste Water Container</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('fridgeWasteWaterContainer') ? ' is-invalid' : '' }}" id="fridgeWasteWaterContainer" name="fridgeWasteWaterContainer" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            	<label for="other" class="col-sm-2 col-form-label">Other</label>
                                            	<div class="col-sm-2">
                                            		<input type="number" class="form-control{{ $errors->has('other') ? ' is-invalid' : '' }}" id="other" name="other" min="0" value="0" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                            	</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Larva Positive</td>
                                        <td>
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="number" class="form-control{{ $errors->has('larvaPositive') ? ' is-invalid' : '' }}" id="larvaPositive" name="larvaPositive" min="0" value="0"  oninput="setMin(this);" autofocus>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Container Index</td>
                                        <td>
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="number" class="form-control{{ $errors->has('containerIndex') ? ' is-invalid' : '' }}" id="containerIndex" name="containerIndex" min="0" value="0" required autofocus readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Spesis Identified</td>
                                        <td>
                                            <div class="form-group row">
                                            	<div  class="col-sm-12">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="aegypti" class="custom-control-input{{ $errors->has('aegypti') ? ' is-invalid' : '' }}" name="aegypti" value="{{ old('aegypti') }}" autofocus>
                                                        <label for="aegypti" class="custom-control-label">Aedes Aegypti</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="albopictus" class="custom-control-input{{ $errors->has('albopictus') ? ' is-invalid' : '' }}" name="albopictus" value="{{ old('albopictus') }}" autofocus>
                                                        <label for="albopictus" class="custom-control-label">Aedes Albopictus</label>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="offset-md-10">                               
                                                    <button type="reset" name="reset" class="btn btn-primary">Reset</button>
                                                    &ensp;&ensp;
                                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection