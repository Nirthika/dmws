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
        @if ($userType == 'Principal Investigator')
            <li class="breadcrumb-item"><a href="/pIHome" style="text-decoration: none;">Home</a></li>
        @endif
        <li class="breadcrumb-item"><a href="/labResults" style="text-decoration: none;">Add Results</a></li>
        <li class="breadcrumb-item active" aria-current="page">Summary</li>
    </ol>
</nav>

<div class="container" style="margin-top: 2%">          
    <div class="col-12">
        <div class="card-deck">
            <div class="card w-100">
                <div class="card-header"><h5>Laboratory Results Summary</h5></div>
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
                                            <a href="{{ url('labResults/'.$result->id.'/edit') }}" class="btn-link" style="text-decoration: none;">Edit</a>
                                        </td>
                                        <td style="padding-top: 0.3%">
                                            <form method="POST" action="labResults/{{ $result->id }}" onsubmit="return confirmDelete()">
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