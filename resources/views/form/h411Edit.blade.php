@extends('layouts.app')

@section('content')
<script type="text/javascript">
    window.onload = myAlert;
    function myAlert(){
        if("{{ $h411Data->status }}" === "sent"){
            var form = document.getElementById("h411Edit");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = true;
            }
        }
    }
    function confSubmit() {
        var x = confirm("Are you sure you want to submit the form?");
        if (x) return true;
        else return false;
    }
</script>
<script src="{{ asset('js/h411.js') }}"></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'PHI')
            <li class="breadcrumb-item"><a href="../../pHIHome" style="text-decoration: none;">Home</a></li>
        @elseif ($userType == 'MOH')
            <li class="breadcrumb-item"><a href="../../mOHHome" style="text-decoration: none;">Home</a></li>
        @endif        
        <li class="breadcrumb-item active" aria-current="page">H411</li>
    </ol>
</nav>

<div class="container" style="margin-top: 3%">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h6>DEPARTMENT OF HEALTH</h6><hr/>
                    <h5>Communicable Disease Report - Part I</h5>
                </div>
                <div class="card-body" style="padding: 1%;">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <br>
                    <form id="h411Edit" method="POST" action="/h411/{{ $h411Data->h411RecordId }}" onsubmit="return confSubmit()">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pHIRegNo" class="col-form-label">P.H.I. Registration No.</label>
                                    <input type="text" class="form-control{{ $errors->has('pHIRegNo') ? ' is-invalid' : '' }}" id="pHIRegNo" name="pHIRegNo" value="{{ $h411Data->pHIRegNo }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pHIRange" class="col-form-label">P.H.I. Range</label>
                                    <input type="text" class="form-control{{ $errors->has('pHIRange') ? ' is-invalid' : '' }}" id="pHIRange" name="pHIRange" value="{{ $h411Data->pHIRange }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="mOHNotifyNo" class="col-form-label">M.O.H. Notification No.</label>
                                    <input type="text" class="form-control{{ $errors->has('mOHNotifyNo') ? ' is-invalid' : '' }}" id="mOHNotifyNo" name="mOHNotifyNo" value="{{ $h411Data->mOHNotifyNo }}" autofocus>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mOHArea" class="col-form-label">M.O.H. Area</label>
                                    <input type="text" class="form-control{{ $errors->has('mOHArea') ? ' is-invalid' : '' }}" id="mOHArea" name="mOHArea" value="{{ $h411Data->mOHArea }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mOHRegNo" class="col-form-label">M.O.H. Registration No.</label>
                                    <input type="text" class="form-control{{ $errors->has('mOHRegNo') ? ' is-invalid' : '' }}" id="mOHRegNo" name="mOHRegNo" value="{{ $h411Data->mOHRegNo }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="border-top: 1px solid #dee2e6; border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row" id="diseaseNotified">
                                                <label for="diseaseNotified" class="col-sm-4 col-form-label">Disease is notified</label>
                                                <div class="col-sm-7">
                                                    <select id="diseaseNotified" name="diseaseNotified" class="form-control{{ $errors->has('diseaseNotified') ? ' is-invalid' : '' }}" value="{{ old('diseaseNotified') }}" autofocus>
                                                        @php $or = 'or'; @endphp
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis" {{ $h411Data->diseaseNotified == 'Acute Poliomyelitis / Acute Flaccid Paralysis' ? 'selected' : '' }}>Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox" {{ $h411Data->diseaseNotified == 'Chicken Pox' ? 'selected' : '' }}>Chicken Pox</option>
                                                        <option value="Cholera" {{ $h411Data->diseaseNotified == 'Cholera' ? 'selected' : '' }}>Cholera</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever" {{ $h411Data->diseaseNotified == 'Dengue Fever / Dengue Haemorrhagic Fever' ? 'selected' : '' }}>Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria" {{ $h411Data->diseaseNotified == 'Diphtheria' ? 'selected' : '' }}>Diphtheria</option>
                                                        <option value="Dysentery" {{ $h411Data->diseaseNotified == 'Dysentery' ? 'selected' : '' }}>Dysentery</option>
                                                        <option value="Encephalitis" {{ $h411Data->diseaseNotified == 'Encephalitis' ? 'selected' : '' }}>Encephalitis</option>
                                                        <option value="Enteric Fever" {{ $h411Data->diseaseNotified == 'Enteric Fever' ? 'selected' : '' }}>Enteric Fever</option>
                                                        <option value="Food Poisoning" {{ $h411Data->diseaseNotified == 'Food Poisoning' ? 'selected' : '' }}>Food Poisoning</option>
                                                        <option value="Human Rabies" {{ $h411Data->diseaseNotified == 'Human Rabies' ? 'selected' : '' }}>Human Rabies</option>
                                                        <option value="Leishmaniasis" {{ $h411Data->diseaseNotified == 'Leishmaniasis' ? 'selected' : '' }}>Leishmaniasis</option>
                                                        <option value="Leprosy" {{ $h411Data->diseaseNotified == 'Leprosy' ? 'selected' : '' }}>Leprosy</option>
                                                        <option value="Leptospirosis" {{ $h411Data->diseaseNotified == 'Leptospirosis' ? 'selected' : '' }}>Leptospirosis</option>
                                                        <option value="Malaria" {{ $h411Data->diseaseNotified == 'Malaria' ? 'selected' : '' }}>Malaria</option>
                                                        <option value="Measles" {{ $h411Data->diseaseNotified == 'Measles' ? 'selected' : '' }}>Measles</option>
                                                        <option value="Meningitis" {{ $h411Data->diseaseNotified == 'Meningitis' ? 'selected' : '' }}>Meningitis</option>
                                                        <option value="Mumps" {{ $h411Data->diseaseNotified == 'Mumps' ? 'selected' : '' }}>Mumps</option>
                                                        <option value="Neonatal Tetanus" {{ $h411Data->diseaseNotified == 'Neonatal Tetanus' ? 'selected' : '' }}>Neonatal Tetanus</option>
                                                        <option value="Plague" {{ $h411Data->diseaseNotified == 'Plague' ? 'selected' : '' }}>Plague</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom" {{ $h411Data->diseaseNotified == 'Rubella / Congenital Rubella Syndrom' ? 'selected' : '' }}>Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more" {{$h411Data->diseaseNotified == 'Simple Continued Fever of over 7 days '.$or.' more' ? 'selected' : '' }}>Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus" {{ $h411Data->diseaseNotified == 'Tetanus' ? 'selected' : '' }}>Tetanus</option>
                                                        <option value="Tuberculosis" {{ $h411Data->diseaseNotified == 'Tuberculosis' ? 'selected' : '' }}>Tuberculosis</option>
                                                        <option value="Typhus Fever" {{ $h411Data->diseaseNotified == 'Typhus Fever' ? 'selected' : '' }}>Typhus Fever</option>
                                                        <option value="Viral Hepatitis" {{ $h411Data->diseaseNotified == 'Viral Hepatitis' ? 'selected' : '' }}>Viral Hepatitis</option>
                                                        <option value="Whooping Cough" {{ $h411Data->diseaseNotified == 'Whooping Cough' ? 'selected' : '' }}>Whooping Cough</option>
                                                        <option value="Yellow Fever" {{ $h411Data->diseaseNotified == 'Yellow Fever' ? 'selected' : '' }}>Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="dateNotified" class="col-sm-4 col-form-label">Notified Date</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateNotified') ? ' is-invalid' : '' }}" id="dateNotified" name="dateNotified" value="{{ $h411Data->dateNotified }}" required autofocus onchange="setDateFromNotified()">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row" id="diseaseConfirmed">
                                                <label for="diseaseConfirmed" class="col-sm-4 col-form-label">Disease confirmed</label>
                                                <div class="col-sm-7">
                                                    <select id="diseaseConfirmed" name="diseaseConfirmed" class="form-control{{ $errors->has('diseaseConfirmed') ? ' is-invalid' : '' }}" value="{{ old('diseaseConfirmed') }}" autofocus>
                                                        @php $or = 'or'; @endphp
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis" {{ $h411Data->diseaseConfirmed == 'Acute Poliomyelitis / Acute Flaccid Paralysis' ? 'selected' : '' }}>Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox" {{ $h411Data->diseaseConfirmed == 'Chicken Pox' ? 'selected' : '' }}>Chicken Pox</option>
                                                        <option value="Cholera" {{ $h411Data->diseaseConfirmed == 'Cholera' ? 'selected' : '' }}>Cholera</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever" {{ $h411Data->diseaseConfirmed == 'Dengue Fever / Dengue Haemorrhagic Fever' ? 'selected' : '' }}>Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria" {{ $h411Data->diseaseConfirmed == 'Diphtheria' ? 'selected' : '' }}>Diphtheria</option>
                                                        <option value="Dysentery" {{ $h411Data->diseaseConfirmed == 'Dysentery' ? 'selected' : '' }}>Dysentery</option>
                                                        <option value="Encephalitis" {{ $h411Data->diseaseConfirmed == 'Encephalitis' ? 'selected' : '' }}>Encephalitis</option>
                                                        <option value="Enteric Fever" {{ $h411Data->diseaseConfirmed == 'Enteric Fever' ? 'selected' : '' }}>Enteric Fever</option>
                                                        <option value="Food Poisoning" {{ $h411Data->diseaseConfirmed == 'Food Poisoning' ? 'selected' : '' }}>Food Poisoning</option>
                                                        <option value="Human Rabies" {{ $h411Data->diseaseConfirmed == 'Human Rabies' ? 'selected' : '' }}>Human Rabies</option>
                                                        <option value="Leishmaniasis" {{ $h411Data->diseaseConfirmed == 'Leishmaniasis' ? 'selected' : '' }}>Leishmaniasis</option>
                                                        <option value="Leprosy" {{ $h411Data->diseaseConfirmed == 'Leprosy' ? 'selected' : '' }}>Leprosy</option>
                                                        <option value="Leptospirosis" {{ $h411Data->diseaseConfirmed == 'Leptospirosis' ? 'selected' : '' }}>Leptospirosis</option>
                                                        <option value="Malaria" {{ $h411Data->diseaseConfirmed == 'Malaria' ? 'selected' : '' }}>Malaria</option>
                                                        <option value="Measles" {{ $h411Data->diseaseConfirmed == 'Measles' ? 'selected' : '' }}>Measles</option>
                                                        <option value="Meningitis" {{ $h411Data->diseaseConfirmed == 'Meningitis' ? 'selected' : '' }}>Meningitis</option>
                                                        <option value="Mumps" {{ $h411Data->diseaseConfirmed == 'Mumps' ? 'selected' : '' }}>Mumps</option>
                                                        <option value="Neonatal Tetanus" {{ $h411Data->diseaseConfirmed == 'Neonatal Tetanus' ? 'selected' : '' }}>Neonatal Tetanus</option>
                                                        <option value="Plague" {{ $h411Data->diseaseConfirmed == 'Plague' ? 'selected' : '' }}>Plague</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom" {{ $h411Data->diseaseConfirmed == 'Rubella / Congenital Rubella Syndrom' ? 'selected' : '' }}>Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more" {{$h411Data->diseaseConfirmed == 'Simple Continued Fever of over 7 days '.$or.' more' ? 'selected' : '' }}>Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus" {{ $h411Data->diseaseConfirmed == 'Tetanus' ? 'selected' : '' }}>Tetanus</option>
                                                        <option value="Tuberculosis" {{ $h411Data->diseaseConfirmed == 'Tuberculosis' ? 'selected' : '' }}>Tuberculosis</option>
                                                        <option value="Typhus Fever" {{ $h411Data->diseaseConfirmed == 'Typhus Fever' ? 'selected' : '' }}>Typhus Fever</option>
                                                        <option value="Viral Hepatitis" {{ $h411Data->diseaseConfirmed == 'Viral Hepatitis' ? 'selected' : '' }}>Viral Hepatitis</option>
                                                        <option value="Whooping Cough" {{ $h411Data->diseaseConfirmed == 'Whooping Cough' ? 'selected' : '' }}>Whooping Cough</option>
                                                        <option value="Yellow Fever" {{ $h411Data->diseaseConfirmed == 'Yellow Fever' ? 'selected' : '' }}>Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="dateConfirmed" class="col-sm-4 col-form-label">Confirmed Date</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateConfirmed') ? ' is-invalid' : '' }}" id="dateConfirmed" name="dateConfirmed" value="{{ $h411Data->dateConfirmed }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: 1px solid #dee2e6; border-right: 1px solid #dee2e6; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="patientName" class="col-sm-4 col-form-label">Name of Patient</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" id="firstName" name="firstName" value="{{ $h411Data->firstName }}" required autofocus>
                                                    <small id="firstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" id="lastName" name="lastName" value="{{ $h411Data->lastName }}" required autofocus>
                                                    <small id="lastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%;">
                                            <div class="form-group row" id="dateOfBirth">
                                                <label for="birthDate" class="col-sm-4 col-form-label">Date of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('birthDate') ? ' is-invalid' : '' }}" id="birthDate" name="birthDate" value="{{ $h411Data->birthDate }}" autofocus onchange="getAge()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="yearOnly" class="col-sm-4 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="yearOnly" class="custom-control-input{{ $errors->has('yearOnly') ? ' is-invalid' : '' }}" name="yearOnly" value="{{ old('yearOnly') }}" autofocus onclick="checkDOB()" @if($h411Data->birthYear != NULL) checked @endif>
                                                        <label for="yearOnly" class="custom-control-label">Year Only</label>
                                                    </div>
                                                </div>        
                                            </div>

                                            <div class="form-group row" id="yearOfBirth" style="display:none">
                                                <label for="birthYear" class="col-sm-4 col-form-label">Year of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control{{ $errors->has('birthYear') ? ' is-invalid' : '' }}" id="birthYear" name="birthYear" value="{{ $h411Data->birthYear }}" autofocus onkeyup="getAge()" onclick="getAge()">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('addLine1') ? ' is-invalid' : '' }}" id="addLine1" name="addLine1" value="{{ $h411Data->addLine1 }}" required autofocus>
                                                    <small class="form-text text-muted">Address Line 1</small>
                                                </div>       
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" value="{{ $h411Data->age }}" readonly required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="addLine2" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('addLine2') ? ' is-invalid' : '' }}" id="addLine2" name="addLine2" value="{{ $h411Data->addLine2 }}" autofocus>
                                                    <small class="form-text text-muted">Address Line 2</small>
                                                </div>       
                                            </div>
                                            
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="gSDivName" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="gSDivName" name="gSDivName" class="form-control{{ $errors->has('gSDivName') ? ' is-invalid' : '' }}" value="{{ old('gSDivName') }}" required autofocus onchange="configure1(this,gSDiv,dSDiv,district,province,addMOHArea,addPHIRange);">
                                                        <option value="" disabled selected>Select a GS Div Name</option>
                                                        <option value="Anthoniyarpuram" {{ $h411Data->gSDivName == 'Anthoniyarpuram' ? 'selected' : '' }}>Anthoniyarpuram</option>
                                                        <option value="Ariyalai Center" {{ $h411Data->gSDivName == 'Ariyalai Center' ? 'selected' : '' }}>Ariyalai Center</option>
                                                        <option value="Ariyalai Center North" {{ $h411Data->gSDivName == 'Ariyalai Center North' ? 'selected' : '' }}>Ariyalai Center North</option>
                                                        <option value="Ariyalai Center South" {{ $h411Data->gSDivName == 'Ariyalai Center South' ? 'selected' : '' }}>Ariyalai Center South</option>
                                                        <option value="Ariyalai Center West" {{ $h411Data->gSDivName == 'Ariyalai Center West' ? 'selected' : '' }}>Ariyalai Center West</option>
                                                        <option value="Ariyalai North West" {{ $h411Data->gSDivName == 'Ariyalai North West' ? 'selected' : '' }}>Ariyalai North West</option>
                                                        <option value="Ariyalai South West" {{ $h411Data->gSDivName == 'Ariyalai South West' ? 'selected' : '' }}>Ariyalai South West</option>
                                                        <option value="Athiyady" {{ $h411Data->gSDivName == 'Athiyady' ? 'selected' : '' }}>Athiyady</option>
                                                        <option value="Chundukuli North" {{ $h411Data->gSDivName == 'Chundukuli North' ? 'selected' : '' }}>Chundukuli North</option>
                                                        <option value="Chundukuli South" {{ $h411Data->gSDivName == 'Chundukuli South' ? 'selected' : '' }}>Chundukuli South</option>
                                                        <option value="Colompuththurai East" {{ $h411Data->gSDivName == 'Colompuththurai East' ? 'selected' : '' }}>Colompuththurai East</option>
                                                        <option value="Colompuththurai West" {{ $h411Data->gSDivName == 'Colompuththurai West' ? 'selected' : '' }}>Colompuththurai West</option>
                                                        <option value="Eachchamodai" {{ $h411Data->gSDivName == 'Eachchamodai' ? 'selected' : '' }}>Eachchamodai</option>
                                                        <option value="Fort" {{ $h411Data->gSDivName == 'Fort' ? 'selected' : '' }}>Fort</option>
                                                        <option value="Grand Bazaar" {{ $h411Data->gSDivName == 'Grand Bazaar' ? 'selected' : '' }}>Grand Bazaar</option>
                                                        <option value="Gurunagar East" {{ $h411Data->gSDivName == 'Gurunagar East' ? 'selected' : '' }}>Gurunagar East</option>
                                                        <option value="Gurunagar West" {{ $h411Data->gSDivName == 'Gurunagar West' ? 'selected' : '' }}>Gurunagar West</option>
                                                        <option value="Illupaikadavai" {{ $h411Data->gSDivName == 'Illupaikadavai' ? 'selected' : '' }}>Illupaikadavai</option>
                                                        <option value="Iyanar kovilady" {{ $h411Data->gSDivName == 'Iyanar kovilady' ? 'selected' : '' }}>Iyanar kovilady</option>
                                                        <option value="Jaffna town East" {{ $h411Data->gSDivName == 'Jaffna town East' ? 'selected' : '' }}>Jaffna town East</option>
                                                        <option value="Jaffna town West" {{ $h411Data->gSDivName == 'Jaffna town West' ? 'selected' : '' }}>Jaffna town West</option>
                                                        <option value="Kandarmadam N.E" {{ $h411Data->gSDivName == 'Kandarmadam N.E' ? 'selected' : '' }}>Kandarmadam N.E</option>
                                                        <option value="Kandarmadam N.W" {{ $h411Data->gSDivName == 'Kandarmadam N.W' ? 'selected' : '' }}>Kandarmadam N.W</option>
                                                        <option value="Kandarmadam S.E" {{ $h411Data->gSDivName == 'Kandarmadam S.E' ? 'selected' : '' }}>Kandarmadam S.E</option>
                                                        <option value="Kandarmadam S.W" {{ $h411Data->gSDivName == 'Kandarmadam S.W' ? 'selected' : '' }}>Kandarmadam S.W</option>
                                                        <option value="Keerisuddan" {{ $h411Data->gSDivName == 'Keerisuddan' ? 'selected' : '' }}>Keerisuddan</option>
                                                        <option value="koddady" {{ $h411Data->gSDivName == 'koddady' ? 'selected' : '' }}>koddady</option>
                                                        <option value="Madhu" {{ $h411Data->gSDivName == 'Madhu' ? 'selected' : '' }}>Madhu</option>
                                                        <option value="Maruthady" {{ $h411Data->gSDivName == 'Maruthady' ? 'selected' : '' }}>Maruthady</option>
                                                        <option value="Moor Street North" {{ $h411Data->gSDivName == 'Moor Street North' ? 'selected' : '' }}>Moor Street North</option>
                                                        <option value="Moor Street South" {{ $h411Data->gSDivName == 'Moor Street South' ? 'selected' : '' }}>Moor Street South</option>
                                                        <option value="Nadankulam" {{ $h411Data->gSDivName == 'Nadankulam' ? 'selected' : '' }}>Nadankulam</option>
                                                        <option value="Nallur North" {{ $h411Data->gSDivName == 'Nallur North' ? 'selected' : '' }}>Nallur North</option>
                                                        <option value="Nallur Rajathany" {{ $h411Data->gSDivName == 'Nallur Rajathany' ? 'selected' : '' }}>Nallur Rajathany</option>
                                                        <option value="Nallur South" {{ $h411Data->gSDivName == 'Nallur South' ? 'selected' : '' }}>Nallur South</option>
                                                        <option value="Navanthurai North" {{ $h411Data->gSDivName == 'Navanthurai North' ? 'selected' : '' }}>Navanthurai North</option>
                                                        <option value="Navanthurai South" {{ $h411Data->gSDivName == 'Navanthurai South' ? 'selected' : '' }}>Navanthurai South</option>
                                                        <option value="Neeraviyady" {{ $h411Data->gSDivName == 'Neeraviyady' ? 'selected' : '' }}>Neeraviyady</option>
                                                        <option value="New Moor Street" {{ $h411Data->gSDivName == 'New Moor Street' ? 'selected' : '' }}>New Moor Street</option>
                                                        <option value="Palampiddy" {{ $h411Data->gSDivName == 'Palampiddy' ? 'selected' : '' }}>Palampiddy</option>
                                                        <option value="Paliaru" {{ $h411Data->gSDivName == 'Paliaru' ? 'selected' : '' }}>Paliaru</option>
                                                        <option value="Passaiyoor East" {{ $h411Data->gSDivName == 'Passaiyoor East' ? 'selected' : '' }}>Passaiyoor East</option>
                                                        <option value="Passaiyoor West" {{ $h411Data->gSDivName == 'Passaiyoor West' ? 'selected' : '' }} {{ $h411Data->gSDivName == 'Passaiyoor West' ? 'selected' : '' }}>Passaiyoor West</option>
                                                        <option value="Periyapandivirichchan East" {{ $h411Data->gSDivName == 'Periyapandivirichchan East' ? 'selected' : '' }}>Periyapandivirichchan East</option>
                                                        <option value="Periyapandivirichchan West" {{ $h411Data->gSDivName == 'Periyapandivirichchan West' ? 'selected' : '' }}>Periyapandivirichchan West</option>
                                                        <option value="Reclamation East" {{ $h411Data->gSDivName == 'Reclamation East' ? 'selected' : '' }}>Reclamation East</option>
                                                        <option value="Reclamation West" {{ $h411Data->gSDivName == 'Reclamation West' ? 'selected' : '' }}>Reclamation West</option>
                                                        <option value="Sangiliyan thoppu" {{ $h411Data->gSDivName == 'Sangiliyan thoppu' ? 'selected' : '' }}>Sangiliyan thoppu</option>
                                                        <option value="Sirampaiyady" {{ $h411Data->gSDivName == 'Sirampaiyady' ? 'selected' : '' }}>Sirampaiyady</option>
                                                        <option value="Small bazaar" {{ $h411Data->gSDivName == 'Small bazaar' ? 'selected' : '' }}>Small bazaar</option>
                                                        <option value="Thevanpiddy" {{ $h411Data->gSDivName == 'Thevanpiddy' ? 'selected' : '' }}>Thevanpiddy</option>
                                                        <option value="Thirunagar" {{ $h411Data->gSDivName == 'Thirunagar' ? 'selected' : '' }}>Thirunagar</option>
                                                        <option value="Vannarpannai" {{ $h411Data->gSDivName == 'Vannarpannai' ? 'selected' : '' }}>Vannarpannai</option>
                                                        <option value="Vannarpannai N.E" {{ $h411Data->gSDivName == 'Vannarpannai N.E' ? 'selected' : '' }}>Vannarpannai N.E</option>
                                                        <option value="Vannarpannai N.W" {{ $h411Data->gSDivName == 'Vannarpannai N.W' ? 'selected' : '' }}>Vannarpannai N.W</option>
                                                        <option value="Vannarpannai North" {{ $h411Data->gSDivName == 'Vannarpannai North' ? 'selected' : '' }}>Vannarpannai North</option>
                                                        <option value="Vellankulam" {{ $h411Data->gSDivName == 'Vellankulam' ? 'selected' : '' }}>Vellankulam</option>
                                                    </select>
                                                    <small class="form-text text-muted">GS Div Name</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="gSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="gSDiv" name="gSDiv" class="form-control{{ $errors->has('gSDiv') ? ' is-invalid' : '' }}" value="{{ old('gSDiv') }}" required autofocus onchange="configure2(this,gSDivName,dSDiv,district,province,addMOHArea,addPHIRange);">
                                                        <option value="" disabled selected>Select a GS Div</option>
                                                        <option value="J/61" {{ $h411Data->gSDiv == 'J/61' ? 'selected' : '' }}> J/61 </option>
                                                        <option value="J/62" {{ $h411Data->gSDiv == 'J/62' ? 'selected' : '' }}> J/62 </option>
                                                        <option value="J/63" {{ $h411Data->gSDiv == 'J/63' ? 'selected' : '' }}> J/63 </option>
                                                        <option value="J/64" {{ $h411Data->gSDiv == 'J/64' ? 'selected' : '' }}> J/64 </option>
                                                        <option value="J/65" {{ $h411Data->gSDiv == 'J/65' ? 'selected' : '' }}> J/65 </option>
                                                        <option value="J/66" {{ $h411Data->gSDiv == 'J/66' ? 'selected' : '' }}> J/66 </option>
                                                        <option value="J/67" {{ $h411Data->gSDiv == 'J/67' ? 'selected' : '' }}> J/67 </option>
                                                        <option value="J/68" {{ $h411Data->gSDiv == 'J/68' ? 'selected' : '' }}> J/68 </option>
                                                        <option value="J/69" {{ $h411Data->gSDiv == 'J/69' ? 'selected' : '' }}> J/69 </option>
                                                        <option value="J/70" {{ $h411Data->gSDiv == 'J/70' ? 'selected' : '' }}> J/70 </option>
                                                        <option value="J/71" {{ $h411Data->gSDiv == 'J/71' ? 'selected' : '' }}> J/71 </option>
                                                        <option value="J/72" {{ $h411Data->gSDiv == 'J/72' ? 'selected' : '' }}> J/72 </option>
                                                        <option value="J/73" {{ $h411Data->gSDiv == 'J/73' ? 'selected' : '' }}> J/73 </option>
                                                        <option value="J/74" {{ $h411Data->gSDiv == 'J/74' ? 'selected' : '' }}> J/74 </option>
                                                        <option value="J/75" {{ $h411Data->gSDiv == 'J/75' ? 'selected' : '' }}> J/75 </option>
                                                        <option value="J/76" {{ $h411Data->gSDiv == 'J/76' ? 'selected' : '' }}> J/76 </option>
                                                        <option value="J/77" {{ $h411Data->gSDiv == 'J/77' ? 'selected' : '' }}> J/77 </option>
                                                        <option value="J/78" {{ $h411Data->gSDiv == 'J/78' ? 'selected' : '' }}> J/78 </option>
                                                        <option value="J/79" {{ $h411Data->gSDiv == 'J/79' ? 'selected' : '' }}> J/79 </option>
                                                        <option value="J/80" {{ $h411Data->gSDiv == 'J/80' ? 'selected' : '' }}> J/80 </option>
                                                        <option value="J/81" {{ $h411Data->gSDiv == 'J/81' ? 'selected' : '' }}> J/81 </option>
                                                        <option value="J/82" {{ $h411Data->gSDiv == 'J/82' ? 'selected' : '' }}> J/82 </option>
                                                        <option value="J/83" {{ $h411Data->gSDiv == 'J/83' ? 'selected' : '' }}> J/83 </option>
                                                        <option value="J/84" {{ $h411Data->gSDiv == 'J/84' ? 'selected' : '' }}> J/84 </option>
                                                        <option value="J/85" {{ $h411Data->gSDiv == 'J/85' ? 'selected' : '' }}> J/85 </option>
                                                        <option value="J/86" {{ $h411Data->gSDiv == 'J/86' ? 'selected' : '' }}> J/86 </option>
                                                        <option value="J/87" {{ $h411Data->gSDiv == 'J/87' ? 'selected' : '' }}> J/87 </option>
                                                        <option value="J/88" {{ $h411Data->gSDiv == 'J/88' ? 'selected' : '' }}> J/88 </option>
                                                        <option value="J/91" {{ $h411Data->gSDiv == 'J/91' ? 'selected' : '' }}> J/91 </option>
                                                        <option value="J/92" {{ $h411Data->gSDiv == 'J/92' ? 'selected' : '' }}> J/92 </option>
                                                        <option value="J/93" {{ $h411Data->gSDiv == 'J/93' ? 'selected' : '' }}> J/93 </option>
                                                        <option value="J/94" {{ $h411Data->gSDiv == 'J/94' ? 'selected' : '' }}> J/94 </option>
                                                        <option value="J/95" {{ $h411Data->gSDiv == 'J/95' ? 'selected' : '' }}> J/95 </option>
                                                        <option value="J/96" {{ $h411Data->gSDiv == 'J/96' ? 'selected' : '' }}> J/96 </option>
                                                        <option value="J/97" {{ $h411Data->gSDiv == 'J/97' ? 'selected' : '' }}> J/97 </option>
                                                        <option value="J/98" {{ $h411Data->gSDiv == 'J/98' ? 'selected' : '' }}> J/98 </option>
                                                        <option value="J/99" {{ $h411Data->gSDiv == 'J/99' ? 'selected' : '' }}> J/99 </option>
                                                        <option value="J/100" {{ $h411Data->gSDiv == 'J/100' ? 'selected' : '' }}> J/100 </option>
                                                        <option value="J/101" {{ $h411Data->gSDiv == 'J/101' ? 'selected' : '' }}> J/101 </option>
                                                        <option value="J/102" {{ $h411Data->gSDiv == 'J/102' ? 'selected' : '' }}> J/102 </option>
                                                        <option value="J/103" {{ $h411Data->gSDiv == 'J/103' ? 'selected' : '' }}> J/103 </option>
                                                        <option value="J/104" {{ $h411Data->gSDiv == 'J/104' ? 'selected' : '' }}> J/104 </option>
                                                        <option value="J/105" {{ $h411Data->gSDiv == 'J/105' ? 'selected' : '' }}> J/105 </option>
                                                        <option value="J/106" {{ $h411Data->gSDiv == 'J/106' ? 'selected' : '' }}> J/106 </option>
                                                        <option value="J/107" {{ $h411Data->gSDiv == 'J/107' ? 'selected' : '' }}> J/107 </option>
                                                        <option value="J/108" {{ $h411Data->gSDiv == 'J/108' ? 'selected' : '' }}> J/108 </option>
                                                        <option value="J/109" {{ $h411Data->gSDiv == 'J/109' ? 'selected' : '' }}> J/109 </option>
                                                        <option value="MN/1" {{ $h411Data->gSDiv == 'MN/1' ? 'selected' : '' }}> MN/1 </option>
                                                        <option value="MN/2" {{ $h411Data->gSDiv == 'MN/2' ? 'selected' : '' }}> MN/2 </option>
                                                        <option value="MN/3" {{ $h411Data->gSDiv == 'MN/3' ? 'selected' : '' }}> MN/3 </option>
                                                        <option value="MN/4" {{ $h411Data->gSDiv == 'MN/4' ? 'selected' : '' }}> MN/4 </option>
                                                        <option value="MN/5" {{ $h411Data->gSDiv == 'MN/5' ? 'selected' : '' }}> MN/5 </option>
                                                        <option value="MN/37" {{ $h411Data->gSDiv == 'MN/37' ? 'selected' : '' }}> MN/37 </option>
                                                        <option value="MN/38" {{ $h411Data->gSDiv == 'MN/38' ? 'selected' : '' }}> MN/38 </option>
                                                        <option value="MN/39" {{ $h411Data->gSDiv == 'MN/39' ? 'selected' : '' }}> MN/39 </option>
                                                        <option value="MN/40" {{ $h411Data->gSDiv == 'MN/40' ? 'selected' : '' }}> MN/40 </option>
                                                        <option value="MN/41" {{ $h411Data->gSDiv == 'MN/41' ? 'selected' : '' }}> MN/41 </option>
                                                    </select>
                                                    <small class="form-text text-muted">GS Division</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $gender = ''; @endphp
                                            @if($h411Data->gender == 'Male')
                                                @php $gender = 'Male'; @endphp
                                            @elseif($h411Data->gender == 'Female')
                                                @php $gender = 'Female'; @endphp
                                            @elseif($h411Data->gender == 'Other')
                                                @php $gender = 'Other'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="male" name="gender" class="custom-control-input{{ $errors->has('male') ? ' is-invalid' : '' }}" value="Male" @if($gender == 'Male') checked @endif autofocus>
                                                        <label class="custom-control-label" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="female" name="gender" class="custom-control-input{{ $errors->has('female') ? ' is-invalid' : '' }}" value="Female" @if($gender == 'Female') checked @endif autofocus>
                                                        <label class="custom-control-label" for="female">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="other" name="gender" class="custom-control-input{{ $errors->has('other') ? ' is-invalid' : '' }}" value="Other" @if($gender == 'Other') checked @endif autofocus>
                                                        <label class="custom-control-label" for="other">Other</label>
                                                    </div>      
                                                </div>
                                            </div>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="dSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('dSDiv') ? ' is-invalid' : '' }}" id="dSDiv" name="dSDiv" value="{{ $h411Data->dSDiv }}" readonly required autofocus>
                                                    <small class="form-text text-muted">DS Division</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="district" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" id="district" name="district" value="{{ $h411Data->district }}" readonly required autofocus>
                                                    <small class="form-text text-muted">District</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="province" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" id="province" name="province" value="{{ $h411Data->province }}" readonly required autofocus>
                                                    <small id="province" class="form-text text-muted">Province</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $ethnicGroup = ''; @endphp
                                            @if($h411Data->ethnicGroup == 'SriLankan Tamil')
                                                @php $ethnicGroup = 'SriLankan Tamil'; @endphp
                                            @elseif($h411Data->ethnicGroup == 'Indian Tamil')
                                                @php $ethnicGroup = 'Indian Tamil'; @endphp
                                            @elseif($h411Data->ethnicGroup == 'Sinhala')
                                                @php $ethnicGroup = 'Sinhala'; @endphp
                                            @elseif($h411Data->ethnicGroup == 'Muslims')
                                                @php $ethnicGroup = 'Muslims'; @endphp
                                            @elseif($h411Data->ethnicGroup == 'Burghers')
                                                @php $ethnicGroup = 'Burghers'; @endphp
                                            @elseif($h411Data->ethnicGroup == 'Others')
                                                @php $ethnicGroup = 'Others'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="ethnicGroup" class="col-sm-4 col-form-label">Ethnic Group</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="sriLankanTamil" name="ethnicGroup" class="custom-control-input{{ $errors->has('sriLankanTamil') ? ' is-invalid' : '' }}" value="SriLankan Tamil" @if($ethnicGroup == 'SriLankan Tamil') checked @endif autofocus>
                                                        <label class="custom-control-label" for="sriLankanTamil">SriLankan Tamil</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indianTamil" name="ethnicGroup" class="custom-control-input{{ $errors->has('indianTamil') ? ' is-invalid' : '' }}" value="Indian Tamil" @if($ethnicGroup == 'Indian Tamil') checked @endif autofocus>
                                                        <label class="custom-control-label" for="indianTamil">Indian Tamil</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="sinhala" name="ethnicGroup" class="custom-control-input{{ $errors->has('sinhala') ? ' is-invalid' : '' }}" value="Sinhala" @if($ethnicGroup == 'Sinhala') checked @endif autofocus>
                                                        <label class="custom-control-label" for="sinhala">Sinhala</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="muslims" name="ethnicGroup" class="custom-control-input{{ $errors->has('muslims') ? ' is-invalid' : '' }}" value="Muslims" @if($ethnicGroup == 'Muslims') checked @endif autofocus>
                                                        <label class="custom-control-label" for="muslims">Muslims</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="burghers" name="ethnicGroup" class="custom-control-input{{ $errors->has('burghers') ? ' is-invalid' : '' }}" value="Burghers" @if($ethnicGroup == 'Burghers') checked @endif autofocus>
                                                        <label class="custom-control-label" for="burghers">Burghers</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="others" name="ethnicGroup" class="custom-control-input{{ $errors->has('others') ? ' is-invalid' : '' }}" value="Others" @if($ethnicGroup == 'Others') checked @endif autofocus>
                                                        <label class="custom-control-label" for="others">Others</label>
                                                    </div>     
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="addMOHArea" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="addMOHArea" name="addMOHArea" class="form-control{{ $errors->has('addMOHArea') ? ' is-invalid' : '' }}" value="{{ old('addMOHArea') }}" required autofocus onchange="configurePHI(this,document.getElementById('addPHIRange'));">
                                                        <option value="" disabled selected>Select a MOH Area</option>
                                                        <option value="{{ $h411Data->addMOHArea }}" selected>{{ $h411Data->addMOHArea }}</option>
                                                    </select>
                                                    <small class="form-text text-muted">MOH Area</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="addPHIRange" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="addPHIRange" name="addPHIRange" class="form-control{{ $errors->has('addPHIRange') ? ' is-invalid' : '' }}" value="{{ old('addPHIRange') }}" required autofocus>
                                                        <option value="" disabled selected>Select a PHI Range</option>
                                                        <option value="{{ $h411Data->addPHIRange }}" selected>{{ $h411Data->addPHIRange }}</option>
                                                    </select>
                                                    <small class="form-text text-muted">PHI Range</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%; padding-top: 0%; padding-bottom: 0%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: 1px solid #dee2e6; border-right: 1px solid #dee2e6; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="dateOnset" class="col-sm-4 col-form-label">Date of Onset</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateOnset') ? ' is-invalid' : '' }}" id="dateOnset" name="dateOnset" value="{{ $h411Data->dateOnset }}" required autofocus onchange="setDateFromOnset()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="dateHospitalisation" class="col-sm-4 col-form-label">Date of Hospitalisation</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateHospitalisation') ? ' is-invalid' : '' }}" id="dateHospitalisation" name="dateHospitalisation" value="{{ $h411Data->dateHospitalisation }}" required autofocus onchange="setDateFromHospitalisation()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="dateDischarge" class="col-sm-4 col-form-label">Date of Discharge</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateDischarge') ? ' is-invalid' : '' }}" id="dateDischarge" name="dateDischarge" value="{{ $h411Data->dateDischarge }}" required autofocus onchange="setDateFromDischarge()">
                                                </div>
                                            </div>

                                            <div class="form-group row" id="hospitalName">
                                                <label for="hospitalName" class="col-sm-4 col-form-label">Name of Hospital</label>
                                                <div class="col-sm-7">
                                                    <select id="hospitalName" name="hospitalName" class="form-control{{ $errors->has('hospitalName') ? ' is-invalid' : '' }}" value="{{ old('hospitalName') }}" autofocus>
                                                        <option value="" disabled selected>Select a hospital</option>
                                                        <option value="Jaffna Teaching Hospital" {{ $h411Data->hospitalName == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                        <option value="New Yarl Hospital" {{ $h411Data->hospitalName == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                        <option value="Northern Central Hospitals (pvt)" {{ $h411Data->hospitalName == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                        <option value="Rakavo Hospital" {{ $h411Data->hospitalName == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                        <option value="Ruhlins Hospital" {{ $h411Data->hospitalName == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                        <option value="Sujeeva Hospital" {{ $h411Data->hospitalName == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                        <option value="Nagaa Medical Centre" {{ $h411Data->hospitalName == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                        <option value="Sampanthar Modern Clinic" {{ $h411Data->hospitalName == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                        <option value="Shan's Health Care" {{ $h411Data->hospitalName == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                        <option value="Divisional Hospital" {{ $h411Data->hospitalName == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                        <option value="Sunrice Medi Clinic" {{ $h411Data->hospitalName == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                        <option value="Royal Medical Centre" {{ $h411Data->hospitalName == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                        <option value="Mangalapathy Siddha Ayurvedic" {{ $h411Data->hospitalName == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                        <option value="Shanthe Medi Clinic" {{ $h411Data->hospitalName == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                        <option value="Pillaiyar Medi Clinic" {{ $h411Data->hospitalName == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                        <option value="Modern New Medi Care Hospital" {{ $h411Data->hospitalName == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                        <option value="Care &amp; Cure" {{ $h411Data->hospitalName == 'Care & Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                        <option value="Renny Dental &amp; Optical Service" {{ $h411Data->hospitalName == 'Renny Dental & Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                        <option value="Dental Surgery" {{ $h411Data->hospitalName == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                        <option value="Life Care Medi Cilinic" {{ $h411Data->hospitalName == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                        <option value="Suharni Hospital" {{ $h411Data->hospitalName == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group">
                                                <label for="movement" class="col-form-label">Patient's movements during three weeks prior to onset</label>
                                                <textarea id="movement" class="form-control{{ $errors->has('movement') ? ' is-invalid' : '' }}" name="movement" rows="7">{{ $h411Data->movement }}</textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">
                                            @php $outcome = ''; @endphp
                                            @if($h411Data->outcome == 'Still in ward')
                                                @php $outcome = 'Still in ward'; @endphp
                                            @elseif($h411Data->outcome == 'Recovered')
                                                @php $outcome = 'Recovered'; @endphp
                                            @elseif($h411Data->outcome == 'Died')
                                                @php $outcome = 'Died'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="outcome" class="col-sm-4 col-form-label">Outcome</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="stillInWard" name="outcome" class="custom-control-input{{ $errors->has('stillInWard') ? ' is-invalid' : '' }}" value="Still in ward" @if($outcome == 'Still in ward') checked @endif autofocus>
                                                        <label class="custom-control-label" for="stillInWard">Still in ward</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="recovered" name="outcome" class="custom-control-input{{ $errors->has('recovered') ? ' is-invalid' : '' }}" value="Recovered" @if($outcome == 'Recovered') checked @endif autofocus>
                                                        <label class="custom-control-label" for="recovered">Recovered</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="died" name="outcome" class="custom-control-input{{ $errors->has('died') ? ' is-invalid' : '' }}" value="Died" @if($outcome == 'Died') checked @endif autofocus>
                                                        <label class="custom-control-label" for="died">Died</label>
                                                    </div>      
                                                </div>
                                            </div>

                                            @php $whereIsolated = ''; @endphp
                                            @if($h411Data->whereIsolated == 'House')
                                                @php $whereIsolated = 'House'; @endphp
                                            @elseif($h411Data->whereIsolated == 'Hospital')
                                                @php $whereIsolated = 'Hospital'; @endphp
                                            @elseif($h411Data->whereIsolated == 'Not Isolated')
                                                @php $whereIsolated = 'Not Isolated'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="whereIsolated" class="col-sm-4 col-form-label">Where Isolated</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="house" name="whereIsolated" class="custom-control-input{{ $errors->has('house') ? ' is-invalid' : '' }}" value="House" @if($whereIsolated == 'House') checked @endif autofocus>
                                                        <label class="custom-control-label" for="house">House</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="hospital" name="whereIsolated" class="custom-control-input{{ $errors->has('hospital') ? ' is-invalid' : '' }}" value="Hospital" @if($whereIsolated == 'Hospital') checked @endif autofocus>
                                                        <label class="custom-control-label" for="hospital">Hospital</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="notIsolated" name="whereIsolated" class="custom-control-input{{ $errors->has('notIsolated') ? ' is-invalid' : '' }}" value="Not Isolated" @if($whereIsolated == 'Not Isolated') checked @endif autofocus>
                                                        <label class="custom-control-label" for="notIsolated">Not Isolated</label>
                                                    </div>      
                                                </div>
                                            </div>          
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group">
                                                <label for="labFinding" class="col-form-label">Laboratory Finding</label>
                                                <textarea id="labFinding" class="form-control{{ $errors->has('labFinding') ? ' is-invalid' : '' }}" name="labFinding" rows="7">{{ $h411Data->labFinding }}</textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th scope="col" colspan="4">CONTACTS INVESTIGATED</th>
                                    </tr>
                                    <tr align="center">
                                        <th scope="col">Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Date Seen</th>
                                        <th scope="col">Observation</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">I. Patient's Household</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control{{ $errors->has('firstNameHousehold1') ? ' is-invalid' : '' }}" id="firstNameHousehold1" name="firstNameHousehold1" value="{{ $h411Data->firstNameHousehold1 }}" autofocus>
                                            <small id="firstNameHousehold1" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameHousehold1') ? ' is-invalid' : '' }}" id="lastNameHousehold1" name="lastNameHousehold1" value="{{ $h411Data->lastNameHousehold1 }}" autofocus>
                                            <small id="lastNameHousehold1" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageHousehold1') ? ' is-invalid' : '' }} input-sm" id="ageHousehold1" name="ageHousehold1" value="{{ $h411Data->ageHousehold1 }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenHousehold1') ? ' is-invalid' : '' }}" id="dateSeenHousehold1" name="dateSeenHousehold1" value="{{ $h411Data->dateSeenHousehold1 }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationHousehold1" class="form-control{{ $errors->has('observationHousehold1') ? ' is-invalid' : '' }}" name="observationHousehold1" rows="5" autofocus>{{ $h411Data->observationHousehold1 }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control{{ $errors->has('firstNameHousehold2') ? ' is-invalid' : '' }}" id="firstNameHousehold2" name="firstNameHousehold2" value="{{ $h411Data->firstNameHousehold2 }}" autofocus>
                                            <small id="firstNameHousehold2" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameHousehold2') ? ' is-invalid' : '' }}" id="lastNameHousehold2" name="lastNameHousehold2" value="{{ $h411Data->lastNameHousehold2 }}" autofocus>
                                            <small id="lastNameHousehold2" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageHousehold2') ? ' is-invalid' : '' }} input-sm" id="ageHousehold2" name="ageHousehold2" value="{{ $h411Data->ageHousehold2 }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenHousehold2') ? ' is-invalid' : '' }}" id="dateSeenHousehold2" name="dateSeenHousehold2" value="{{ $h411Data->dateSeenHousehold2 }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationHousehold2" class="form-control{{ $errors->has('observationHousehold2') ? ' is-invalid' : '' }}" name="observationHousehold2" rows="5" autofocus>{{ $h411Data->observationHousehold2 }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">II. Other Contacts</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control{{ $errors->has('firstNameOther1') ? ' is-invalid' : '' }}" id="firstNameOther1" name="firstNameOther1" value="{{ $h411Data->firstNameOther1 }}" autofocus>
                                            <small id="firstNameOther1" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameOther1') ? ' is-invalid' : '' }}" id="lastNameOther1" name="lastNameOther1" value="{{ $h411Data->lastNameOther1 }}" autofocus>
                                            <small id="lastNameOther1" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageOther1') ? ' is-invalid' : '' }} input-sm" id="ageOther1" name="ageOther1" value="{{ $h411Data->ageOther1 }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenOther1') ? ' is-invalid' : '' }}" id="dateSeenOther1" name="dateSeenOther1" value="{{ $h411Data->dateSeenOther1 }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationOther1" class="form-control{{ $errors->has('observationOther1') ? ' is-invalid' : '' }}" name="observationOther1" rows="5" autofocus>{{ $h411Data->observationOther1 }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control{{ $errors->has('firstNameOther2') ? ' is-invalid' : '' }}" id="firstNameOther2" name="firstNameOther2" value="{{ $h411Data->firstNameOther2 }}" autofocus>
                                            <small id="firstNameOther2" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameOther2') ? ' is-invalid' : '' }}" id="lastNameOther2" name="lastNameOther2" value="{{ $h411Data->lastNameOther2 }}" autofocus>
                                            <small id="lastNameOther2" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageOther2') ? ' is-invalid' : '' }} input-sm" id="ageOther2" name="ageOther2" value="{{ $h411Data->ageOther2 }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenOther2') ? ' is-invalid' : '' }}" id="dateSeenOther2" name="dateSeenOther2" value="{{ $h411Data->dateSeenOther2 }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationOther2" class="form-control{{ $errors->has('observationOther2') ? ' is-invalid' : '' }}" name="observationOther2" rows="5" autofocus>{{ $h411Data->observationOther2 }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <h6><i><b>PATIENT RELEVANT HISTORY OF EVENT</b></i></h6>
                            <br/>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">  
                                            <div class="form-group row">
                                                <label for="symptomsDevelopment" class="col-sm-4 col-form-label">Symptoms Development</label>
                                                <div class="col-sm-7"> 
                                                    <textarea id="symptomsDevelopment" class="form-control{{ $errors->has('symptomsDevelopment') ? ' is-invalid' : '' }}" name="symptomsDevelopment" rows="4" autofocus>{{ $h411Data->symptomsDevelopment }}</textarea>
                                                </div>
                                            </div>     
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $treatmentType = ''; @endphp
                                            @if($h411Data->treatmentType == 'Indigenous')
                                                @php $treatmentType = 'Indigenous'; @endphp
                                            @elseif($h411Data->treatmentType == 'Western')
                                                @php $treatmentType = 'Western'; @endphp
                                            @elseif($h411Data->treatmentType == 'Both')
                                                @php $treatmentType = 'Both'; @endphp
                                            @elseif($h411Data->treatmentType == 'No Treatement')
                                                @php $treatmentType = 'No Treatement'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="treatmentType" class="col-sm-4 col-form-label">Type of treatment getting</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indigenous" name="treatmentType" class="custom-control-input{{ $errors->has('indigenous') ? ' is-invalid' : '' }}" value="Indigenous" @if($treatmentType == 'Indigenous') checked @endif autofocus>
                                                        <label class="custom-control-label" for="indigenous">Indigenous</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="western" name="treatmentType" class="custom-control-input{{ $errors->has('western') ? ' is-invalid' : '' }}" value="Western" @if($treatmentType == 'Western') checked @endif autofocus>
                                                        <label class="custom-control-label" for="western">Western</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="both" name="treatmentType" class="custom-control-input{{ $errors->has('both') ? ' is-invalid' : '' }}" value="Both" @if($treatmentType == 'Both') checked @endif autofocus>
                                                        <label class="custom-control-label" for="both">Both</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="noTreatement" name="treatmentType" class="custom-control-input{{ $errors->has('noTreatement') ? ' is-invalid' : '' }}" value="No Treatement" @if($treatmentType == 'No Treatement') checked @endif autofocus>
                                                        <label class="custom-control-label" for="noTreatement">No Treatement</label>
                                                    </div>      
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">  
                                            <div class="form-group row">
                                                <label for="complications" class="col-sm-4 col-form-label">Complications</label>
                                                <div class="col-sm-7"> 
                                                    <textarea id="complications" class="form-control{{ $errors->has('complications') ? ' is-invalid' : '' }}" name="complications" rows="4" autofocus>{{ $h411Data->complications }}</textarea>
                                                </div>
                                            </div>     
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $infectionSource = ''; @endphp
                                            @if($h411Data->infectionSource == 'Home')
                                                @php $infectionSource = 'Home'; @endphp
                                            @elseif($h411Data->infectionSource == 'Working Place')
                                                @php $infectionSource = 'Working Place'; @endphp
                                            @elseif($h411Data->infectionSource == 'Outside')
                                                @php $infectionSource = 'Outside'; @endphp
                                            @elseif($h411Data->infectionSource == 'Other')
                                                @php $infectionSource = 'Other'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="infectionSource" class="col-sm-4 col-form-label">Possible Source of Infection</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="homeSource" name="infectionSource" class="custom-control-input{{ $errors->has('homeSource') ? ' is-invalid' : '' }}" value="Home" @if($infectionSource == 'Home') checked @endif autofocus>
                                                        <label class="custom-control-label" for="homeSource">Home</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="workingPlaceSource" name="infectionSource" class="custom-control-input{{ $errors->has('workingPlaceSource') ? ' is-invalid' : '' }}" value="Working Place" @if($infectionSource == 'Working Place') checked @endif autofocus>
                                                        <label class="custom-control-label" for="workingPlaceSource">Working Place</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="outsideSource" name="infectionSource" class="custom-control-input{{ $errors->has('outsideSource') ? ' is-invalid' : '' }}" value="Outside" @if($infectionSource == 'Outside') checked @endif autofocus>
                                                        <label class="custom-control-label" for="outsideSource">Outside</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="otherSource" name="infectionSource" class="custom-control-input{{ $errors->has('otherSource') ? ' is-invalid' : '' }}" value="Other" @if($infectionSource == 'Other') checked @endif autofocus>
                                                        <label class="custom-control-label" for="otherSource">Other</label>
                                                    </div>      
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">  
                                            <div class="form-group row">
                                                <label for="controlMeasuresTaken" class="col-sm-4 col-form-label">Control Measures Taken</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="sourceReduction" class="custom-control-input{{ $errors->has('sourceReduction') ? ' is-invalid' : '' }}" name="sourceReduction" value="{{ old('sourceReduction') }}" @if($h411Data->sourceReduction == 'Yes') checked @endif autofocus>
                                                        <label for="sourceReduction" class="custom-control-label">Source Reduction</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="bioControl" class="custom-control-input{{ $errors->has('bioControl') ? ' is-invalid' : '' }}" name="bioControl" value="{{ old('bioControl') }}" @if($h411Data->bioControl == 'Yes') checked @endif autofocus>
                                                        <label for="bioControl" class="custom-control-label">Bio Control</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="habitatModification" class="custom-control-input{{ $errors->has('habitatModification') ? ' is-invalid' : '' }}" name="habitatModification" value="{{ old('habitatModification') }}" @if($h411Data->habitatModification == 'Yes') checked @endif autofocus>
                                                        <label for="habitatModification" class="custom-control-label">Habitat Modification</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="otherControl" class="custom-control-input{{ $errors->has('otherControl') ? ' is-invalid' : '' }}" name="otherControl" value="{{ old('otherControl') }}" @if($h411Data->otherControl == 'Yes') checked @endif autofocus>
                                                        <label for="otherControl" class="custom-control-label">Other</label>
                                                    </div>
                                                </div>
                                            </div>     
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="preventiveMeasures" class="col-sm-4 col-form-label">Preventive Measures</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="removeGabage" class="custom-control-input{{ $errors->has('removeGabage') ? ' is-invalid' : '' }}" name="removeGabage" value="{{ old('removeGabage') }}" @if($h411Data->removeGabage == 'Yes') checked @endif autofocus>
                                                        <label for="removeGabage" class="custom-control-label">Remove Gabage</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="removeWaterStore" class="custom-control-input{{ $errors->has('removeWaterStore') ? ' is-invalid' : '' }}" name="removeWaterStore" value="{{ old('removeWaterStore') }}" @if($h411Data->removeWaterStore == 'Yes') checked @endif autofocus>
                                                        <label for="removeWaterStore" class="custom-control-label">Remove Water Store</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="useMosquitoNet" class="custom-control-input{{ $errors->has('useMosquitoNet') ? ' is-invalid' : '' }}" name="useMosquitoNet" value="{{ old('useMosquitoNet') }}" @if($h411Data->useMosquitoNet == 'Yes') checked @endif autofocus>
                                                        <label for="useMosquitoNet" class="custom-control-label">Use Mosquito Net</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="useInsectRepellent" class="custom-control-input{{ $errors->has('useInsectRepellent') ? ' is-invalid' : '' }}" name="useInsectRepellent" value="{{ old('useInsectRepellent') }}" @if($h411Data->useInsectRepellent == 'Yes') checked @endif autofocus>
                                                        <label for="useInsectRepellent" class="custom-control-label">Use insect repellent</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="otherPrevent" class="custom-control-input{{ $errors->has('otherPrevent') ? ' is-invalid' : '' }}" name="otherPrevent" value="{{ old('otherPrevent') }}" @if($h411Data->otherPrevent == 'Yes') checked @endif autofocus>
                                                        <label for="otherPrevent" class="custom-control-label">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">
                                            <div class="form-group row">
                                                <label for="followUp" class="col-sm-4 col-form-label">Follow Up</label>
                                                <div class="col-sm-7"> 
                                                    <textarea id="followUp" class="form-control{{ $errors->has('followUp') ? ' is-invalid' : '' }}" name="followUp" rows="3" autofocus>{{ $h411Data->followUp }}</textarea>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;"></td>
                                        @if($h411Data->status == 'draft')
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row mb-0">
                                                    <div class="offset-md-8">
                                                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                        &ensp;&ensp;
                                                        <button type="submit" name="send" class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
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
