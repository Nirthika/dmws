@extends('layouts.app')

@section('content')
<script type="text/javascript">
    window.onload = myAlert;
    function myAlert(){
        if (document.getElementById('otherSource').checked) {
            document.getElementById('specifySource').style.display = '';
            document.getElementById('specify').required = true;
        } else {
            document.getElementById('specify').required = false;
            document.getElementById('specifySource').style.display = 'none';
        }
        if(document.getElementById("yearOnly").checked){    
            document.getElementById('yearOfBirth').style.display = '';
            document.getElementById('dateOfBirth').style.display = 'none';
            document.getElementById("birthDate").value="";
            document.getElementById('birthDate').required = false;
            document.getElementById('yearOfBirth').required = true;
        }
        else {  
            document.getElementById('dateOfBirth').style.display = '';
            document.getElementById('yearOfBirth').style.display = 'none';
            document.getElementById("birthYear").value="";
            document.getElementById('birthDate').required = true;
            document.getElementById('yearOfBirth').required = false;
        }
        if("{{ $h411aData->status }}" === "sent"){
            var form = document.getElementById("h411aEdit");
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
<script src="{{ asset('js/h411a.js') }}"></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'EU')
            <li class="breadcrumb-item"><a href="../../eUHome" style="text-decoration: none;">Home</a></li>
        @elseif ($userType == 'MOH')
            <li class="breadcrumb-item"><a href="../../mOHHome" style="text-decoration: none;">Home</a></li>
        @endif         
        <li class="breadcrumb-item active" aria-current="page">H411a</li>
    </ol>
</nav>

<div class="container" style="margin-top: 3%">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h6>DEPARTMENT OF HEALTH</h6><br/>
                    <h5>COMMUNICABLE DISEASE REPORT - PART II</h5>
                </div>
                <div class="card-body" style="padding: 1%;">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <br/>
                    <form id="h411aEdit" method="POST" action="/h411a/{{ $h411aData->h411aRecordId }}" onsubmit="return confSubmit()">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="rDHSDiv" class="col-sm-4 col-form-label">RDHS Division</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('rDHSDiv') ? ' is-invalid' : '' }}" id="rDHSDiv" name="rDHSDiv" value="{{ $h411aData->rDHSDiv }}" readonly>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="notifiedDisease" class="col-sm-4 col-form-label">Disease as Notified</label>
                                                <div class="col-sm-7">
                                                    <select id="notifiedDisease" name="notifiedDisease" class="form-control{{ $errors->has('notifiedDisease') ? ' is-invalid' : '' }}" value="{{ old('notifiedDisease') }}" autofocus>
                                                        @php $or = 'or'; @endphp
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis" {{ $h411aData->notifiedDisease == 'Acute Poliomyelitis / Acute Flaccid Paralysis' ? 'selected' : '' }}>Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox" {{ $h411aData->notifiedDisease == 'Chicken Pox' ? 'selected' : '' }}>Chicken Pox</option>
                                                        <option value="Cholera" {{ $h411aData->notifiedDisease == 'Cholera' ? 'selected' : '' }}>Cholera</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever" {{ $h411aData->notifiedDisease == 'Dengue Fever / Dengue Haemorrhagic Fever' ? 'selected' : '' }}>Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria" {{ $h411aData->notifiedDisease == 'Diphtheria' ? 'selected' : '' }}>Diphtheria</option>
                                                        <option value="Dysentery" {{ $h411aData->notifiedDisease == 'Dysentery' ? 'selected' : '' }}>Dysentery</option>
                                                        <option value="Encephalitis" {{ $h411aData->notifiedDisease == 'Encephalitis' ? 'selected' : '' }}>Encephalitis</option>
                                                        <option value="Enteric Fever" {{ $h411aData->notifiedDisease == 'Enteric Fever' ? 'selected' : '' }}>Enteric Fever</option>
                                                        <option value="Food Poisoning" {{ $h411aData->notifiedDisease == 'Food Poisoning' ? 'selected' : '' }}>Food Poisoning</option>
                                                        <option value="Human Rabies" {{ $h411aData->notifiedDisease == 'Human Rabies' ? 'selected' : '' }}>Human Rabies</option>
                                                        <option value="Leishmaniasis" {{ $h411aData->notifiedDisease == 'Leishmaniasis' ? 'selected' : '' }}>Leishmaniasis</option>
                                                        <option value="Leprosy" {{ $h411aData->notifiedDisease == 'Leprosy' ? 'selected' : '' }}>Leprosy</option>
                                                        <option value="Leptospirosis" {{ $h411aData->notifiedDisease == 'Leptospirosis' ? 'selected' : '' }}>Leptospirosis</option>
                                                        <option value="Malaria" {{ $h411aData->notifiedDisease == 'Malaria' ? 'selected' : '' }}>Malaria</option>
                                                        <option value="Measles" {{ $h411aData->notifiedDisease == 'Measles' ? 'selected' : '' }}>Measles</option>
                                                        <option value="Meningitis" {{ $h411aData->notifiedDisease == 'Meningitis' ? 'selected' : '' }}>Meningitis</option>
                                                        <option value="Mumps" {{ $h411aData->notifiedDisease == 'Mumps' ? 'selected' : '' }}>Mumps</option>
                                                        <option value="Neonatal Tetanus" {{ $h411aData->notifiedDisease == 'Neonatal Tetanus' ? 'selected' : '' }}>Neonatal Tetanus</option>
                                                        <option value="Plague" {{ $h411aData->notifiedDisease == 'Plague' ? 'selected' : '' }}>Plague</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom" {{ $h411aData->notifiedDisease == 'Rubella / Congenital Rubella Syndrom' ? 'selected' : '' }}>Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more" {{$h411aData->notifiedDisease == 'Simple Continued Fever of over 7 days '.$or.' more' ? 'selected' : '' }}>Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus" {{ $h411aData->notifiedDisease == 'Tetanus' ? 'selected' : '' }}>Tetanus</option>
                                                        <option value="Tuberculosis" {{ $h411aData->notifiedDisease == 'Tuberculosis' ? 'selected' : '' }}>Tuberculosis</option>
                                                        <option value="Typhus Fever" {{ $h411aData->notifiedDisease == 'Typhus Fever' ? 'selected' : '' }}>Typhus Fever</option>
                                                        <option value="Viral Hepatitis" {{ $h411aData->notifiedDisease == 'Viral Hepatitis' ? 'selected' : '' }}>Viral Hepatitis</option>
                                                        <option value="Whooping Cough" {{ $h411aData->notifiedDisease == 'Whooping Cough' ? 'selected' : '' }}>Whooping Cough</option>
                                                        <option value="Yellow Fever" {{ $h411aData->notifiedDisease == 'Yellow Fever' ? 'selected' : '' }}>Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="mOHArea" class="col-sm-4 col-form-label">MOH Area</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('mOHArea') ? ' is-invalid' : '' }}" id="mOHArea" name="mOHArea" value="{{ $h411aData->mOHArea }}" readonly autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="notificationDate" class="col-sm-4 col-form-label">Date of Notification</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('notificationDate') ? ' is-invalid' : '' }}" id="notificationDate" name="notificationDate" value="{{ $h411aData->notificationDate }}" required autofocus onchange="setMinConfirmationDate()">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="mOHRegNo" class="col-sm-4 col-form-label">MOH Registration No</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('mOHRegNo') ? ' is-invalid' : '' }}" id="mOHRegNo" name="mOHRegNo" value="{{ $h411aData->mOHRegNo }}" readonly autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="confirmedDisease" class="col-sm-4 col-form-label">Disease as Confirmed</label>
                                                <div class="col-sm-7">
                                                    <select id="confirmedDisease" name="confirmedDisease" class="form-control{{ $errors->has('confirmedDisease') ? ' is-invalid' : '' }}" value="{{ old('confirmedDisease') }}" autofocus>
                                                        @php $or = 'or'; @endphp
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis" {{ $h411aData->confirmedDisease == 'Acute Poliomyelitis / Acute Flaccid Paralysis' ? 'selected' : '' }}>Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox" {{ $h411aData->confirmedDisease == 'Chicken Pox' ? 'selected' : '' }}>Chicken Pox</option>
                                                        <option value="Cholera" {{ $h411aData->confirmedDisease == 'Cholera' ? 'selected' : '' }}>Cholera</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever" {{ $h411aData->confirmedDisease == 'Dengue Fever / Dengue Haemorrhagic Fever' ? 'selected' : '' }}>Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria" {{ $h411aData->confirmedDisease == 'Diphtheria' ? 'selected' : '' }}>Diphtheria</option>
                                                        <option value="Dysentery" {{ $h411aData->confirmedDisease == 'Dysentery' ? 'selected' : '' }}>Dysentery</option>
                                                        <option value="Encephalitis" {{ $h411aData->confirmedDisease == 'Encephalitis' ? 'selected' : '' }}>Encephalitis</option>
                                                        <option value="Enteric Fever" {{ $h411aData->confirmedDisease == 'Enteric Fever' ? 'selected' : '' }}>Enteric Fever</option>
                                                        <option value="Food Poisoning" {{ $h411aData->confirmedDisease == 'Food Poisoning' ? 'selected' : '' }}>Food Poisoning</option>
                                                        <option value="Human Rabies" {{ $h411aData->confirmedDisease == 'Human Rabies' ? 'selected' : '' }}>Human Rabies</option>
                                                        <option value="Leishmaniasis" {{ $h411aData->confirmedDisease == 'Leishmaniasis' ? 'selected' : '' }}>Leishmaniasis</option>
                                                        <option value="Leprosy" {{ $h411aData->confirmedDisease == 'Leprosy' ? 'selected' : '' }}>Leprosy</option>
                                                        <option value="Leptospirosis" {{ $h411aData->confirmedDisease == 'Leptospirosis' ? 'selected' : '' }}>Leptospirosis</option>
                                                        <option value="Malaria" {{ $h411aData->confirmedDisease == 'Malaria' ? 'selected' : '' }}>Malaria</option>
                                                        <option value="Measles" {{ $h411aData->confirmedDisease == 'Measles' ? 'selected' : '' }}>Measles</option>
                                                        <option value="Meningitis" {{ $h411aData->confirmedDisease == 'Meningitis' ? 'selected' : '' }}>Meningitis</option>
                                                        <option value="Mumps" {{ $h411aData->confirmedDisease == 'Mumps' ? 'selected' : '' }}>Mumps</option>
                                                        <option value="Neonatal Tetanus" {{ $h411aData->confirmedDisease == 'Neonatal Tetanus' ? 'selected' : '' }}>Neonatal Tetanus</option>
                                                        <option value="Plague" {{ $h411aData->confirmedDisease == 'Plague' ? 'selected' : '' }}>Plague</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom" {{ $h411aData->confirmedDisease == 'Rubella / Congenital Rubella Syndrom' ? 'selected' : '' }}>Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more" {{$h411aData->confirmedDisease == 'Simple Continued Fever of over 7 days '.$or.' more' ? 'selected' : '' }}>Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus" {{ $h411aData->confirmedDisease == 'Tetanus' ? 'selected' : '' }}>Tetanus</option>
                                                        <option value="Tuberculosis" {{ $h411aData->confirmedDisease == 'Tuberculosis' ? 'selected' : '' }}>Tuberculosis</option>
                                                        <option value="Typhus Fever" {{ $h411aData->confirmedDisease == 'Typhus Fever' ? 'selected' : '' }}>Typhus Fever</option>
                                                        <option value="Viral Hepatitis" {{ $h411aData->confirmedDisease == 'Viral Hepatitis' ? 'selected' : '' }}>Viral Hepatitis</option>
                                                        <option value="Whooping Cough" {{ $h411aData->confirmedDisease == 'Whooping Cough' ? 'selected' : '' }}>Whooping Cough</option>
                                                        <option value="Yellow Fever" {{ $h411aData->confirmedDisease == 'Yellow Fever' ? 'selected' : '' }}>Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row" id="dateOfBirth">
                                                <label for="birthDate" class="col-sm-4 col-form-label">Date of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('birthDate') ? ' is-invalid' : '' }}" id="birthDate" name="birthDate" value="{{ $h411aData->birthDate }}" autofocus onchange="getAge()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="yearOnly" class="col-sm-4 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="yearOnly" class="custom-control-input{{ $errors->has('yearOnly') ? ' is-invalid' : '' }}" name="yearOnly" value="{{ old('yearOnly') }}" autofocus onclick="checkDOB()" @if($h411aData->birthYear != NULL) checked @endif>
                                                        <label for="yearOnly" class="custom-control-label">Year Only</label>
                                                    </div>
                                                </div>        
                                            </div>

                                            <div class="form-group row" id="yearOfBirth" style="display:none">
                                                <label for="birthYear" class="col-sm-4 col-form-label">Year of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control{{ $errors->has('birthYear') ? ' is-invalid' : '' }}" id="birthYear" name="birthYear" value="{{ $h411aData->birthYear }}" autofocus onkeyup="getAge()" onclick="getAge()">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="confirmationDate" class="col-sm-4 col-form-label">Date of Confirmation</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('confirmationDate') ? ' is-invalid' : '' }}" id="confirmationDate" name="confirmationDate" value="{{ $h411aData->confirmationDate }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" value="{{ $h411aData->age }}" readonly required autofocus>
                                                </div>
                                            </div>

                                            @php $gender = ''; @endphp
                                            @if($h411aData->gender == 'Male')
                                                @php $gender = 'Male'; @endphp
                                            @elseif($h411aData->gender == 'Female')
                                                @php $gender = 'Female'; @endphp
                                            @elseif($h411aData->gender == 'Other')
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
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $confirmedBy = ''; @endphp
                                            @if($h411aData->confirmedBy == 'Hospital M.O')
                                                @php $confirmedBy = 'Hospital M.O'; @endphp
                                            @elseif($h411aData->confirmedBy == 'M.O.H')
                                                @php $confirmedBy = 'M.O.H'; @endphp
                                            @elseif($h411aData->confirmedBy == 'Other Govt M.O')
                                                @php $confirmedBy = 'Other Govt M.O'; @endphp
                                            @elseif($h411aData->confirmedBy == 'Apothecary')
                                                @php $confirmedBy = 'Apothecary'; @endphp
                                            @elseif($h411aData->confirmedBy == 'Practitioner')
                                                @php $confirmedBy = 'Practitioner'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="confirmedBy" class="col-sm-4 col-form-label">Confirmed by</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="hospitalMO" name="confirmedBy" class="custom-control-input{{ $errors->has('hospitalMO') ? ' is-invalid' : '' }}" value="Hospital M.O" @if($confirmedBy == 'Hospital M.O') checked @endif autofocus>
                                                        <label class="custom-control-label" for="hospitalMO">Hospital M.O</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="mOH" name="confirmedBy" class="custom-control-input{{ $errors->has('mOH') ? ' is-invalid' : '' }}" value="M.O.H" @if($confirmedBy == 'M.O.H') checked @endif autofocus>
                                                        <label class="custom-control-label" for="mOH">M.O.H</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="otherGovtMO" name="confirmedBy" class="custom-control-input{{ $errors->has('otherGovtMO') ? ' is-invalid' : '' }}" value="Other Govt M.O" @if($confirmedBy == 'Other Govt M.O') checked @endif autofocus>
                                                        <label class="custom-control-label" for="otherGovtMO">Other Govt M.O</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="apothecary" name="confirmedBy" class="custom-control-input{{ $errors->has('apothecary') ? ' is-invalid' : '' }}" value="Apothecary" @if($confirmedBy == 'Apothecary') checked @endif autofocus>
                                                        <label class="custom-control-label" for="apothecary">Apothecary</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="practitioner" name="confirmedBy" class="custom-control-input{{ $errors->has('practitioner') ? ' is-invalid' : '' }}" value="Practitioner" @if($confirmedBy == 'practitioner') checked @endif autofocus>
                                                        <label class="custom-control-label" for="practitioner">Practitioner</label>
                                                    </div>      
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="occupation" class="col-sm-4 col-form-label">Occupation</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" id="occupation" name="occupation" value="{{ $h411aData->occupation }}" required autofocus>
                                                </div>
                                            </div>

                                            @php $sourceOfNotify = ''; @endphp
                                            @if($h411aData->sourceOfNotify == 'Hospital')
                                                @php $sourceOfNotify = 'Hospital'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'Dispensary')
                                                @php $sourceOfNotify = 'Dispensary'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'P.H.I')
                                                @php $sourceOfNotify = 'P.H.I'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'Grama Sevaka')
                                                @php $sourceOfNotify = 'Grama Sevaka'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'School Teacher')
                                                @php $sourceOfNotify = 'School Teacher'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'Private Practitioner')
                                                @php $sourceOfNotify = 'Private Practitioner'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'Ayurvedic Physician')
                                                @php $sourceOfNotify = 'Ayurvedic Physician'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'Estate Superintendent')
                                                @php $sourceOfNotify = 'Estate Superintendent'; @endphp
                                            @elseif($h411aData->sourceOfNotify == 'Other Source')
                                                @php $sourceOfNotify = 'Other Source'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="sourceOfNotify" class="col-sm-4 col-form-label">Source of Notification</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="hospital" name="sourceOfNotify" class="custom-control-input{{ $errors->has('hospital') ? ' is-invalid' : '' }}" value="Hospital" @if($sourceOfNotify == 'Hospital') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="hospital">Hospital</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dispensary" name="sourceOfNotify" class="custom-control-input{{ $errors->has('dispensary') ? ' is-invalid' : '' }}" value="Dispensary" @if($sourceOfNotify == 'Dispensary') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="dispensary">Dispensary</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="pHI" name="sourceOfNotify" class="custom-control-input{{ $errors->has('pHI') ? ' is-invalid' : '' }}" value="P.H.I" @if($sourceOfNotify == 'P.H.I') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="pHI">P.H.I</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="gramaSevaka" name="sourceOfNotify" class="custom-control-input{{ $errors->has('gramaSevaka') ? ' is-invalid' : '' }}" value="Grama Sevaka" @if($sourceOfNotify == 'Grama Sevaka') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="gramaSevaka">Grama Sevaka</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="schoolTeacher" name="sourceOfNotify" class="custom-control-input{{ $errors->has('schoolTeacher') ? ' is-invalid' : '' }}" value="School Teacher" @if($sourceOfNotify == 'School Teacher') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="schoolTeacher">School Teacher</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="privatePractitioner" name="sourceOfNotify" class="custom-control-input{{ $errors->has('privatePractitioner') ? ' is-invalid' : '' }}" value="Private Practitioner" @if($sourceOfNotify == 'Private Practitioner') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="privatePractitioner">Private Practitioner</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="ayurvedicPhysician" name="sourceOfNotify" class="custom-control-input{{ $errors->has('ayurvedicPhysician') ? ' is-invalid' : '' }}" value="Ayurvedic Physician" @if($sourceOfNotify == 'Ayurvedic Physician') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="ayurvedicPhysician">Ayurvedic Physician</label>
                                                    </div> 
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="estateSuperintendent" name="sourceOfNotify" class="custom-control-input{{ $errors->has('estateSuperintendent') ? ' is-invalid' : '' }}" value="Estate Superintendent" @if($sourceOfNotify == 'Estate Superintendent') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="estateSuperintendent">Estate Superintendent</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="otherSource" name="sourceOfNotify" class="custom-control-input{{ $errors->has('otherSource') ? ' is-invalid' : '' }}" value="Other Source" @if($sourceOfNotify == 'Other Source') checked @endif autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="otherSource">Other Source</label>
                                                    </div>     
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @php $natureOfConf = ''; @endphp
                                            @if($h411aData->natureOfConf == 'Clinical only')
                                                @php $natureOfConf = 'Clinical only'; @endphp
                                            @elseif($h411aData->natureOfConf == 'Clinical and Epidemiological')
                                                @php $natureOfConf = 'Clinical and Epidemiological'; @endphp
                                            @elseif($h411aData->natureOfConf == 'Clinical and Bacteriological')
                                                @php $natureOfConf = 'Clinical and Bacteriological'; @endphp
                                            @elseif($h411aData->natureOfConf == 'Clinical and Serological')
                                                @php $natureOfConf = 'Clinical and Serological'; @endphp
                                            @elseif($h411aData->natureOfConf == 'Clinical, Bacteriological and Serological')
                                                @php $natureOfConf = 'Clinical, Bacteriological and Serological'; @endphp
                                            @elseif($h411aData->natureOfConf == 'Clinical and direct Microscopy')
                                                @php $natureOfConf = 'Clinical and direct Microscopy'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="natureOfConf" class="col-sm-4 col-form-label">Nature of Confirmation</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalOnly" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalOnly') ? ' is-invalid' : '' }}" value="Clinical only" @if($natureOfConf == 'Clinical only') checked @endif autofocus>
                                                        <label class="custom-control-label" for="clinicalOnly">Clinical only</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndEpid" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndEpid') ? ' is-invalid' : '' }}" value="Clinical and Epidemiological" @if($natureOfConf == 'Clinical and Epidemiological') checked @endif autofocus>
                                                        <label class="custom-control-label" for="clinicalAndEpid">Clinical and Epidemiological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndBact" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndBact') ? ' is-invalid' : '' }}" value="Clinical and Bacteriological" @if($natureOfConf == 'Clinical and Bacteriological') checked @endif autofocus>
                                                        <label class="custom-control-label" for="clinicalAndBact">Clinical and Bacteriological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndSero" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndSero') ? ' is-invalid' : '' }}" value="Clinical and Serological" @if($natureOfConf == 'Clinical and Serological') checked @endif autofocus>
                                                        <label class="custom-control-label" for="clinicalAndSero">Clinical and Serological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalBactAndSero" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalBactAndSero') ? ' is-invalid' : '' }}" value="Clinical, Bacteriological and Serological" @if($natureOfConf == 'Clinical, Bacteriological and Serological') checked @endif autofocus>
                                                        <label class="custom-control-label" for="clinicalBactAndSero">Clinical, Bacteriological and Serological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndDirectMicro" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndDirectMicro') ? ' is-invalid' : '' }}" value="Clinical and direct Microscopy" @if($natureOfConf == 'Clinical and direct Microscopy') checked @endif autofocus>
                                                        <label class="custom-control-label" for="clinicalAndDirectMicro">Clinical and direct Microscopy</label>
                                                    </div>                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="officeUseOnly" class="col-sm-4 col-form-label">Office Use Only</label>
                                                <div class="col-sm-7">
                                                    <textarea id="officeUseOnly" class="form-control{{ $errors->has('officeUseOnly') ? ' is-invalid' : '' }}" name="officeUseOnly" rows="5" value="{{ $h411aData->officeUseOnly }}" autofocus></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row" id="specifySource" style="display:none">
                                                <label for="specify" class="col-sm-4 col-form-label">Specify</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('specify') ? ' is-invalid' : '' }}" id="specify" name="specify" value="{{ $h411aData->specify }}" autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        @if($h411aData->status == 'draft')
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
