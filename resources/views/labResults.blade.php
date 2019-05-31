@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script type="text/javascript">
    function testRequired() {
        if(document.getElementById("ns1Positive").checked || document.getElementById("ns1Negative").checked ||
            document.getElementById("igmPositive").checked || document.getElementById("igmNegative").checked ||
            document.getElementById("iggPositive").checked || document.getElementById("iggNegative").checked){
            document.getElementById('igmNegative').required = false;
        }else{
            document.getElementById('igmNegative').required = true;
        }
    }
    function seroTypeRequired() {
        if(document.getElementById("denv1").checked || document.getElementById("denv2").checked ||
            document.getElementById("denv3").checked || document.getElementById("denv4").checked){
            document.getElementById('denv2').required = false;
        }else{
            document.getElementById('denv2').required = true;
        }
    }
    function confSubmit() {
        var x = confirm("Are you sure you want to submit the form?");
        if (x) return true;
        else return false;
    }
    function getDetails(count, _this) {
        $patients = @json($patients);
        
        // testedDate.max = new Date().toISOString().split("T")[0];
        // var minDate = new Date($patients[count].updated_at);
        // document.getElementById('testedDate').value = "";
        // testedDate.min = minDate.toISOString().split("T")[0];

        // var date = minDate.getDate()+1;
        // var month = minDate.getMonth(); //Be careful! January is 0 not 1
        // var year = minDate.getFullYear();
        // var dateString = (month + 1) + "/" + date + "/" + year;

        // var aa = new Date(dateString);
        // testedDate.min = aa.toISOString().split("T")[0];

        document.getElementById("admissionDate").value = $patients[count].admissionDate;
        document.getElementById("bHTNo").value = $patients[count].regOrBHTNo;
        document.getElementById("paId").value = $patients[count].paId;
        document.getElementById("firstName").value = $patients[count].firstName;
        document.getElementById("lastName").value = $patients[count].lastName;
        document.getElementById("curAddLine1").value = $patients[count].curAddLine1;
        document.getElementById("curAddLine2").value = $patients[count].curAddLine2;
        document.getElementById("curGSDivName").value = $patients[count].curGSDivName;
        document.getElementById("curGSDiv").value = $patients[count].curGSDiv;
        document.getElementById("curDSDiv").value = $patients[count].curDSDiv;
        document.getElementById("curDistrict").value = $patients[count].curDistrict;
        document.getElementById("curProvince").value = $patients[count].curProvince;
        document.getElementById("curMOHArea").value = $patients[count].curMOHArea;
        document.getElementById("curPHIRange").value = $patients[count].curPHIRange; 

        var inp = document.getElementsByTagName('button');
        for (var i=0; i<inp.length; i++) {
            inp[i].style.backgroundColor = "#007bff";
        }
        _this.style.backgroundColor = "green";
    }
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'Principal Investigator')
            <li class="breadcrumb-item"><a href="/pIHome" style="text-decoration: none;">Home</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">Add Results</li>
        <li class="breadcrumb-item"><a href="/labResultsSummary" style="text-decoration: none;">Summary</a></li>
    </ol>
</nav>

