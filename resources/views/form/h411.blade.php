@extends('layouts.app')

@section('content')
<script type="text/javascript">
    window.onload = myAlert;
    function myAlert(){
        var inp = document.getElementsByTagName('input');
        for (var i = inp.length-1; i>=0; i--) {
            if ('radio'===inp[i].type || 'checkbox'===inp[i].type) inp[i].checked = false;
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
        <li class="breadcrumb-item"><a href="../pHIHome" style="text-decoration: none;">Home</a></li>
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
                    <form method="POST" action="/h411" onsubmit="return confSubmit()">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pHIRegNo" class="col-form-label">P.H.I. Registration No.</label>
                                    <input type="text" class="form-control{{ $errors->has('pHIRegNo') ? ' is-invalid' : '' }}" id="pHIRegNo" name="pHIRegNo" value="{{ $pHIRegNo }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pHIRange" class="col-form-label">P.H.I. Range</label>
                                    <input type="text" class="form-control{{ $errors->has('pHIRange') ? ' is-invalid' : '' }}" id="pHIRange" name="pHIRange" value="{{ $pHIRange }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="mOHNotifyNo" class="col-form-label">M.O.H. Notification No.</label>
                                    <input type="text" class="form-control{{ $errors->has('mOHNotifyNo') ? ' is-invalid' : '' }}" id="mOHNotifyNo" name="mOHNotifyNo" value="{{ old('mOHNotifyNo') }}" autofocus>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mOHArea" class="col-form-label">M.O.H. Area</label>
                                    <input type="text" class="form-control{{ $errors->has('mOHArea') ? ' is-invalid' : '' }}" id="mOHArea" name="mOHArea" value="{{ $mOHArea }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mOHRegNo" class="col-form-label">M.O.H. Registration No.</label>
                                    <input type="text" class="form-control{{ $errors->has('mOHRegNo') ? ' is-invalid' : '' }}" id="mOHRegNo" name="mOHRegNo" value="{{ old('mOHRegNo') }}" autofocus>
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
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis">Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox">Chicken Pox</option>
                                                        <option value="Cholera">Cholera</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever">Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria">Diphtheria</option>
                                                        <option value="Dysentery">Dysentery</option>
                                                        <option value="Encephalitis">Encephalitis</option>
                                                        <option value="Enteric Fever">Enteric Fever</option>
                                                        <option value="Food Poisoning">Food Poisoning</option>
                                                        <option value="Human Rabies">Human Rabies</option>
                                                        <option value="Leishmaniasis">Leishmaniasis</option>
                                                        <option value="Leprosy">Leprosy</option>
                                                        <option value="Leptospirosis">Leptospirosis</option>
                                                        <option value="Malaria">Malaria</option>
                                                        <option value="Measles">Measles</option>
                                                        <option value="Meningitis">Meningitis</option>
                                                        <option value="Mumps">Mumps</option>
                                                        <option value="Neonatal Tetanus">Neonatal Tetanus</option>
                                                        <option value="Plague">Plague</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom">Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more">Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus">Tetanus</option>
                                                        <option value="Tuberculosis">Tuberculosis</option>
                                                        <option value="Typhus Fever">Typhus Fever</option>
                                                        <option value="Viral Hepatitis">Viral Hepatitis</option>
                                                        <option value="Whooping Cough">Whooping Cough</option>
                                                        <option value="Yellow Fever">Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="dateNotified" class="col-sm-4 col-form-label">Notified Date</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateNotified') ? ' is-invalid' : '' }}" id="dateNotified" name="dateNotified" value="{{ old('dateNotified') }}" required autofocus onchange="setDateFromNotified()">
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
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis">Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox">Chicken Pox</option>
                                                        <option value="Cholera">Cholera</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever">Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria">Diphtheria</option>
                                                        <option value="Dysentery">Dysentery</option>
                                                        <option value="Encephalitis">Encephalitis</option>
                                                        <option value="Enteric Fever">Enteric Fever</option>
                                                        <option value="Food Poisoning">Food Poisoning</option>
                                                        <option value="Human Rabies">Human Rabies</option>
                                                        <option value="Leishmaniasis">Leishmaniasis</option>
                                                        <option value="Leprosy">Leprosy</option>
                                                        <option value="Leptospirosis">Leptospirosis</option>
                                                        <option value="Malaria">Malaria</option>
                                                        <option value="Measles">Measles</option>
                                                        <option value="Meningitis">Meningitis</option>
                                                        <option value="Mumps">Mumps</option>
                                                        <option value="Neonatal Tetanus">Neonatal Tetanus</option>
                                                        <option value="Plague">Plague</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom">Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more">Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus">Tetanus</option>
                                                        <option value="Tuberculosis">Tuberculosis</option>
                                                        <option value="Typhus Fever">Typhus Fever</option>
                                                        <option value="Viral Hepatitis">Viral Hepatitis</option>
                                                        <option value="Whooping Cough">Whooping Cough</option>
                                                        <option value="Yellow Fever">Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="dateConfirmed" class="col-sm-4 col-form-label">Confirmed Date</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateConfirmed') ? ' is-invalid' : '' }}" id="dateConfirmed" name="dateConfirmed" value="{{ old('dateConfirmed') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: 1px solid #dee2e6; border-right: 1px solid #dee2e6; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="patientName" class="col-sm-4 col-form-label">Name of Patient</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" id="firstName" name="firstName" value="{{ old('firstName') }}" required autofocus>
                                                    <small id="firstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" id="lastName" name="lastName" value="{{ old('lastName') }}" required autofocus>
                                                    <small id="lastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%;">
                                            <div class="form-group row" id="dateOfBirth">
                                                <label for="birthDate" class="col-sm-4 col-form-label">Date of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('birthDate') ? ' is-invalid' : '' }}" id="birthDate" name="birthDate" value="{{ old('birthDate') }}" autofocus onchange="getAge()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="yearOnly" class="col-sm-4 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="yearOnly" class="custom-control-input{{ $errors->has('yearOnly') ? ' is-invalid' : '' }}" name="yearOnly" value="{{ old('yearOnly') }}" autofocus onclick="checkDOB()">
                                                        <label for="yearOnly" class="custom-control-label">Year Only</label>
                                                    </div>
                                                </div>        
                                            </div>

                                            <div class="form-group row" id="yearOfBirth" style="display:none">
                                                <label for="birthYear" class="col-sm-4 col-form-label">Year of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control{{ $errors->has('birthYear') ? ' is-invalid' : '' }}" id="birthYear" name="birthYear" value="{{ old('birthYear') }}" autofocus onkeyup="getAge()" onclick="getAge()">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('addLine1') ? ' is-invalid' : '' }}" id="addLine1" name="addLine1" value="{{ old('addLine1') }}" required autofocus>
                                                    <small class="form-text text-muted">Address Line 1</small>
                                                </div>       
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" value="{{ old('age') }}" readonly required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="addLine2" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('addLine2') ? ' is-invalid' : '' }}" id="addLine2" name="addLine2" value="{{ old('addLine2') }}" autofocus>
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
                                                        <option value="Anthoniyarpuram">Anthoniyarpuram</option>
                                                        <option value="Ariyalai Center">Ariyalai Center</option>
                                                        <option value="Ariyalai Center North">Ariyalai Center North</option>
                                                        <option value="Ariyalai Center South">Ariyalai Center South</option>
                                                        <option value="Ariyalai Center West">Ariyalai Center West</option>
                                                        <option value="Ariyalai North West">Ariyalai North West</option>
                                                        <option value="Ariyalai South West">Ariyalai South West</option>
                                                        <option value="Athiyady">Athiyady</option>
                                                        <option value="Chundukuli North">Chundukuli North</option>
                                                        <option value="Chundukuli South">Chundukuli South</option>
                                                        <option value="Colompuththurai East">Colompuththurai East</option>
                                                        <option value="Colompuththurai West">Colompuththurai West</option>
                                                        <option value="Eachchamodai">Eachchamodai</option>
                                                        <option value="Fort">Fort</option>
                                                        <option value="Grand Bazaar">Grand Bazaar</option>
                                                        <option value="Gurunagar East">Gurunagar East</option>
                                                        <option value="Gurunagar West">Gurunagar West</option>
                                                        <option value="Illupaikadavai">Illupaikadavai</option>
                                                        <option value="Iyanar kovilady">Iyanar kovilady</option>
                                                        <option value="Jaffna town East">Jaffna town East</option>
                                                        <option value="Jaffna town West">Jaffna town West</option>
                                                        <option value="Kandarmadam N.E">Kandarmadam N.E</option>
                                                        <option value="Kandarmadam N.W">Kandarmadam N.W</option>
                                                        <option value="Kandarmadam S.E">Kandarmadam S.E</option>
                                                        <option value="Kandarmadam S.W">Kandarmadam S.W</option>
                                                        <option value="Keerisuddan">Keerisuddan</option>
                                                        <option value="koddady">koddady</option>
                                                        <option value="Madhu">Madhu</option>
                                                        <option value="Maruthady">Maruthady</option>
                                                        <option value="Moor Street North">Moor Street North</option>
                                                        <option value="Moor Street South">Moor Street South</option>
                                                        <option value="Nadankulam">Nadankulam</option>
                                                        <option value="Nallur North">Nallur North</option>
                                                        <option value="Nallur Rajathany">Nallur Rajathany</option>
                                                        <option value="Nallur South">Nallur South</option>
                                                        <option value="Navanthurai North">Navanthurai North</option>
                                                        <option value="Navanthurai South">Navanthurai South</option>
                                                        <option value="Neeraviyady">Neeraviyady</option>
                                                        <option value="New Moor Street">New Moor Street</option>
                                                        <option value="Palampiddy">Palampiddy</option>
                                                        <option value="Paliaru">Paliaru</option>
                                                        <option value="Passaiyoor East">Passaiyoor East</option>
                                                        <option value="Passaiyoor West">Passaiyoor West</option>
                                                        <option value="Periyapandivirichchan East">Periyapandivirichchan East</option>
                                                        <option value="Periyapandivirichchan West">Periyapandivirichchan West</option>
                                                        <option value="Reclamation East">Reclamation East</option>
                                                        <option value="Reclamation West">Reclamation West</option>
                                                        <option value="Sangiliyan thoppu">Sangiliyan thoppu</option>
                                                        <option value="Sirampaiyady">Sirampaiyady</option>
                                                        <option value="Small bazaar">Small bazaar</option>
                                                        <option value="Thevanpiddy">Thevanpiddy</option>
                                                        <option value="Thirunagar">Thirunagar</option>
                                                        <option value="Vannarpannai">Vannarpannai</option>
                                                        <option value="Vannarpannai N.E">Vannarpannai N.E</option>
                                                        <option value="Vannarpannai N.W">Vannarpannai N.W</option>
                                                        <option value="Vannarpannai North">Vannarpannai North</option>
                                                        <option value="Vellankulam">Vellankulam</option>
                                                    </select>
                                                    <small class="form-text text-muted">GS Div Name</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="gSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="gSDiv" name="gSDiv" class="form-control{{ $errors->has('gSDiv') ? ' is-invalid' : '' }}" value="{{ old('gSDiv') }}" required autofocus onchange="configure2(this,gSDivName,dSDiv,district,province,addMOHArea,addPHIRange);">
                                                        <option value="" disabled selected>Select a GS Div</option>
                                                        <option value="J/61"> J/61 </option>
                                                        <option value="J/62"> J/62 </option>
                                                        <option value="J/63"> J/63 </option>
                                                        <option value="J/64"> J/64 </option>
                                                        <option value="J/65"> J/65 </option>
                                                        <option value="J/66"> J/66 </option>
                                                        <option value="J/67"> J/67 </option>
                                                        <option value="J/68"> J/68 </option>
                                                        <option value="J/69"> J/69 </option>
                                                        <option value="J/70"> J/70 </option>
                                                        <option value="J/71"> J/71 </option>
                                                        <option value="J/72"> J/72 </option>
                                                        <option value="J/73"> J/73 </option>
                                                        <option value="J/74"> J/74 </option>
                                                        <option value="J/75"> J/75 </option>
                                                        <option value="J/76"> J/76 </option>
                                                        <option value="J/77"> J/77 </option>
                                                        <option value="J/78"> J/78 </option>
                                                        <option value="J/79"> J/79 </option>
                                                        <option value="J/80"> J/80 </option>
                                                        <option value="J/81"> J/81 </option>
                                                        <option value="J/82"> J/82 </option>
                                                        <option value="J/83"> J/83 </option>
                                                        <option value="J/84"> J/84 </option>
                                                        <option value="J/85"> J/85 </option>
                                                        <option value="J/86"> J/86 </option>
                                                        <option value="J/87"> J/87 </option>
                                                        <option value="J/88"> J/88 </option>
                                                        <option value="J/91"> J/91 </option>
                                                        <option value="J/92"> J/92 </option>
                                                        <option value="J/93"> J/93 </option>
                                                        <option value="J/94"> J/94 </option>
                                                        <option value="J/95"> J/95 </option>
                                                        <option value="J/96"> J/96 </option>
                                                        <option value="J/97"> J/97 </option>
                                                        <option value="J/98"> J/98 </option>
                                                        <option value="J/99"> J/99 </option>
                                                        <option value="J/100"> J/100 </option>
                                                        <option value="J/101"> J/101 </option>
                                                        <option value="J/102"> J/102 </option>
                                                        <option value="J/103"> J/103 </option>
                                                        <option value="J/104"> J/104 </option>
                                                        <option value="J/105"> J/105 </option>
                                                        <option value="J/106"> J/106 </option>
                                                        <option value="J/107"> J/107 </option>
                                                        <option value="J/108"> J/108 </option>
                                                        <option value="J/109"> J/109 </option>
                                                        <option value="MN/1"> MN/1 </option>
                                                        <option value="MN/2"> MN/2 </option>
                                                        <option value="MN/3"> MN/3 </option>
                                                        <option value="MN/4"> MN/4 </option>
                                                        <option value="MN/5"> MN/5 </option>
                                                        <option value="MN/37"> MN/37 </option>
                                                        <option value="MN/38"> MN/38 </option>
                                                        <option value="MN/39"> MN/39 </option>
                                                        <option value="MN/40"> MN/40 </option>
                                                        <option value="MN/41"> MN/41 </option>
                                                    </select>
                                                    <small class="form-text text-muted">GS Division</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="male" name="gender" class="custom-control-input{{ $errors->has('male') ? ' is-invalid' : '' }}" value="Male" required autofocus>
                                                        <label class="custom-control-label" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="female" name="gender" class="custom-control-input{{ $errors->has('female') ? ' is-invalid' : '' }}" value="Female" required autofocus>
                                                        <label class="custom-control-label" for="female">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="other" name="gender" class="custom-control-input{{ $errors->has('other') ? ' is-invalid' : '' }}" value="Other" required autofocus>
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
                                                    <input type="text" class="form-control{{ $errors->has('dSDiv') ? ' is-invalid' : '' }}" id="dSDiv" name="dSDiv" value="{{ old('dSDiv') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">DS Division</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="district" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" id="district" name="district" value="{{ old('district') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">District</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="province" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" id="province" name="province" value="{{ old('province') }}" readonly required autofocus>
                                                    <small id="province" class="form-text text-muted">Province</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="ethnicGroup" class="col-sm-4 col-form-label">Ethnic Group</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="sriLankanTamil" name="ethnicGroup" class="custom-control-input{{ $errors->has('sriLankanTamil') ? ' is-invalid' : '' }}" value="SriLankan Tamil" autofocus>
                                                        <label class="custom-control-label" for="sriLankanTamil">SriLankan Tamil</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indianTamil" name="ethnicGroup" class="custom-control-input{{ $errors->has('indianTamil') ? ' is-invalid' : '' }}" value="Indian Tamil" autofocus>
                                                        <label class="custom-control-label" for="indianTamil">Indian Tamil</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="sinhala" name="ethnicGroup" class="custom-control-input{{ $errors->has('sinhala') ? ' is-invalid' : '' }}" value="Sinhala" autofocus>
                                                        <label class="custom-control-label" for="sinhala">Sinhala</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="muslims" name="ethnicGroup" class="custom-control-input{{ $errors->has('muslims') ? ' is-invalid' : '' }}" value="Muslims" autofocus>
                                                        <label class="custom-control-label" for="muslims">Muslims</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="burghers" name="ethnicGroup" class="custom-control-input{{ $errors->has('burghers') ? ' is-invalid' : '' }}" value="Burghers" autofocus>
                                                        <label class="custom-control-label" for="burghers">Burghers</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="others" name="ethnicGroup" class="custom-control-input{{ $errors->has('others') ? ' is-invalid' : '' }}" value="Others" autofocus>
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
                                                    <input type="date" class="form-control{{ $errors->has('dateOnset') ? ' is-invalid' : '' }}" id="dateOnset" name="dateOnset" value="{{ old('dateOnset') }}" required autofocus onchange="setDateFromOnset()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="dateHospitalisation" class="col-sm-4 col-form-label">Date of Hospitalisation</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateHospitalisation') ? ' is-invalid' : '' }}" id="dateHospitalisation" name="dateHospitalisation" value="{{ old('dateHospitalisation') }}" required autofocus onchange="setDateFromHospitalisation()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="dateDischarge" class="col-sm-4 col-form-label">Date of Discharge</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('dateDischarge') ? ' is-invalid' : '' }}" id="dateDischarge" name="dateDischarge" value="{{ old('dateDischarge') }}" required autofocus onchange="setDateFromDischarge()">
                                                </div>
                                            </div>

                                            <div class="form-group row" id="hospitalName">
                                                <label for="hospitalName" class="col-sm-4 col-form-label">Name of Hospital</label>
                                                <div class="col-sm-7">
                                                    <select id="hospitalName" name="hospitalName" class="form-control{{ $errors->has('hospitalName') ? ' is-invalid' : '' }}" value="{{ old('hospitalName') }}" autofocus>
                                                        <option value="" disabled selected>Select a hospital</option>
                                                        <option value="Jaffna Teaching Hospital">Jaffna Teaching Hospital</option>
                                                        <option value="New Yarl Hospital">New Yarl Hospital</option>
                                                        <option value="Northern Central Hospitals (pvt)">Northern Central Hospitals (pvt)</option>
                                                        <option value="Rakavo Hospital">Rakavo Hospital</option>
                                                        <option value="Ruhlins Hospital">Ruhlins Hospital</option>
                                                        <option value="Sujeeva Hospital">Sujeeva Hospital</option>
                                                        <option value="Nagaa Medical Centre">Nagaa Medical Centre</option>
                                                        <option value="Sampanthar Modern Clinic">Sampanthar Modern Clinic</option>
                                                        <option value="Shan's Health Care">Shan's Health Care</option>
                                                        <option value="Divisional Hospital">Divisional Hospital</option>
                                                        <option value="Sunrice Medi Clinic">Sunrice Medi Clinic</option>
                                                        <option value="Royal Medical Centre">Royal Medical Centre</option>
                                                        <option value="Mangalapathy Siddha Ayurvedic">Mangalapathy Siddha Ayurvedic</option>
                                                        <option value="Shanthe Medi Clinic">Shanthe Medi Clinic</option>
                                                        <option value="Pillaiyar Medi Clinic">Pillaiyar Medi Clinic</option>
                                                        <option value="Modern New Medi Care Hospital">Modern New Medi Care Hospital</option>
                                                        <option value="Care &amp; Cure">Care &amp; Cure</option>
                                                        <option value="Renny Dental &amp; Optical Service">Renny Dental &amp; Optical Service</option>
                                                        <option value="Dental Surgery">Dental Surgery</option>
                                                        <option value="Life Care Medi Cilinic">Life Care Medi Cilinic</option>                             
                                                        <option value="Suharni Hospital">Suharni Hospital</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group">
                                                <label for="movement" class="col-form-label">Patient's movements during three weeks prior to onset</label>
                                                <textarea id="movement" class="form-control{{ $errors->has('movement') ? ' is-invalid' : '' }}" name="movement" rows="7"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">
                                            <div class="form-group row">
                                                <label for="outcome" class="col-sm-4 col-form-label">Outcome</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="stillInWard" name="outcome" class="custom-control-input{{ $errors->has('stillInWard') ? ' is-invalid' : '' }}" value="Still in ward" required autofocus>
                                                        <label class="custom-control-label" for="stillInWard">Still in ward</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="recovered" name="outcome" class="custom-control-input{{ $errors->has('recovered') ? ' is-invalid' : '' }}" value="Recovered" required autofocus>
                                                        <label class="custom-control-label" for="recovered">Recovered</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="died" name="outcome" class="custom-control-input{{ $errors->has('died') ? ' is-invalid' : '' }}" value="Died" required autofocus>
                                                        <label class="custom-control-label" for="died">Died</label>
                                                    </div>      
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="whereIsolated" class="col-sm-4 col-form-label">Where Isolated</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="house" name="whereIsolated" class="custom-control-input{{ $errors->has('house') ? ' is-invalid' : '' }}" value="House" required autofocus>
                                                        <label class="custom-control-label" for="house">House</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="hospital" name="whereIsolated" class="custom-control-input{{ $errors->has('hospital') ? ' is-invalid' : '' }}" value="Hospital" required autofocus>
                                                        <label class="custom-control-label" for="hospital">Hospital</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="notIsolated" name="whereIsolated" class="custom-control-input{{ $errors->has('notIsolated') ? ' is-invalid' : '' }}" value="Not Isolated" required autofocus>
                                                        <label class="custom-control-label" for="notIsolated">Not Isolated</label>
                                                    </div>      
                                                </div>
                                            </div>          
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group">
                                                <label for="labFinding" class="col-form-label">Laboratory Finding</label>
                                                <textarea id="labFinding" class="form-control{{ $errors->has('labFinding') ? ' is-invalid' : '' }}" name="labFinding" rows="7"></textarea>
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
                                            <input type="text" class="form-control{{ $errors->has('firstNameHousehold1') ? ' is-invalid' : '' }}" id="firstNameHousehold1" name="firstNameHousehold1" value="{{ old('firstNameHousehold1') }}" autofocus>
                                            <small id="firstNameHousehold1" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameHousehold1') ? ' is-invalid' : '' }}" id="lastNameHousehold1" name="lastNameHousehold1" value="{{ old('lastNameHousehold1') }}" autofocus>
                                            <small id="lastNameHousehold1" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageHousehold1') ? ' is-invalid' : '' }} input-sm" id="ageHousehold1" name="ageHousehold1" value="{{ old('ageHousehold1') }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenHousehold1') ? ' is-invalid' : '' }}" id="dateSeenHousehold1" name="dateSeenHousehold1" value="{{ old('dateSeenHousehold1') }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationHousehold1" class="form-control{{ $errors->has('observationHousehold1') ? ' is-invalid' : '' }}" name="observationHousehold1" rows="5" autofocus></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control{{ $errors->has('firstNameHousehold2') ? ' is-invalid' : '' }}" id="firstNameHousehold2" name="firstNameHousehold2" value="{{ old('firstNameHousehold2') }}" autofocus>
                                            <small id="firstNameHousehold2" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameHousehold2') ? ' is-invalid' : '' }}" id="lastNameHousehold2" name="lastNameHousehold2" value="{{ old('lastNameHousehold2') }}" autofocus>
                                            <small id="lastNameHousehold2" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageHousehold2') ? ' is-invalid' : '' }} input-sm" id="ageHousehold2" name="ageHousehold2" value="{{ old('ageHousehold2') }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenHousehold2') ? ' is-invalid' : '' }}" id="dateSeenHousehold2" name="dateSeenHousehold2" value="{{ old('dateSeenHousehold2') }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationHousehold2" class="form-control{{ $errors->has('observationHousehold2') ? ' is-invalid' : '' }}" name="observationHousehold2" rows="5" autofocus></textarea>
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
                                            <input type="text" class="form-control{{ $errors->has('firstNameOther1') ? ' is-invalid' : '' }}" id="firstNameOther1" name="firstNameOther1" value="{{ old('firstNameOther1') }}" autofocus>
                                            <small id="firstNameOther1" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameOther1') ? ' is-invalid' : '' }}" id="lastNameOther1" name="lastNameOther1" value="{{ old('lastNameOther1') }}" autofocus>
                                            <small id="lastNameOther1" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageOther1') ? ' is-invalid' : '' }} input-sm" id="ageOther1" name="ageOther1" value="{{ old('ageOther1') }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenOther1') ? ' is-invalid' : '' }}" id="dateSeenOther1" name="dateSeenOther1" value="{{ old('dateSeenOther1') }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationOther1" class="form-control{{ $errors->has('observationOther1') ? ' is-invalid' : '' }}" name="observationOther1" rows="5" autofocus></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control{{ $errors->has('firstNameOther2') ? ' is-invalid' : '' }}" id="firstNameOther2" name="firstNameOther2" value="{{ old('firstNameOther2') }}" autofocus>
                                            <small id="firstNameOther2" class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control{{ $errors->has('lastNameOther2') ? ' is-invalid' : '' }}" id="lastNameOther2" name="lastNameOther2" value="{{ old('lastNameOther2') }}" autofocus>
                                            <small id="lastNameOther2" class="form-text text-muted">Last Name</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control{{ $errors->has('ageOther2') ? ' is-invalid' : '' }} input-sm" id="ageOther2" name="ageOther2" value="{{ old('ageOther2') }}" min="10" max="100" autofocus>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control{{ $errors->has('dateSeenOther2') ? ' is-invalid' : '' }}" id="dateSeenOther2" name="dateSeenOther2" value="{{ old('dateSeenOther2') }}" autofocus>
                                        </td>
                                        <td>
                                            <textarea id="observationOther2" class="form-control{{ $errors->has('observationOther2') ? ' is-invalid' : '' }}" name="observationOther2" rows="5" autofocus></textarea>
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
                                                    <textarea id="symptomsDevelopment" class="form-control{{ $errors->has('symptomsDevelopment') ? ' is-invalid' : '' }}" name="symptomsDevelopment" rows="4" autofocus></textarea>
                                                </div>
                                            </div>     
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="treatmentType" class="col-sm-4 col-form-label">Type of treatment getting</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indigenous" name="treatmentType" class="custom-control-input{{ $errors->has('indigenous') ? ' is-invalid' : '' }}" value="Indigenous" required autofocus>
                                                        <label class="custom-control-label" for="indigenous">Indigenous</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="western" name="treatmentType" class="custom-control-input{{ $errors->has('western') ? ' is-invalid' : '' }}" value="Western" required autofocus>
                                                        <label class="custom-control-label" for="western">Western</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="both" name="treatmentType" class="custom-control-input{{ $errors->has('both') ? ' is-invalid' : '' }}" value="Both" required autofocus>
                                                        <label class="custom-control-label" for="both">Both</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="noTreatement" name="treatmentType" class="custom-control-input{{ $errors->has('noTreatement') ? ' is-invalid' : '' }}" value="No Treatement" required autofocus>
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
                                                    <textarea id="complications" class="form-control{{ $errors->has('complications') ? ' is-invalid' : '' }}" name="complications" rows="4" autofocus></textarea>
                                                </div>
                                            </div>     
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="infectionSource" class="col-sm-4 col-form-label">Possible Source of Infection</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="homeSource" name="infectionSource" class="custom-control-input{{ $errors->has('homeSource') ? ' is-invalid' : '' }}" value="Home" required autofocus>
                                                        <label class="custom-control-label" for="homeSource">Home</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="workingPlaceSource" name="infectionSource" class="custom-control-input{{ $errors->has('workingPlaceSource') ? ' is-invalid' : '' }}" value="Working Place" required autofocus>
                                                        <label class="custom-control-label" for="workingPlaceSource">Working Place</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="outsideSource" name="infectionSource" class="custom-control-input{{ $errors->has('outsideSource') ? ' is-invalid' : '' }}" value="Outside" required autofocus>
                                                        <label class="custom-control-label" for="outsideSource">Outside</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="otherSource" name="infectionSource" class="custom-control-input{{ $errors->has('otherSource') ? ' is-invalid' : '' }}" value="Other" required autofocus>
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
                                                        <input type="checkbox" id="sourceReduction" class="custom-control-input{{ $errors->has('sourceReduction') ? ' is-invalid' : '' }}" name="sourceReduction" value="{{ old('sourceReduction') }}" autofocus>
                                                        <label for="sourceReduction" class="custom-control-label">Source Reduction</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="bioControl" class="custom-control-input{{ $errors->has('bioControl') ? ' is-invalid' : '' }}" name="bioControl" value="{{ old('bioControl') }}" autofocus>
                                                        <label for="bioControl" class="custom-control-label">Bio Control</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="habitatModification" class="custom-control-input{{ $errors->has('habitatModification') ? ' is-invalid' : '' }}" name="habitatModification" value="{{ old('habitatModification') }}" autofocus>
                                                        <label for="habitatModification" class="custom-control-label">Habitat Modification</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="otherControl" class="custom-control-input{{ $errors->has('otherControl') ? ' is-invalid' : '' }}" name="otherControl" value="{{ old('otherControl') }}" autofocus>
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
                                                        <input type="checkbox" id="removeGabage" class="custom-control-input{{ $errors->has('removeGabage') ? ' is-invalid' : '' }}" name="removeGabage" value="{{ old('removeGabage') }}" autofocus>
                                                        <label for="removeGabage" class="custom-control-label">Remove Gabage</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="removeWaterStore" class="custom-control-input{{ $errors->has('removeWaterStore') ? ' is-invalid' : '' }}" name="removeWaterStore" value="{{ old('removeWaterStore') }}" autofocus>
                                                        <label for="removeWaterStore" class="custom-control-label">Remove Water Store</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="useMosquitoNet" class="custom-control-input{{ $errors->has('useMosquitoNet') ? ' is-invalid' : '' }}" name="useMosquitoNet" value="{{ old('useMosquitoNet') }}" autofocus>
                                                        <label for="useMosquitoNet" class="custom-control-label">Use Mosquito Net</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="useInsectRepellent" class="custom-control-input{{ $errors->has('useInsectRepellent') ? ' is-invalid' : '' }}" name="useInsectRepellent" value="{{ old('useInsectRepellent') }}" autofocus>
                                                        <label for="useInsectRepellent" class="custom-control-label">Use insect repellent</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="otherPrevent" class="custom-control-input{{ $errors->has('otherPrevent') ? ' is-invalid' : '' }}" name="otherPrevent" value="{{ old('otherPrevent') }}" autofocus>
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
                                                    <textarea id="followUp" class="form-control{{ $errors->has('followUp') ? ' is-invalid' : '' }}" name="followUp" rows="3" autofocus></textarea>
                                                </div>
                                            </div>         
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6;">
                                            
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row mb-0">
                                                <div class="offset-md-8">
                                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                    &ensp;&ensp;
                                                    <button type="submit" name="send" class="btn btn-primary">Send</button>
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
