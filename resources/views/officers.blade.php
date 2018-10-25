@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 3%">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Doctor</button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body"> 
                    <?php $x = count($doctorData) ?>                               
                    @for ($i = $x-1; $i >= 0;)
                        <div class="row">
                            @for ($j = 0; $j < 6; $j++)
                                <div class="col-md-2 col-sm-4" style="padding: 0.5%">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('uploads/avatars/' . $doctorData[$i]->avatar) }}" alt="Card image cap">
                                        <div class="card-body" style="padding: 5%; height:5.5rem;">
                                            <h6 class="card-title" style="font-weight: bold;">{{ $doctorData[$i]->lastName }}</h6>
                                            <p class="card-text">{{ $doctorData[$i]->hospital1 }}</p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i-- ?>
                                @if ($i < 0)
                                    @break
                                @endif
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>

            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Medical Officer of Health</button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body"> 
                    <?php $x = count($mOHData) ?>                               
                    @for ($i = $x-1; $i >= 0;)
                        <div class="row">
                            @for ($j = 0; $j < 6; $j++)
                                <div class="col-md-2 col-sm-4" style="padding: 0.5%">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('uploads/avatars/' . $mOHData[$i]->avatar) }}" alt="Card image cap">
                                        <div class="card-body" style="padding: 5%; height:6rem;">
                                            <h6 class="card-title" style="font-weight: bold;">{{ $mOHData[$i]->lastName }}</h6>
                                            <p class="card-text">{{ $mOHData[$i]->insName }}</p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i-- ?>
                                @if ($i < 0)
                                    @break
                                @endif
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>

            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Public Health Inspector</button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body"> 
                    <?php $x = count($pHIData) ?>                               
                    @for ($i = $x-1; $i >= 0;)
                        <div class="row">
                            @for ($j = 0; $j < 6; $j++)
                                <div class="col-md-2 col-sm-4" style="padding: 0.5%">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('uploads/avatars/' . $pHIData[$i]->avatar) }}" alt="Card image cap">
                                        <div class="card-body" style="padding: 5%; height:6rem;">
                                            <h6 class="card-title" style="font-weight: bold;">{{ $pHIData[$i]->lastName }}</h6>
                                            <p class="card-text">{{ $pHIData[$i]->insName }}</p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i-- ?>
                                @if ($i < 0)
                                    @break
                                @endif
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>

            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Regional Directorate of Health Services</button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body"> 
                    <?php $x = count($rDHSData) ?>                               
                    @for ($i = $x-1; $i >= 0;)
                        <div class="row">
                            @for ($j = 0; $j < 6; $j++)
                                <div class="col-md-2 col-sm-4" style="padding: 1%">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('uploads/avatars/' . $rDHSData[$i]->avatar) }}" alt="Card image cap">
                                        <div class="card-body" style="padding: 5%; height:6rem;">
                                            <h6 class="card-title" style="font-weight: bold;">{{ $rDHSData[$i]->lastName }}</h6>
                                            <p class="card-text">{{ $rDHSData[$i]->insName }}</p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i-- ?>
                                @if ($i < 0)
                                    @break
                                @endif
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>

            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">Epidemiological Unit</button>
                </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body"> 
                    <?php $x = count($eUData) ?>                               
                    @for ($i = $x-1; $i >= 0;)
                        <div class="row">
                            @for ($j = 0; $j < 6; $j++)
                                <div class="col-md-2 col-sm-4" style="padding: 0.5%">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('uploads/avatars/' . $eUData[$i]->avatar) }}" alt="Card image cap">
                                        <div class="card-body" style="padding: 5%; height:6rem;">
                                            <h6 class="card-title" style="font-weight: bold;">{{ $eUData[$i]->lastName }}</h6>
                                            <p class="card-text">{{ $eUData[$i]->insName }}</p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i-- ?>
                                @if ($i < 0)
                                    @break
                                @endif
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
