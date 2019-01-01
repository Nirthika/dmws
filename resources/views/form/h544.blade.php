@extends('layouts.app')

@section('content')
<script type="text/javascript">
    window.onload = myAlert;
    function myAlert(){
        var inp = document.getElementsByTagName('input');
        for (var i = inp.length-1; i>=0; i--) {
            if ('radio'===inp[i].type || 'checkbox'===inp[i].type) inp[i].checked = false;
        }
        govHospital.value = '';
        pvtHospital.value = '';
        diseaseGroupA.value = '';
        diseaseGroupB.value = '';
        resGSDivName.value = '';
        resGSDiv.value = '';
        resMOHArea.value = '';
        resMOHArea.options.length = 1;
        resPHIRange.value = '';
        resPHIRange.options.length = 1;
        curGSDivName.value = '';
        curGSDiv.value = '';
        curMOHArea.value = '';
        curMOHArea.options.length = 1;
        curPHIRange.value = '';
        curPHIRange.options.length = 1;

        document.getElementById("birthYear").value='';
        document.getElementById("birthDate").value='';
        document.getElementById("age").value=0;
    }
</script>
<script src="{{ asset('js/h544.js') }}"></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../doctorHome" style="text-decoration: none;">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">H544</li>
    </ol>
</nav>

<div class="container" style="margin-top: 3%">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h5>Notification of a Communicable Disease</h5></div>
                <div class="card-body" style="padding: 1%;">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <br>
                    <form method="POST" action="/h544">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="institute" class="col-sm-4 col-form-label">Institute</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="government" name="institute" class="custom-control-input{{ $errors->has('government') ? ' is-invalid' : '' }}" value="Government" required autofocus onclick="checkInstitute(1)">
                                                        <label class="custom-control-label" for="government">Government</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="private" name="institute" class="custom-control-input{{ $errors->has('private') ? ' is-invalid' : '' }}" value="Private" required autofocus onclick="checkInstitute(2)">
                                                        <label class="custom-control-label" for="private">Private</label>
                                                    </div>      
                                                </div>
                                            </div>
                                            <div class="form-group row" id="govHospitalDiv" style="display:none">
                                                <label for="govHospital" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="govHospital" name="govHospital" class="form-control{{ $errors->has('govHospital') ? ' is-invalid' : '' }}" value="{{ old('govHospital') }}" autofocus>
                                                        <option value="" disabled selected>Select a hospital</option>
                                                        <option value="Jaffna Teaching Hospital">Jaffna Teaching Hospital</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="pvtHospitalDiv" style="display:none">
                                                <label for="pvtHospital" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="pvtHospital" name="pvtHospital" class="form-control{{ $errors->has('pvtHospital') ? ' is-invalid' : '' }}" value="{{ old('pvtHospital') }}" autofocus>
                                                        <option value="" disabled selected>Select a hospital</option>
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
                                        <td style="padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="diseaseGroup" class="col-sm-4 col-form-label">Disease</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="groupA" name="diseaseGroup" class="custom-control-input{{ $errors->has('groupA') ? ' is-invalid' : '' }}" value="Group A" required autofocus onclick="checkDisease(1)">
                                                        <label class="custom-control-label" for="groupA">Group A</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="groupB" name="diseaseGroup" class="custom-control-input{{ $errors->has('groupB') ? ' is-invalid' : '' }}" value="Group B" required autofocus onclick="checkDisease(2)">
                                                        <label class="custom-control-label" for="groupB">Group B</label>
                                                    </div>      
                                                </div>
                                            </div>
                                            <div class="form-group row" id="diseaseGroupADiv" style="display:none">
                                                <label for="diseaseGroupA" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="diseaseGroupA" name="diseaseGroupA" class="form-control{{ $errors->has('diseaseGroupA') ? ' is-invalid' : '' }}" value="{{ old('diseaseGroupA') }}" autofocus>
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Cholera">Cholera</option>
                                                        <option value="Plague">Plague</option>
                                                        <option value="Yellow Fever">Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="diseaseGroupBDiv" style="display:none">
                                                <label for="diseaseGroupB" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="diseaseGroupB" name="diseaseGroupB" class="form-control{{ $errors->has('diseaseGroupB') ? ' is-invalid' : '' }}" value="{{ old('diseaseGroupB') }}" autofocus>
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Chicken Pox">Chicken Pox</option>
                                                        <option value="Dengue Fever/ Dengue Haemorragic Fever">Dengue Fever/ Dengue Haemorragic Fever</option>
                                                        <option value="Diphtheria">Diphtheria</option>
                                                        <option value="Dysentery">Dysentery</option>
                                                        <option value="Encephalitis (including Japanese Encephalitis)">Encephalitis (including Japanese Encephalitis)</option>
                                                        <option value="Enteric Fever">Enteric Fever</option>
                                                        <option value="Food Poisoning">Food Poisoning</option>
                                                        <option value="Human Rabies">Human Rabies</option>
                                                        <option value="Leptospirosis">Leptospirosis</option>
                                                        <option value="Malaria">Malaria</option>
                                                        <option value="Measles">Measles</option>
                                                        <option value="Meningitis">Meningitis</option>
                                                        <option value="Mumps">Mumps</option>
                                                        <option value="Pertussis">Pertussis</option>
                                                        <option value="Polio Myelitis/Acute Flaccid Paralysis">Polio Myelitis/Acute Flaccid Paralysis</option>
                                                        <option value="Rubella/Congenital Rubella Syndrome">Rubella/Congenital Rubella Syndrome</option>
                                                        <option value="Severe Acute Respiratory Syndrome (SARS)">Severe Acute Respiratory Syndrome (SARS)</option>
                                                        <option value="Simple continued fever of over 7 days or more">Simple continued fever of over 7 days or more</option>
                                                        <option value="Tetanus/Neonatal tetanus">Tetanus/Neonatal tetanus</option>
                                                        <option value="Tuberculosis">Tuberculosis</option>
                                                        <option value="Typhus Fever">Typhus Fever</option>
                                                        <option value="Viral Hepatitis">Viral Hepatitis</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
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
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="male" name="gender" class="custom-control-input{{ $errors->has('male') ? ' is-invalid' : '' }}" value="Male" required autofocus>
                                                        <label class="custom-control-label" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="female" name="gender" class="custom-control-input{{ $errors->has('female') ? ' is-invalid' : '' }}" value="Female" required autofocus>
                                                        <label class="custom-control-label" for="female">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
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
                                                <label for="nickName" class="col-sm-4 col-form-label">Nickname of Patient</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('nickName') ? ' is-invalid' : '' }}" id="nickName" name="nickName" value="{{ old('nickName') }}" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nICNum" class="col-sm-4 col-form-label">Patient /
                                                Guardian NIC Number</label>
                                                <div class="col-sm-7">
                                                    <input type="tel" class="form-control{{ $errors->has('nICNum') ? ' is-invalid' : '' }}" id="nICNum" name="nICNum" value="{{ old('nICNum') }}" maxlength="12" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="visitArea" class="col-sm-4 col-form-label">Recent Visit to the Disease Area</label>
                                                <div class="col-sm-7">
                                                    <textarea id="visitArea" class="form-control{{ $errors->has('visitArea') ? ' is-invalid' : '' }}" name="visitArea" rows="3" value="{{ old('visitArea') }}" autofocus></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="onsetDate" class="col-sm-4 col-form-label">Onset of Fever</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('onsetDate') ? ' is-invalid' : '' }}" id="onsetDate" name="onsetDate" value="{{ old('onsetDate') }}" required autofocus onchange="setMinAdmissionDate()">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="admissionDate" class="col-sm-4 col-form-label">Date of Admission</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('admissionDate') ? ' is-invalid' : '' }}" id="admissionDate" name="admissionDate" value="{{ old('admissionDate') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="regOrBHTNo" class="col-sm-4 col-form-label">Registration/BHT No</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('regOrBHTNo') ? ' is-invalid' : '' }}" id="regOrBHTNo" name="regOrBHTNo" value="{{ old('regOrBHTNo') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="ward" class="col-sm-4 col-form-label">Ward</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('ward') ? ' is-invalid' : '' }}" id="ward" name="ward" value="{{ old('ward') }}" autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
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
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" value="{{ old('age') }}" readonly required autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="nextOfKin" style="display: none;">
                                                <label for="nextOfKin" class="col-sm-4 col-form-label">Next of Kin</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control{{ $errors->has('nextOfKinFirstName') ? ' is-invalid' : '' }}" id="nextOfKinFirstName" name="nextOfKinFirstName" value="{{ old('nextOfKinFirstName') }}" autofocus>
                                                    <small id="nextOfKinFirstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('nextOfKinLastName') ? ' is-invalid' : '' }}" id="nextOfKinLastName" name="nextOfKinLastName" value="{{ old('nextOfKinLastName') }}" autofocus>
                                                    <small id="nextOfKinLastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="childGuardian" style="display: none;">
                                                <label for="childGuardian" class="col-sm-4 col-form-label">If patient age below 18years</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="mother" name="childGuardian" class="custom-control-input{{ $errors->has('mother') ? ' is-invalid' : '' }}" value="Mother" autofocus>
                                                        <label class="custom-control-label" for="mother">Mother</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="father" name="childGuardian" class="custom-control-input{{ $errors->has('father') ? ' is-invalid' : '' }}" value="Father" autofocus>
                                                        <label class="custom-control-label" for="father">Father</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="guardian" name="childGuardian" class="custom-control-input{{ $errors->has('guardian') ? ' is-invalid' : '' }}" value="Guardian" autofocus>
                                                        <label class="custom-control-label" for="guardian">Guardian</label>
                                                    </div>      
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="childGuardianName" style="display: none;"> 
                                                <label for="childGuardianName" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-3">                   
                                                    <input type="text" class="form-control{{ $errors->has('childGuardianFirstName') ? ' is-invalid' : '' }}" id="childGuardianFirstName" name="childGuardianFirstName" value="{{ old('childGuardianFirstName') }}" autofocus>
                                                    <small id="childGuardianFirstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('childGuardianLastName') ? ' is-invalid' : '' }}" id="childGuardianLastName" name="childGuardianLastName" value="{{ old('childGuardianLastName') }}" autofocus>
                                                    <small id="childGuardianLastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; border-top: 1px solid #dee2e6; padding-bottom: 0%;"> 
                                            <div class="form-group row">
                                                <label for="labResults" class="col-sm-4 col-form-label">Laboratory Results</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="available" name="labResults" class="custom-control-input{{ $errors->has('available') ? ' is-invalid' : '' }}" value="yes" required autofocus onclick="checkTest(1)">
                                                        <label class="custom-control-label" for="available">Available</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="notAvailable" name="labResults" class="custom-control-input{{ $errors->has('notAvailable') ? ' is-invalid' : '' }}" value="no" required autofocus onclick="checkTest(2)">
                                                        <label class="custom-control-label" for="notAvailable">Not available</label>
                                                    </div>   
                                                </div>
                                            </div>                           
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%;">
                                            <div class="form-group row" id="labTest" style="display: none;">
                                                <label for="labTest" class="col-sm-4 col-form-label"></label>
                                                <div class="col-md-8">
                                                    <div class="row" style="border: 1px solid #dee2e6; width: 99%">
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
                                                                <input type="radio" id="igmNegative" name="igm" class="custom-control-input{{ $errors->has('igmNegative') ? ' is-invalid' : '' }}" value="negative" autofocus onclick="testRequired()">
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
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="sameAddress" class="col-sm-4 col-form-label">Current Address</label>
                                                <div class="col-md-7">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="sameAddress" class="custom-control-input{{ $errors->has('sameAddress') ? ' is-invalid' : '' }}" name="sameAddress" value="{{ old('sameAddress') }}" autofocus onclick="fillCurAdd(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                        <label for="sameAddress" class="custom-control-label">Same as Residential</label>
                                                    </div>
                                                </div>        
                                            </div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;"> 
                                            <div class="form-group row">
                                                <label for="resAddLine1" class="col-sm-4 col-form-label">Residential Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('resAddLine1') ? ' is-invalid' : '' }}" id="resAddLine1" name="resAddLine1" value="{{ old('resAddLine1') }}" required autofocus onkeyup="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                    <small class="form-text text-muted">Address Line 1</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curAddLine1" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curAddLine1') ? ' is-invalid' : '' }}" id="curAddLine1" name="curAddLine1" value="{{ old('curAddLine1') }}" required autofocus>
                                                    <small class="form-text text-muted">Address Line 1</small>
                                                </div>       
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resAddLine2" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('resAddLine2') ? ' is-invalid' : '' }}" id="resAddLine2" name="resAddLine2" value="{{ old('resAddLine2') }}" autofocus onkeyup="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                    <small class="form-text text-muted">Address Line 2</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curAddLine2" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curAddLine2') ? ' is-invalid' : '' }}" id="curAddLine2" name="curAddLine2" value="{{ old('curAddLine2') }}" autofocus>
                                                    <small class="form-text text-muted">Address Line 2</small>
                                                </div>       
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resGSDivName" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="resGSDivName" name="resGSDivName" class="form-control{{ $errors->has('resGSDivName') ? ' is-invalid' : '' }}" value="{{ old('resGSDivName') }}" required autofocus onchange="configure1(this,resGSDiv,resDSDiv,resDistrict,resProvince,resMOHArea,resPHIRange); fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange);">
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
                                                        <option value="Kodday">Kodday</option>
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
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curGSDivName" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="curGSDivName" name="curGSDivName" class="form-control{{ $errors->has('curGSDivName') ? ' is-invalid' : '' }}" value="{{ old('curGSDivName') }}" required autofocus onchange="configure1(this,curGSDiv,curDSDiv,curDistrict,curProvince,curMOHArea,curPHIRange)">
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
                                                        <option value="Kodday">Kodday</option>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resGSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="resGSDiv" name="resGSDiv" class="form-control{{ $errors->has('resGSDiv') ? ' is-invalid' : '' }}" value="{{ old('resGSDiv') }}" required autofocus onchange="configure2(this,resGSDivName,resDSDiv,resDistrict,resProvince,resMOHArea,resPHIRange); fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange);">
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
                                                <label for="curGSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="curGSDiv" name="curGSDiv" class="form-control{{ $errors->has('curGSDiv') ? ' is-invalid' : '' }}" value="{{ old('curGSDiv') }}" required autofocus onchange="configure2(this,curGSDivName,curDSDiv,curDistrict,curProvince,curMOHArea,curPHIRange)">
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
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resDSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('resDSDiv') ? ' is-invalid' : '' }}" id="resDSDiv" name="resDSDiv" value="{{ old('resDSDiv') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">DS Division</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curDSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curDSDiv') ? ' is-invalid' : '' }}" id="curDSDiv" name="curDSDiv" value="{{ old('curDSDiv') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">DS Division</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resDistrict" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('resDistrict') ? ' is-invalid' : '' }}" id="resDistrict" name="resDistrict" value="{{ old('resDistrict') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">District</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curDistrict" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curDistrict') ? ' is-invalid' : '' }}" id="curDistrict" name="curDistrict" value="{{ old('curDistrict') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">District</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resProvince" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('resProvince') ? ' is-invalid' : '' }}" id="resProvince" name="resProvince" value="{{ old('resProvince') }}" readonly required autofocus>
                                                    <small id="resProvince" class="form-text text-muted">Province</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curProvince" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curProvince') ? ' is-invalid' : '' }}" id="curProvince" name="curProvince" value="{{ old('curProvince') }}" readonly required autofocus>
                                                    <small class="form-text text-muted">Province</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resMOHArea" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="resMOHArea" name="resMOHArea" class="form-control{{ $errors->has('resMOHArea') ? ' is-invalid' : '' }}" value="{{ old('resMOHArea') }}" required autofocus onchange="configurePHI(this,document.getElementById('resPHIRange')); fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange);">
                                                        <option value="" disabled selected>Select a MOH Area</option>
                                                    </select>
                                                    <small class="form-text text-muted">MOH Area</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curMOHArea" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="curMOHArea" name="curMOHArea" class="form-control{{ $errors->has('curMOHArea') ? ' is-invalid' : '' }}" value="{{ old('curMOHArea') }}" required autofocus onchange="configurePHI(this,document.getElementById('curPHIRange'))">
                                                        <option value="" disabled selected>Select a MOH Area</option>
                                                    </select>
                                                    <small class="form-text text-muted">MOH Area</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resPHIRange" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="resPHIRange" name="resPHIRange" class="form-control{{ $errors->has('resPHIRange') ? ' is-invalid' : '' }}" value="{{ old('resPHIRange') }}" required autofocus onchange="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                        <option value="" disabled selected>Select a PHI Range</option>
                                                    </select>
                                                    <small class="form-text text-muted">PHI Range</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curPHIRange" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="curPHIRange" name="curPHIRange" class="form-control{{ $errors->has('curPHIRange') ? ' is-invalid' : '' }}" value="{{ old('curPHIRange') }}" required autofocus>
                                                        <option value="" disabled selected>Select a PHI Range</option>
                                                    </select>
                                                    <small class="form-text text-muted">PHI Range</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="resLandmark" class="col-sm-4 col-form-label">Landmark For Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('resLandmark') ? ' is-invalid' : '' }}" id="resLandmark" name="resLandmark" value="{{ old('resLandmark') }}" required autofocus onkeyup="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curLandmark" class="col-sm-4 col-form-label">Landmark For Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curLandmark') ? ' is-invalid' : '' }}" id="curLandmark" name="curLandmark" value="{{ old('curLandmark') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;"> 
                                            <div class="form-group row">
                                                <label for="phoneMobile" class="col-sm-4 col-form-label">Patient's Phone No (Mobile)</label>
                                                <div class="col-sm-7">
                                                    <input id="phoneMobile" type="tel" class="form-control{{ $errors->has('phoneMobile') ? ' is-invalid' : '' }}"  name="phoneMobile" value="{{ old('phoneMobile') }}" required autofocus placeholder="##########" maxlength="10">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="phoneHome" class="col-sm-4 col-form-label">Patient's Phone No (Home)</label>
                                                <div class="col-sm-3">
                                                    <input id="areaCode" type="tel" class="form-control{{ $errors->has('areaCode') ? ' is-invalid' : '' }}"  name="areaCode" value="{{ old('areaCode') }}" required autofocus placeholder="###" maxlength="3">
                                                    <small id="areaCode" class="form-text text-muted">Area Code</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input id="phoneNo" type="tel" class="form-control{{ $errors->has('phoneNo') ? ' is-invalid' : '' }}"  name="phoneNo" value="{{ old('phoneNo') }}" required autofocus placeholder="#######" maxlength="7">
                                                    <small id="phoneNo" class="form-text text-muted">Phone Number</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="designation" class="col-sm-4 col-form-label">Designation of Notifier</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" id="designation" name="designation" value="{{ $designation }}" readonly autofocus>
                                                </div>
                                            </div>
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
