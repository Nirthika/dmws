@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script type="text/javascript">    
    function confirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x) return true;
        else return false;
    }  
    function testRequired() {
        if(document.getElementById("ns1Positive").checked || document.getElementById("ns1Negative").checked ||
            document.getElementById("igmPositive").checked || document.getElementById("igmNegative").checked ||
            document.getElementById("iggPositive").checked || document.getElementById("iggNegative").checked){
            document.getElementById("igmNegative").required = false;
        }else{
            document.getElementById("igmNegative").required = true;
        }
    }
    function seroTypeRequired() {
        if(document.getElementById("denv1").checked || document.getElementById("denv2").checked ||
            document.getElementById("denv3").checked || document.getElementById("denv4").checked){
            document.getElementById("denv2").required = false;
        }else{
            document.getElementById("denv2").required = true;
        }
    }
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/labResults" style="text-decoration: none;">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Summary</li>
    </ol>
</nav>

<div class="container" style="margin-top: 2%">          
    <div class="col-12">
        <div class="card-deck">
            <div class="card w-100">
                <div class="card-header"><h5>Results Summary</h5></div>
                <div class="card-body">
                    <div class="table-responsive">                            
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Admission Date</th>
                                    <th scope="col">BHT No.</th>
                                    <th scope="col">Patient ID</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Patient Address</th>
                                    <th scope="col"></th>
                                    <th scope="col">Dengue Confirmative Test</th>
                                    <th scope="col">Dengue Virus Serotype</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->admissionDate }}</td>                                            
                                        <td>{{ $result->bHTNo }}</td>
                                        <td>{{ $result->paId }}</td>
                                        <td>{{ $result->firstName }}&nbsp;{{ $result->lastName }}</td>                                            
                                        <td>
                                            {{ $result->curAddLine1 }},
                                            @if($result->curAddLine2 != NULL) {{ $result->curAddLine2 }} @endif <br/>
                                            {{ $result->curDistrict }}, &nbsp; {{ $result->curProvince }} Province <br/>
                                            GS Division:&ensp; {{ $result->curGSDivName }} ({{ $result->curGSDiv }}) <br/>
                                        </td>
                                        <td>
                                            DS Division:&ensp; {{ $result->curDSDiv }} <br/>
                                            MOH Area:&ensp;&nbsp; {{ $result->curMOHArea }} <br/>
                                            PHI Range:&ensp;&nbsp; {{ $result->curPHIRange }}
                                        </td>                                            
                                        <td>
                                            NS-1:&ensp; @if($result->ns1 == NULL) -- @else {{ $result->ns1 }} @endif <br/>
                                            IgM:&ensp;&ensp; @if($result->igm == NULL) -- @else {{ $result->igm }} @endif <br/>
                                            IgG:&ensp;&nbsp;&nbsp;&nbsp; @if($result->igg == NULL) -- @else {{ $result->igg }} @endif
                                        </td>                                            
                                        <td>
                                            @if($result->denv1 == 'Yes') DENV1 <br/> @endif
                                            @if($result->denv2 == 'Yes') DENV2 <br/> @endif
                                            @if($result->denv3 == 'Yes') DENV3 <br/> @endif
                                            @if($result->denv4 == 'Yes') DENV4 @endif
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editResult">Edit</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editResult" tabindex="-1" role="dialog" aria-labelledby="editResultModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="labResults/{{ $result->id }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editResultModalCenterTitle">Edit</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="admissionDate" class="col-md-4 col-form-label">Admission Date:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="date" class="form-control" name="admissionDate" id="admissionDate" value="{{ $result->admissionDate }}" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="bHTNo" class="col-md-4 col-form-label">Bed Head Ticket No.:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="bHTNo" id="bHTNo" value="{{ $result->bHTNo }}" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="denConfTest" class="col-md-4 col-form-label">Dengue Confirmative Test:</label>
                                                                    <div class="col-md-8" style="padding-left: 6%">
                                                                        <div class="row" style="border: 1px solid #dee2e6;">
                                                                            <div class="col-md-4" style="padding-left: 0.5%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input type="radio" id="ns1Positive" name="ns1" class="custom-control-input" value="positive" onclick="testRequired()">
                                                                                    <label class="custom-control-label" for="ns1Positive">NS-1 Positive</label>
                                                                                </div>
                                                                                <div class="custom-control custom-radio">
                                                                                    <input type="radio" id="ns1Negative" name="ns1" class="custom-control-input" value="negative" onclick="testRequired()">
                                                                                    <label class="custom-control-label" for="ns1Negative">NS-1 Negative</label>
                                                                                </div>                                                     
                                                                            </div>
                                                                            <div class="col-md-4" style="padding-left: 1%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input type="radio" id="igmPositive" name="igm" class="custom-control-input" value="positive" onclick="testRequired()">
                                                                                    <label class="custom-control-label" for="igmPositive">IgM Positive</label>
                                                                                </div>
                                                                                <div class="custom-control custom-radio">
                                                                                    <input type="radio" id="igmNegative" name="igm" class="custom-control-input" value="negative" required onclick="testRequired()">
                                                                                    <label class="custom-control-label" for="igmNegative">IgM Negative</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4" style="padding-left: 1%; padding-right: 0%;">
                                                                                <div class="custom-control custom-radio">
                                                                                    <input type="radio" id="iggPositive" name="igg" class="custom-control-input" value="positive" onclick="testRequired()">
                                                                                    <label class="custom-control-label" for="iggPositive">IgG Positive</label>
                                                                                </div>
                                                                                <div class="custom-control custom-radio">
                                                                                    <input type="radio" id="iggNegative" name="igg" class="custom-control-input" value="negative" onclick="testRequired()">
                                                                                    <label class="custom-control-label" for="iggNegative">IgG Negative</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <small id="labTestAlert" class="form-text text-muted">Please Select Atleast One Test</small>
                                                                    </div> 
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="denConfTest" class="col-md-4 col-form-label">Dengue Virus Serotype:</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" id="denv1" class="custom-control-input" name="denv1" onclick="seroTypeRequired()" @if($result->denv1 == 'Yes') checked @endif>
                                                                            <label for="denv1" class="custom-control-label">DENV 1</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" id="denv2" class="custom-control-input" name="denv2" required onclick="seroTypeRequired()" @if($result->denv2 == 'Yes') checked @endif>
                                                                            <label for="denv2" class="custom-control-label">DENV 2</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" id="denv3" class="custom-control-input" name="denv3" onclick="seroTypeRequired()" @if($result->denv3 == 'Yes') checked @endif>
                                                                            <label for="denv3" class="custom-control-label">DENV 3</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" id="denv4" class="custom-control-input" name="denv4" onclick="seroTypeRequired()" @if($result->denv4 == 'Yes') checked @endif>
                                                                            <label for="denv4" class="custom-control-label">DENV 4</label>
                                                                        </div>
                                                                        <small id="seroType" class="form-text text-muted">Please Select Atleast One Type</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <input type="submit" value="Save changes" name="editResultDetails" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>                                                
                                        </td>
                                        <td>
                                            <form method="POST" action="/labResults/{{ $result->id }}" onsubmit="return confirmDelete()">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-link" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection