@extends('layouts.app')

@section('content')

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
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'Principal Investigator')
            <li class="breadcrumb-item"><a href="/pIHome" style="text-decoration: none;">Home</a></li>
        @endif
        <li class="breadcrumb-item"><a href="/labResults" style="text-decoration: none;">Add Results</a></li>
        <li class="breadcrumb-item"><a href="/labResultsSummary" style="text-decoration: none;">Summary</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li> 
    </ol>
</nav>

<div class="container" style="margin-top: 2%">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>Edit Laboratory Results</h5></div>
                <div class="card-body" style="padding: 1%;">                    
                    <br>
                    <form method="POST" action="/labResults/{{ $result->id }}" onsubmit="return confSubmit()">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="padding-bottom: 0%;">Admission Date</td>
                                        <td style="padding-bottom: 0%;">                                                
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="date" class="form-control" name="admissionDate" id="admissionDate" value="{{ $result->admissionDate }}" required readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Bed Head Ticket No.</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="text" class="form-control" name="bHTNo" id="bHTNo" value="{{ $result->bHTNo }}" required readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Patient ID</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div  class="col-sm-12">
                                                    <input type="text" class="form-control" name="paId" id="paId" value="{{ $result->paId }}" required readonly>            
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Patient ID</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $result->firstName }}" required readonly>
                                                    <small id="firstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $result->lastName }}" required readonly>
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
                                                    <input type="text" class="form-control" id="curAddLine1" name="curAddLine1" value="{{ $result->curAddLine1 }}" required readonly>
                                                    <small class="form-text text-muted">Address Line 1</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curAddLine2" name="curAddLine2" value="{{ $result->curAddLine2 }}" readonly>
                                                    <small class="form-text text-muted">Address Line 2</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curGSDivName" name="curGSDivName" value="{{ $result->curGSDivName }}" required readonly>
                                                    <small class="form-text text-muted">GS Div Name</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curGSDiv" name="curGSDiv" value="{{ $result->curGSDiv }}" required readonly>
                                                    <small class="form-text text-muted">GS Division</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curDSDiv" name="curDSDiv" value="{{ $result->curDSDiv }}" required readonly>
                                                    <small class="form-text text-muted">DS Division</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curDistrict" name="curDistrict" value="{{ $result->curDistrict }}" required readonly>
                                                    <small class="form-text text-muted">District</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curProvince" name="curProvince" value="{{ $result->curProvince }}" required readonly>
                                                    <small class="form-text text-muted">Province</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curMOHArea" name="curMOHArea" value="{{ $result->curMOHArea }}" required readonly>
                                                    <small class="form-text text-muted">MOH Area</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="curPHIRange" name="curPHIRange" value="{{ $result->curPHIRange }}" required readonly>
                                                    <small class="form-text text-muted">PHI Range</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">Dengue Confirmative Test</td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $ns1 = ''; $igm = ''; $igg = ''; @endphp
                                            @if($result->ns1 == 'positive')
                                                @php $ns1 = 'positive'; @endphp
                                            @elseif($result->ns1 == 'negative')
                                                @php $ns1 = 'negative'; @endphp
                                            @endif
                                            @if($result->igm == 'positive')
                                                @php $igm = 'positive'; @endphp
                                            @elseif($result->igm == 'negative')
                                                @php $igm = 'negative'; @endphp
                                            @endif
                                            @if($result->igg == 'positive')
                                                @php $igg = 'positive'; @endphp
                                            @elseif($result->igg == 'negative')
                                                @php $igg = 'negative'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <div class="col-md-10"  style="padding-left: 6%">
                                                    <div class="row" style="border: 1px solid #dee2e6;">
                                                        <div class="col-md-4" style="padding-left: 0.5%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="ns1Positive" name="ns1" class="custom-control-input" value="positive" @if($ns1 == 'positive') checked @endif onclick="testRequired()">
                                                                <label class="custom-control-label" for="ns1Positive">NS-1 Positive</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="ns1Negative" name="ns1" class="custom-control-input" value="negative" @if($ns1 == 'negative') checked @endif onclick="testRequired()">
                                                                <label class="custom-control-label" for="ns1Negative">NS-1 Negative</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="padding-left: 1%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="igmPositive" name="igm" class="custom-control-input" value="positive" @if($igm == 'positive') checked @endif onclick="testRequired()">
                                                                <label class="custom-control-label" for="igmPositive">IgM Positive</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="igmNegative" name="igm" class="custom-control-input" value="negative" required @if($igm == 'negative') checked @endif onclick="testRequired()">
                                                                <label class="custom-control-label" for="igmNegative">IgM Negative</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="padding-left: 1%; padding-right: 0%;">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="iggPositive" name="igg" class="custom-control-input" value="positive" @if($igg == 'positive') checked @endif onclick="testRequired()">
                                                                <label class="custom-control-label" for="iggPositive">IgG Positive</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="iggNegative" name="igg" class="custom-control-input" value="negative" @if($igg == 'negative') checked @endif onclick="testRequired()">
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
                                                        <input type="checkbox" id="denv1" class="custom-control-input" name="denv1" value="{{ old('denv1') }}" onclick="seroTypeRequired()" {{ $result->denv1 == 'Yes' ? 'checked' : '' }}>
                                                        <label for="denv1" class="custom-control-label">DENV 1</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="denv2" class="custom-control-input" name="denv2" value="{{ old('denv2') }}" onclick="seroTypeRequired()" {{ $result->denv2 == 'Yes' ? 'checked' : '' }}>
                                                        <label for="denv2" class="custom-control-label">DENV 2</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="denv3" class="custom-control-input" name="denv3" value="{{ old('denv3') }}" onclick="seroTypeRequired()" {{ $result->denv3 == 'Yes' ? 'checked' : '' }}>
                                                        <label for="denv3" class="custom-control-label">DENV 3</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="denv4" class="custom-control-input" name="denv4" value="{{ old('denv4') }}" onclick="seroTypeRequired()" {{ $result->denv4 == 'Yes' ? 'checked' : '' }}>
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
                                                    <a class="btn btn-primary" href="/labResultsSummary" role="button">Close</a>
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