<div class="container" style="margin-top: 2%">          
    <div class="row justify-content-center">
        <div class="col-sm-3">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header"><h5>Patient</h5></div>
                    <div class="card-body">
                        <div class="table-responsive">                  
                            <table class="table table-borderless">
                                <thead>
                                    <tr style="border-bottom: 1px solid #dee2e6;">
                                        <th scope="col">BHT-No.</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0 ?>                                                
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <th scope="row">{{ $patient->regOrBHTNo }}</th>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" onclick="getDetails(<?php echo $count ?>, this)">Add Results</button>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card-deck">
                <div class="card w-100">
                    <div class="card-header"><h5>Laboratory Results</h5></div>
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <form method="POST" action="/labResults" onsubmit="return confSubmit()">
                                @csrf
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="padding-bottom: 0%;">Admission Date</td>
                                            <td style="padding-bottom: 0%;">                                                
                                                <div class="form-group row">
                                                    <div  class="col-sm-12">
                                                        <input type="date" class="form-control{{ $errors->has('admissionDate') ? ' is-invalid' : '' }}" id="admissionDate" name="admissionDate" value="{{ old('admissionDate') }}" required autofocus readonly>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">Bed Head Ticket No.</td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row">
                                                    <div  class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('bHTNo') ? ' is-invalid' : '' }}" id="bHTNo" name="bHTNo" value="{{ old('bHTNo') }}" required autofocus readonly>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">Patient ID</td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row">
                                                    <div  class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('paId') ? ' is-invalid' : '' }}" id="paId" name="paId" value="{{ old('paId') }}" required autofocus readonly>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">Patient Name</td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row">
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" id="firstName" name="firstName" value="{{ old('firstName') }}" required autofocus readonly>
                                                        <small id="firstName" class="form-text text-muted">First Name</small>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" id="lastName" name="lastName" value="{{ old('lastName') }}" required autofocus readonly>
                                                        <small id="lastName" class="form-text text-muted">Last Name</small>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">Patient Address</td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curAddLine1') ? ' is-invalid' : '' }}" id="curAddLine1" name="curAddLine1" value="{{ old('curAddLine1') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">Address Line 1</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curAddLine2') ? ' is-invalid' : '' }}" id="curAddLine2" name="curAddLine2" value="{{ old('curAddLine2') }}" autofocus readonly>
                                                        <small class="form-text text-muted">Address Line 2</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curGSDivName') ? ' is-invalid' : '' }}" id="curGSDivName" name="curGSDivName" value="{{ old('curGSDivName') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">GS Div Name</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curGSDiv') ? ' is-invalid' : '' }}" id="curGSDiv" name="curGSDiv" value="{{ old('curGSDiv') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">GS Division</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curDSDiv') ? ' is-invalid' : '' }}" id="curDSDiv" name="curDSDiv" value="{{ old('curDSDiv') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">DS Division</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curDistrict') ? ' is-invalid' : '' }}" id="curDistrict" name="curDistrict" value="{{ old('curDistrict') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">District</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curProvince') ? ' is-invalid' : '' }}" id="curProvince" name="curProvince" value="{{ old('curProvince') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">Province</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curMOHArea') ? ' is-invalid' : '' }}" id="curMOHArea" name="curMOHArea" value="{{ old('curMOHArea') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">MOH Area</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control{{ $errors->has('curPHIRange') ? ' is-invalid' : '' }}" id="curPHIRange" name="curPHIRange" value="{{ old('curPHIRange') }}" required autofocus readonly>
                                                        <small class="form-text text-muted">PHI Range</small>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">Dengue Confirmative Test</td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row">
                                                    <div class="col-md-10"  style="padding-left: 6%">
                                                        <div class="row" style="border: 1px solid #dee2e6;">
                                                            <div class="col-md-4" style="padding-left: 0.5%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="ns1Positive" name="ns1" class="custom-control-input{{ $errors->has('ns1Positive') ? ' is-invalid' : '' }}" value="positive" autofocus onclick="testRequired()">
                                                                    <label class="custom-control-label" for="ns1Positive">NS-1 Positive</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="ns1Negative" name="ns1" class="custom-control-input{{ $errors->has('ns1Negative') ? ' is-invalid' : '' }}" value="negative" autofocus onclick="testRequired()">
                                                                    <label class="custom-control-label" for="ns1Negative">NS-1 Negative</label>
                                                                </div>                                                     
                                                            </div>
                                                            <div class="col-md-4" style="padding-left: 1%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="igmPositive" name="igm" class="custom-control-input{{ $errors->has('igmPositive') ? ' is-invalid' : '' }}" value="positive" autofocus onclick="testRequired()">
                                                                    <label class="custom-control-label" for="igmPositive">IgM Positive</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="igmNegative" name="igm" class="custom-control-input{{ $errors->has('igmNegative') ? ' is-invalid' : '' }}" value="negative" required autofocus onclick="testRequired()">
                                                                    <label class="custom-control-label" for="igmNegative">IgM Negative</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" style="padding-left: 1%; padding-right: 0%;">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="iggPositive" name="igg" class="custom-control-input{{ $errors->has('iggPositive') ? ' is-invalid' : '' }}" value="positive" autofocus onclick="testRequired()">
                                                                    <label class="custom-control-label" for="iggPositive">IgG Positive</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="iggNegative" name="igg" class="custom-control-input{{ $errors->has('iggNegative') ? ' is-invalid' : '' }}" value="negative" autofocus onclick="testRequired()">
                                                                    <label class="custom-control-label" for="iggNegative">IgG Negative</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <small id="labTestAlert" class="form-text text-muted">Please Select Atleast One Test</small>
                                                    </div> 
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">Dengue Virus Serotype</td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="denv1" class="custom-control-input{{ $errors->has('denv1') ? ' is-invalid' : '' }}" name="denv1" value="{{ old('denv1') }}" autofocus onclick="seroTypeRequired()">
                                                            <label for="denv1" class="custom-control-label">DENV 1</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="denv2" class="custom-control-input{{ $errors->has('denv2') ? ' is-invalid' : '' }}" name="denv2" value="{{ old('denv2') }}" required autofocus onclick="seroTypeRequired()">
                                                            <label for="denv2" class="custom-control-label">DENV 2</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="denv3" class="custom-control-input{{ $errors->has('denv3') ? ' is-invalid' : '' }}" name="denv3" value="{{ old('denv3') }}" autofocus onclick="seroTypeRequired()">
                                                            <label for="denv3" class="custom-control-label">DENV 3</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="denv4" class="custom-control-input{{ $errors->has('denv4') ? ' is-invalid' : '' }}" name="denv4" value="{{ old('denv4') }}" autofocus onclick="seroTypeRequired()">
                                                            <label for="denv4" class="custom-control-label">DENV 4</label>
                                                        </div>
                                                        <small id="seroType" class="form-text text-muted">Please Select Atleast One Type</small>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 0%; width: 50%;"></td>
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row mb-0">
                                                    <div class="offset-md-8">                               
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
</div>
@endsection
