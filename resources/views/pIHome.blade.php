@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container" style="margin-top: 2%;">
    <div class="card-deck">
        <div class="card" style="width: 18rem;">
            <div class="card-header">Laboratory Test</div>
            <div class="card-body">
                <p class="card-text">Details gathered from Medical and Molecular Entomology Research Laboratory</p>
                <a href="/labResults" class="btn btn-primary">Go</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">Field Survey</div>
            <div class="card-body">
                <p class="card-text">Monitoring details gathered from field survey</p>
                <a href="/fieldSurvey" class="btn btn-primary">Go</a>
            </div>
        </div>        
    </div>
</div>
@endsection
