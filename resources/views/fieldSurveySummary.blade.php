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
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'Principal Investigator')
            <li class="breadcrumb-item"><a href="/pIHome" style="text-decoration: none;">Home</a></li>
        @endif
        <li class="breadcrumb-item"><a href="/fieldSurvey" style="text-decoration: none;">Add Results</a></li>
        <li class="breadcrumb-item active" aria-current="page">Summary</li>
    </ol>
</nav>

<div class="container" style="margin-top: 2%">
	<div class="col-12">
        <div class="card-deck">
            <div class="card w-100">
                <div class="card-header"><h5>Field Survey Results Summary</h5></div>
                <div class="card-body">
                    <div class="table-responsive">                            
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Year</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Field Visit Area</th>
                                    <th scope="col">Number of Container Inspected</th>
                                    <th scope="col">Larva Positive</th>
                                    <th scope="col">Container Index</th>
                                    <th scope="col">Spesis Identified</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 0; ?>
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->year }}</td>                                            
                                        <td>{{ $result->month }}</td>
                                        <td>{{ $result->visitArea }}</td>
                                        <td>                                            
                                            Total Container: &ensp;
                                            <b>{{ $result->totalContainer }}</b> &ensp;
                                            <?php $x = $x+1; ?>
                                            <a class="btn btn-link" data-toggle="collapse" href="#{{ $x }}" role="button" aria-expanded="false" aria-controls="{{ $x }}">Details</a>
                                            <div class="collapse" id="{{ $x }}">
                                                <div class="card card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6"> Water Tank: </div>
                                                        <div class="col-sm-6"><b> {{ $result->waterTank }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Bottle: </div>
                                                        <div class="col-sm-6"><b> {{ $result->bottle }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Tea Cup: </div>
                                                        <div class="col-sm-6"><b> {{ $result->teaCup }} </b></div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-sm-6"> Coconut Shell: </div>
                                                        <div class="col-sm-6"><b> {{ $result->coconutShell }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Flower Pot: </div>
                                                        <div class="col-sm-6"><b> {{ $result->flowerPot }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Yoghurt Cup: </div>
                                                        <div class="col-sm-6"><b> {{ $result->yoghurtCup }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Pet Water Source: </div>
                                                        <div class="col-sm-6"><b> {{ $result->petWaterSource }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Fridge Waste Water Container: </div>
                                                        <div class="col-sm-6"><b> {{ $result->fridgeWasteWaterContainer }} </b></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"> Other: </div>
                                                        <div class="col-sm-6"><b> {{ $result->other }} </b></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>                                        
                                        <td>{{ $result->larvaPositive }}</td>
                                        <td>{{ $result->containerIndex }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6"> Aegypti: </div>
                                                <div class="col-sm-6"><b> {{ $result->aegypti }} </b></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6"> Albopictus: </div>
                                                <div class="col-sm-6"><b> {{ $result->albopictus }} </b></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ url('fieldSurvey/'.$result->id.'/edit') }}" class="btn-link" style="text-decoration: none;">Edit</a>
                                        </td>
                                        <td style="padding-top: 0.3%">
                                            <form method="POST" action="fieldSurvey/{{ $result->id }}" onsubmit="return confirmDelete()">
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