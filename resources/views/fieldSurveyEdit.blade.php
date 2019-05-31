@extends('layouts.app')

@section('content')

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
        <li class="breadcrumb-item"><a href="/fieldSurvey" style="text-decoration: none;">Add Results</a></li>
        <li class="breadcrumb-item"><a href="/fieldSurveySummary" style="text-decoration: none;">Summary</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<div class="container" style="margin-top: 2%">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>Edit Field Survey Results</h5></div>
                <div class="card-body" style="padding: 1%;">                    
                    <br>
                    <form method="POST" action="/fieldSurvey/{{ $result->id }}" onsubmit="return confSubmit()">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="padding-bottom: 0%;">Visit Date</td>
                                        <td style="padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div class="col-sm-7">
                                                    <select id="month" name="month" class="form-control" required autofocus>
                                                        <option value="" disabled selected>Select a month</option>
                                                        <option value="January" {{ $result->month == 'January' ? 'selected' : '' }}>January</option>
                                                        <option value="February" {{ $result->month == 'February' ? 'selected' : '' }}>February</option>
                                                        <option value="March" {{ $result->month == 'March' ? 'selected' : '' }}>March</option>
                                                        <option value="April" {{ $result->month == 'April' ? 'selected' : '' }}>April</option>
                                                        <option value="May" {{ $result->month == 'May' ? 'selected' : '' }}>May</option>
                                                        <option value="June" {{ $result->month == 'June' ? 'selected' : '' }}>June</option>
                                                        <option value="July" {{ $result->month == 'July' ? 'selected' : '' }}>July</option>
                                                        <option value="August" {{ $result->month == 'August' ? 'selected' : '' }}>August</option>
                                                        <option value="September" {{ $result->month == 'September' ? 'selected' : '' }}>September</option>
                                                        <option value="October" {{ $result->month == 'October' ? 'selected' : '' }}>October</option>
                                                        <option value="November" {{ $result->month == 'November' ? 'selected' : '' }}>November</option>
                                                        <option value="December" {{ $result->month == 'December' ? 'selected' : '' }}>December</option>
                                                    </select>
                                                    <small id="month" class="form-text text-muted">Month</small>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control" id="year" name="year" min="2017" max="9999" value="{{ $result->year }}" oninput="validateMaxYear(this);" onchange="validateMinYear(this);" required autofocus>
                                                    <small id="year" class="form-text text-muted">Year</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Field Visit Area</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select id="visitArea" name="visitArea" class="form-control" required autofocus>
                                                        <option value="" disabled selected>Select an Area</option>
                                                        <option value="Gurunagar" {{ $result->visitArea == 'Gurunagar' ? 'selected' : '' }}>Gurunagar</option>
                                                        <option value="Navanthurai" {{ $result->visitArea == 'Navanthurai' ? 'selected' : '' }}>Navanthurai</option>
                                                        <option value="Uduvil" {{ $result->visitArea == 'Uduvil' ? 'selected' : '' }}>Uduvil</option>
                                                        <option value="Allaipiddy" {{ $result->visitArea == 'Allaipiddy' ? 'selected' : '' }}>Allaipiddy</option>
                                                        <option value="Thirunelvely" {{ $result->visitArea == 'Thirunelvely' ? 'selected' : '' }}>Thirunelvely</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Number of Container Inspected</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="totalContainer" name="totalContainer" min="0" value="{{ $result->totalContainer }}" autofocus readonly>
                                                </div>
                                            </div>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;"></td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="patientName" class="col-sm-2 col-form-label">Water Tank</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="waterTank" name="waterTank" min="0" value="{{ $result->waterTank }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                                <label for="bottle" class="col-sm-2 col-form-label">Bottle</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="bottle" name="bottle" min="0" value="{{ $result->bottle }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                                <label for="teaCup" class="col-sm-2 col-form-label">Tea Cup</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="teaCup" name="teaCup" min="0" value="{{ $result->teaCup }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="coconutShell" class="col-sm-2 col-form-label">Coconut Shell</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="coconutShell" name="coconutShell" min="0" value="{{ $result->coconutShell }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                                <label for="flowerPot" class="col-sm-2 col-form-label">Flower Pot</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="flowerPot" name="flowerPot" min="0" value="{{ $result->flowerPot }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                                <label for="yoghurtCup" class="col-sm-2 col-form-label">Yoghurt Cup</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="yoghurtCup" name="yoghurtCup" min="0" value="{{ $result->yoghurtCup }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="petWaterSource" class="col-sm-2 col-form-label">Pet Water Source</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="petWaterSource" name="petWaterSource" min="0" value="{{ $result->petWaterSource }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                                <label for="fridgeWasteWaterContainer" class="col-sm-2 col-form-label">Fridge Waste Water Container</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="fridgeWasteWaterContainer" name="fridgeWasteWaterContainer" min="0" value="{{ $result->fridgeWasteWaterContainer }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                                <label for="other" class="col-sm-2 col-form-label">Other</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="other" name="other" min="0" value="{{ $result->other }}" max="9999" onkeyup="totalContainers()" oninput="validate(this); totalContainers();" autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Larva Positive</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="number" class="form-control" id="larvaPositive" name="larvaPositive" min="0" value="{{ $result->larvaPositive }}"  oninput="setMin(this);" autofocus>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Container Index</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="number" class="form-control" id="containerIndex" name="containerIndex" min="0" value="{{ $result->containerIndex }}" required autofocus readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Spesis Identified</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="aegypti" class="custom-control-input" name="aegypti" value="{{ old('aegypti') }}" autofocus {{ $result->aegypti == 'Yes' ? 'checked' : '' }}>
                                                        <label for="aegypti" class="custom-control-label">Aedes Aegypti</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="albopictus" class="custom-control-input" name="albopictus" value="{{ old('albopictus') }}" autofocus {{ $result->albopictus == 'Yes' ? 'checked' : '' }}>
                                                        <label for="albopictus" class="custom-control-label">Aedes Albopictus</label>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 0%; width: 50%;"></td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row mb-0">
                                                <div class="offset-md-8">                               
                                                    <a class="btn btn-primary" href="/fieldSurveySummary" role="button">Close</a>
                                                    &ensp;&ensp;
                                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection