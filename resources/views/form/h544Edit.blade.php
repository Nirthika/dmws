@extends('layouts.app')

@section('content')
<script type="text/javascript">
    window.onload = myAlert;
    function myAlert(){
        if (document.getElementById("government").checked) {          
            document.getElementById('govHospitalDiv').style.display = '';        
            document.getElementById('pvtHospitalDiv').style.display = 'none';
            document.getElementById('govHospital').required = true;
            document.getElementById('pvtHospital').required = false;
        }
        else if(document.getElementById("private").checked){  
            document.getElementById('pvtHospitalDiv').style.display = '';
            document.getElementById('govHospitalDiv').style.display = 'none';
            document.getElementById('pvtHospital').required = true;
            document.getElementById('govHospital').required = false;
        }
        if (document.getElementById("groupA").checked) {
            document.getElementById('diseaseGroupADiv').style.display = '';
            document.getElementById('diseaseGroupBDiv').style.display = 'none';
            document.getElementById('diseaseGroupA').required = true;
            document.getElementById('diseaseGroupB').required = false;
        }
        else if(document.getElementById("groupB").checked){  
            document.getElementById('diseaseGroupBDiv').style.display = '';
            document.getElementById('diseaseGroupADiv').style.display = 'none';
            document.getElementById('diseaseGroupB').required = true;
            document.getElementById('diseaseGroupA').required = false;
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
        if (document.getElementById("age").value<18){        
            document.getElementById('childGuardian').style.display = '';
            document.getElementById('childGuardianName').style.display = '';
            document.getElementById('nextOfKin').style.display = 'none';
            document.getElementById('mother').required = true;
            document.getElementById('father').required = true;
            document.getElementById('guardian').required = true;
            document.getElementById('childGuardianFirstName').required = true;
            document.getElementById('childGuardianLastName').required = true;
            document.getElementById('nextOfKinFirstName').required = false;
            document.getElementById('nextOfKinLastName').required = false;
        }
        else{
            document.getElementById('nextOfKin').style.display = '';
            document.getElementById('childGuardian').style.display = 'none';
            document.getElementById('childGuardianName').style.display = 'none';
            document.getElementById('nextOfKinFirstName').required = true;
            document.getElementById('nextOfKinLastName').required = true;
            document.getElementById('mother').required = false;
            document.getElementById('father').required = false;
            document.getElementById('guardian').required = false;
            document.getElementById('childGuardianFirstName').required = false;
            document.getElementById('childGuardianLastName').required = false;
        }
        if(document.getElementById('available').checked){    
            document.getElementById('labTest').style.display = '';
            document.getElementById('igmNegative').required = true;
        }
        else if(document.getElementById('notAvailable').checked){  
            document.getElementById('labTest').style.display = 'none';
            document.getElementById("ns1Positive").checked = false;
            document.getElementById("ns1Negative").checked = false;
            document.getElementById("igmPositive").checked = false;
            document.getElementById("igmNegative").checked = false;
            document.getElementById("iggPositive").checked = false;
            document.getElementById("iggNegative").checked = false;
            document.getElementById('igmNegative').required = false;
        }
        if(document.getElementById('sameAddress').checked) {
            document.getElementById('curAddLine1').value = document.getElementById('resAddLine1').value;
            document.getElementById('curAddLine2').value = document.getElementById('resAddLine2').value;
            document.getElementById('curDSDiv').value = document.getElementById('resDSDiv').value;
            document.getElementById('curDistrict').value = document.getElementById('resDistrict').value;
            document.getElementById('curProvince').value = document.getElementById('resProvince').value;
            document.getElementById('curLandmark').value = document.getElementById('resLandmark').value;

            curGSDivName.value=resGSDivName.value;
            curGSDiv.value=resGSDiv.value;
            createOptionMohPhi(curMOHArea, resMOHArea.value, resMOHArea.value);
            curMOHArea.value = resMOHArea.value;
            createOptionMohPhi(curPHIRange, resPHIRange.value, resPHIRange.value);
            curPHIRange.value = resPHIRange.value;

            document.getElementById('curAddLine1').disabled = true;
            document.getElementById('curAddLine2').disabled = true;
            document.getElementById('curGSDivName').disabled = true;
            document.getElementById('curGSDiv').disabled = true;
            document.getElementById('curMOHArea').disabled = true;
            document.getElementById('curPHIRange').disabled = true;
            document.getElementById('curLandmark').disabled = true;
        }
        if(document.getElementById("ns1Positive").checked || document.getElementById("ns1Negative").checked ||
            document.getElementById("igmPositive").checked || document.getElementById("igmNegative").checked ||
            document.getElementById("iggPositive").checked || document.getElementById("iggNegative").checked){
            document.getElementById('igmNegative').required = false;
        } 
        else{
            document.getElementById('igmNegative').required = true;
        }   
        if("{{ $h544Data->status }}" === "sent"){
            var form = document.getElementById("h544Edit");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = true;
            }
        }
    }
    function createOptionMohPhi(id1, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        id1.options.add(opt);
    }
</script>
<script src="{{ asset('js/h544.js') }}"></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'Doctor')
            <li class="breadcrumb-item"><a href="../../doctorHome" style="text-decoration: none;">Home</a></li>
        @elseif ($userType == 'MOH')
            <li class="breadcrumb-item"><a href="../../mOHHome" style="text-decoration: none;">Home</a></li>
        @endif
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
                    <form id="h544Edit" method="POST" action="/h544/{{ $h544Data->id }}">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>                                    
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            @if($h544Data->institute == 'Government')
                                                @php $institute = 'Government'; @endphp
                                            @elseif($h544Data->institute == 'Private')
                                                @php $institute = 'Private'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="institute" class="col-sm-4 col-form-label">Institute</label>
                                                <div class="col-sm-7">                                          
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="government" name="institute" class="custom-control-input{{ $errors->has('government') ? ' is-invalid' : '' }}" value="Government" onclick="checkInstitute(1)" @if($institute == 'Government') checked @endif required autofocus>
                                                        <label class="custom-control-label" for="government">Government</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="private" name="institute" class="custom-control-input{{ $errors->has('private') ? ' is-invalid' : '' }}" value="Private" onclick="checkInstitute(2)" @if($institute == 'Private') checked @endif required autofocus>
                                                        <label class="custom-control-label" for="private">Private</label>
                                                    </div>      
                                                </div>
                                            </div>
                                            <div class="form-group row" id="govHospitalDiv" style="display: none;">
                                                <label for="govHospital" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="govHospital" name="govHospital" class="form-control{{ $errors->has('govHospital') ? ' is-invalid' : '' }}" autofocus>
                                                        <option value="" disabled selected>Select a hospital</option>
                                                        <option value="Jaffna Teaching Hospital" {{ $h544Data->insName == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="pvtHospitalDiv" style="display: none;">
                                                <label for="pvtHospital" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="pvtHospital" name="pvtHospital" class="form-control{{ $errors->has('pvtHospital') ? ' is-invalid' : '' }}" autofocus>
                                                        <option value="" disabled selected>Select a hospital</option>
                                                        <option value="New Yarl Hospital" {{ $h544Data->insName == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                        <option value="Northern Central Hospitals (pvt)" {{ $h544Data->insName == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                        <option value="Rakavo Hospital" {{ $h544Data->insName == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                        <option value="Ruhlins Hospital" {{ $h544Data->insName == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                        <option value="Sujeeva Hospital" {{ $h544Data->insName == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                        <option value="Nagaa Medical Centre" {{ $h544Data->insName == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                        <option value="Sampanthar Modern Clinic" {{ $h544Data->insName == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                        <option value="Shan's Health Care" {{ $h544Data->insName == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                        <option value="Divisional Hospital" {{ $h544Data->insName == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                        <option value="Sunrice Medi Clinic" {{ $h544Data->insName == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                        <option value="Royal Medical Centre" {{ $h544Data->insName == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                        <option value="Mangalapathy Siddha Ayurvedic" {{ $h544Data->insName == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                        <option value="Shanthe Medi Clinic" {{ $h544Data->insName == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                        <option value="Pillaiyar Medi Clinic" {{ $h544Data->insName == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                        <option value="Modern New Medi Care Hospital" {{ $h544Data->insName == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                        <option value="Care &amp; Cure" {{ $h544Data->insName == 'Care & Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                        <option value="Renny Dental &amp; Optical Service" {{ $h544Data->insName == 'Renny Dental & Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                        <option value="Dental Surgery" {{ $h544Data->insName == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                        <option value="Life Care Medi Cilinic" {{ $h544Data->insName == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                        <option value="Suharni Hospital" {{ $h544Data->insName == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-bottom: 0%; width: 50%;">
                                            @if($h544Data->diseaseGroup == 'Group A')
                                                @php $diseaseGroup = 'Group A'; @endphp
                                            @elseif($h544Data->diseaseGroup == 'Group B')
                                                @php $diseaseGroup = 'Group B'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="diseaseGroup" class="col-sm-4 col-form-label">Disease</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="groupA" name="diseaseGroup" class="custom-control-input{{ $errors->has('groupA') ? ' is-invalid' : '' }}" value="Group A" onclick="checkDisease(1)" @if($diseaseGroup == 'Group A') checked @endif required autofocus>
                                                        <label class="custom-control-label" for="groupA">Group A</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="groupB" name="diseaseGroup" class="custom-control-input{{ $errors->has('groupB') ? ' is-invalid' : '' }}" value="Group B" onclick="checkDisease(2)" @if($diseaseGroup == 'Group B') checked @endif required autofocus>
                                                        <label class="custom-control-label" for="groupB">Group B</label>
                                                    </div>      
                                                </div>
                                            </div>
                                            <div class="form-group row" id="diseaseGroupADiv" style="display:none">
                                                <label for="diseaseGroupA" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="diseaseGroupA" name="diseaseGroupA" class="form-control{{ $errors->has('diseaseGroupA') ? ' is-invalid' : '' }}" value="{{ old('diseaseGroupA') }}" autofocus>
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Cholera" {{ $h544Data->diseaseName == 'Cholera' ? 'selected' : '' }}>Cholera</option>
                                                        <option value="Plague" {{ $h544Data->diseaseName == 'Plague' ? 'selected' : '' }}>Plague</option>
                                                        <option value="Yellow Fever" {{ $h544Data->diseaseName == 'Yellow Fever' ? 'selected' : '' }}>Yellow Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="diseaseGroupBDiv" style="display:none">
                                                <label for="diseaseGroupB" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <select id="diseaseGroupB" name="diseaseGroupB" class="form-control{{ $errors->has('diseaseGroupB') ? ' is-invalid' : '' }}" value="{{ old('diseaseGroupB') }}" autofocus>
                                                        @php $or = 'or'; @endphp
                                                        <option value="" disabled selected>Select a disease</option>
                                                        <option value="Acute Poliomyelitis / Acute Flaccid Paralysis" {{ $h544Data->diseaseName == 'Acute Poliomyelitis / Acute Flaccid Paralysis' ? 'selected' : '' }}>Acute Poliomyelitis / Acute Flaccid Paralysis</option>
                                                        <option value="Chicken Pox" {{ $h544Data->diseaseName == 'Chicken Pox' ? 'selected' : '' }}>Chicken Pox</option>
                                                        <option value="Dengue Fever / Dengue Haemorrhagic Fever" {{ $h544Data->diseaseName == 'Dengue Fever / Dengue Haemorrhagic Fever' ? 'selected' : '' }}>Dengue Fever / Dengue Haemorrhagic Fever</option>
                                                        <option value="Diphtheria" {{ $h544Data->diseaseName == 'Diphtheria' ? 'selected' : '' }}>Diphtheria</option>
                                                        <option value="Dysentery" {{ $h544Data->diseaseName == 'Dysentery' ? 'selected' : '' }}>Dysentery</option>
                                                        <option value="Encephalitis" {{ $h544Data->diseaseName == 'Encephalitis' ? 'selected' : '' }}>Encephalitis</option>
                                                        <option value="Enteric Fever" {{ $h544Data->diseaseName == 'Enteric Fever' ? 'selected' : '' }}>Enteric Fever</option>
                                                        <option value="Food Poisoning" {{ $h544Data->diseaseName == 'Food Poisoning' ? 'selected' : '' }}>Food Poisoning</option>
                                                        <option value="Human Rabies" {{ $h544Data->diseaseName == 'Human Rabies' ? 'selected' : '' }}>Human Rabies</option>
                                                        <option value="Leishmaniasis" {{ $h544Data->diseaseName == 'Leishmaniasis' ? 'selected' : '' }}>Leishmaniasis</option>
                                                        <option value="Leprosy" {{ $h544Data->diseaseName == 'Leprosy' ? 'selected' : '' }}>Leprosy</option>
                                                        <option value="Leptospirosis" {{ $h544Data->diseaseName == 'Leptospirosis' ? 'selected' : '' }}>Leptospirosis</option>
                                                        <option value="Malaria" {{ $h544Data->diseaseName == 'Malaria' ? 'selected' : '' }}>Malaria</option>
                                                        <option value="Measles" {{ $h544Data->diseaseName == 'Measles' ? 'selected' : '' }}>Measles</option>
                                                        <option value="Meningitis" {{ $h544Data->diseaseName == 'Meningitis' ? 'selected' : '' }}>Meningitis</option>
                                                        <option value="Mumps" {{ $h544Data->diseaseName == 'Mumps' ? 'selected' : '' }}>Mumps</option>
                                                        <option value="Neonatal Tetanus" {{ $h544Data->diseaseName == 'Neonatal Tetanus' ? 'selected' : '' }}>Neonatal Tetanus</option>
                                                        <option value="Rubella / Congenital Rubella Syndrom" {{ $h544Data->diseaseName == 'Rubella / Congenital Rubella Syndrom' ? 'selected' : '' }}>Rubella / Congenital Rubella Syndrom</option>
                                                        <option value="Simple Continued Fever of over 7 days or more" {{$h544Data->diseaseName == 'Simple Continued Fever of over 7 days '.$or.' more' ? 'selected' : '' }}>Simple Continued Fever of over 7 days or more</option>
                                                        <option value="Tetanus" {{ $h544Data->diseaseName == 'Tetanus' ? 'selected' : '' }}>Tetanus</option>
                                                        <option value="Tuberculosis" {{ $h544Data->diseaseName == 'Tuberculosis' ? 'selected' : '' }}>Tuberculosis</option>
                                                        <option value="Typhus Fever" {{ $h544Data->diseaseName == 'Typhus Fever' ? 'selected' : '' }}>Typhus Fever</option>
                                                        <option value="Viral Hepatitis" {{ $h544Data->diseaseName == 'Viral Hepatitis' ? 'selected' : '' }}>Viral Hepatitis</option>
                                                        <option value="Whooping Cough" {{ $h544Data->diseaseName == 'Whooping Cough' ? 'selected' : '' }}>Whooping Cough</option>
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
                                                    <input type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" id="firstName" name="firstName" value="{{ $h544Data->firstName }}" required autofocus>
                                                    <small id="firstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" id="lastName" name="lastName" value="{{ $h544Data->lastName }}" required autofocus>
                                                    <small id="lastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            @if($h544Data->gender == 'Male')
                                                @php $gender = 'Male'; @endphp
                                            @elseif($h544Data->gender == 'Female')
                                                @php $gender = 'Female'; @endphp
                                            @elseif($h544Data->gender == 'Other')
                                                @php $gender = 'Other'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="male" name="gender" class="custom-control-input{{ $errors->has('male') ? ' is-invalid' : '' }}" value="Male" @if($gender == 'Male') checked @endif required autofocus>
                                                        <label class="custom-control-label" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="female" name="gender" class="custom-control-input{{ $errors->has('female') ? ' is-invalid' : '' }}" value="Female" @if($gender == 'Female') checked @endif required autofocus>
                                                        <label class="custom-control-label" for="female">Female</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="other" name="gender" class="custom-control-input{{ $errors->has('other') ? ' is-invalid' : '' }}" value="Other" @if($gender == 'Other') checked @endif required autofocus>
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
                                                    <input type="text" class="form-control{{ $errors->has('nickName') ? ' is-invalid' : '' }}" id="nickName" name="nickName" value="{{ $h544Data->nickName }}" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nICNum" class="col-sm-4 col-form-label">Patient /
                                                Guardian NIC Number</label>
                                                <div class="col-sm-7">
                                                    <input type="tel" class="form-control{{ $errors->has('nICNum') ? ' is-invalid' : '' }}" id="nICNum" name="nICNum" value="{{ $h544Data->nICNum }}" maxlength="12" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="visitArea" class="col-sm-4 col-form-label">Recent Visit to the Disease Area</label>
                                                <div class="col-sm-7">
                                                    <textarea id="visitArea" class="form-control{{ $errors->has('visitArea') ? ' is-invalid' : '' }}" name="visitArea" rows="3" autofocus>{{ $h544Data->visitArea }}</textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="onsetDate" class="col-sm-4 col-form-label">Onset of Fever</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('onsetDate') ? ' is-invalid' : '' }}" id="onsetDate" name="onsetDate" value="{{ $h544Data->onsetDate }}" required autofocus onchange="setMinAdmissionDate()">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="admissionDate" class="col-sm-4 col-form-label">Date of Admission</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('admissionDate') ? ' is-invalid' : '' }}" id="admissionDate" name="admissionDate" value="{{ $h544Data->admissionDate }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="regOrBHTNo" class="col-sm-4 col-form-label">Registration/BHT No</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('regOrBHTNo') ? ' is-invalid' : '' }}" id="regOrBHTNo" name="regOrBHTNo" value="{{ $h544Data->regOrBHTNo }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="ward" class="col-sm-4 col-form-label">Ward</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('ward') ? ' is-invalid' : '' }}" id="ward" name="ward" value="{{ $h544Data->ward }}" autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row" id="dateOfBirth">
                                                <label for="birthDate" class="col-sm-4 col-form-label">Date of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('birthDate') ? ' is-invalid' : '' }}" id="birthDate" name="birthDate" value="{{ $h544Data->birthDate }}" autofocus onchange="getAge()">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="yearOnly" class="col-sm-4 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="yearOnly" class="custom-control-input{{ $errors->has('yearOnly') ? ' is-invalid' : '' }}" name="yearOnly" value="{{ old('yearOnly') }}" onclick="checkDOB()" @if($h544Data->birthYear != NULL) checked @endif autofocus>
                                                        <label for="yearOnly" class="custom-control-label">Year Only</label>
                                                    </div>
                                                </div>        
                                            </div>

                                            <div class="form-group row" id="yearOfBirth" style="display:none">
                                                <label for="birthYear" class="col-sm-4 col-form-label">Year of Birth</label>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control{{ $errors->has('birthYear') ? ' is-invalid' : '' }}" id="birthYear" name="birthYear" value="{{ $h544Data->birthYear }}" autofocus onkeyup="getAge()" onclick="getAge()">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" value="{{ $h544Data->age }}" readonly required autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="nextOfKin" style="display: none;">
                                                <label for="nextOfKin" class="col-sm-4 col-form-label">Next of Kin</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control{{ $errors->has('nextOfKinFirstName') ? ' is-invalid' : '' }}" id="nextOfKinFirstName" name="nextOfKinFirstName" value="{{ $h544Data->nextOfKinFirstName }}" autofocus>
                                                    <small id="nextOfKinFirstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('nextOfKinLastName') ? ' is-invalid' : '' }}" id="nextOfKinLastName" name="nextOfKinLastName" value="{{ $h544Data->nextOfKinLastName }}" autofocus>
                                                    <small id="nextOfKinLastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>

                                            @php $childGuardian = ''; @endphp
                                            @if($h544Data->childGuardian == 'Mother')
                                                @php $childGuardian = 'Mother'; @endphp
                                            @elseif($h544Data->childGuardian == 'Father')
                                                @php $childGuardian = 'Father'; @endphp
                                            @elseif($h544Data->childGuardian == 'Guardian')
                                                @php $childGuardian = 'Guardian'; @endphp
                                            @endif
                                            <div class="form-group row" id="childGuardian" style="display: none;">
                                                <label for="childGuardian" class="col-sm-4 col-form-label">If patient age below 18years</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="mother" name="childGuardian" class="custom-control-input{{ $errors->has('mother') ? ' is-invalid' : '' }}" value="Mother" @if($childGuardian == 'Mother') checked @endif autofocus>
                                                        <label class="custom-control-label" for="mother">Mother</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="father" name="childGuardian" class="custom-control-input{{ $errors->has('father') ? ' is-invalid' : '' }}" value="Father" @if($childGuardian == 'Father') checked @endif autofocus>
                                                        <label class="custom-control-label" for="father">Father</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="guardian" name="childGuardian" class="custom-control-input{{ $errors->has('guardian') ? ' is-invalid' : '' }}" value="Guardian" @if($childGuardian == 'Guardian') checked @endif autofocus>
                                                        <label class="custom-control-label" for="guardian">Guardian</label>
                                                    </div>      
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="childGuardianName" style="display: none;"> 
                                                <label for="childGuardianName" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-3">                   
                                                    <input type="text" class="form-control{{ $errors->has('childGuardianFirstName') ? ' is-invalid' : '' }}" id="childGuardianFirstName" name="childGuardianFirstName" value="{{ $h544Data->childGuardianFirstName }}" autofocus>
                                                    <small id="childGuardianFirstName" class="form-text text-muted">First Name</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control{{ $errors->has('childGuardianLastName') ? ' is-invalid' : '' }}" id="childGuardianLastName" name="childGuardianLastName" value="{{ $h544Data->childGuardianLastName }}" autofocus>
                                                    <small id="childGuardianLastName" class="form-text text-muted">Last Name</small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; border-top: 1px solid #dee2e6; padding-bottom: 0%;"> 
                                            @if($h544Data->labResults == 'yes')
                                                @php $labResults = 'yes'; @endphp
                                            @elseif($h544Data->labResults == 'no')
                                                @php $labResults = 'no'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="labResults" class="col-sm-4 col-form-label">Laboratory Results</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="available" name="labResults" class="custom-control-input{{ $errors->has('available') ? ' is-invalid' : '' }}" value="yes" @if($labResults == 'yes') checked @endif required autofocus onclick="checkTest(1)">
                                                        <label class="custom-control-label" for="available">Available</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="notAvailable" name="labResults" class="custom-control-input{{ $errors->has('notAvailable') ? ' is-invalid' : '' }}" value="no" @if($labResults == 'no') checked @endif required autofocus onclick="checkTest(2)">
                                                        <label class="custom-control-label" for="notAvailable">Not available</label>
                                                    </div>   
                                                </div>
                                            </div>                           
                                        </td>
                                        <td style="border-top: 1px solid #dee2e6; padding-bottom: 0%;">
                                            @php $ns1 = ''; $igm = ''; $igg = '';  @endphp
                                            @if($h544Data->ns1 == 'positive')
                                                @php $ns1 = 'positive'; @endphp
                                            @elseif($h544Data->ns1 == 'negative')
                                                @php $ns1 = 'negative'; @endphp
                                            @endif
                                            @if($h544Data->igm == 'positive')
                                                @php $igm = 'positive'; @endphp
                                            @elseif($h544Data->igm == 'negative')
                                                @php $igm = 'negative'; @endphp
                                            @endif
                                            @if($h544Data->igg == 'positive')
                                                @php $igg = 'positive'; @endphp
                                            @elseif($h544Data->igg == 'negative')
                                                @php $igg = 'negative'; @endphp
                                            @endif
                                            <div class="form-group row" id="labTest" style="display: none;">
                                                <label for="labTest" class="col-sm-4 col-form-label"></label>
                                                <div class="col-md-8">
                                                    <div class="row" style="border: 1px solid #dee2e6; width: 99%">
                                                        <div class="col-md-4" style="padding-left: 0.5%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="ns1Positive" name="ns1" class="custom-control-input{{ $errors->has('ns1Positive') ? ' is-invalid' : '' }}" value="positive" autofocus onclick="testRequired()" @if($ns1 == 'positive') checked @endif>
                                                                <label class="custom-control-label" for="ns1Positive">NS-1 Positive</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="ns1Negative" name="ns1" class="custom-control-input{{ $errors->has('ns1Negative') ? ' is-invalid' : '' }}" value="negative" autofocus onclick="testRequired()" @if($ns1 == 'negative') checked @endif>
                                                                <label class="custom-control-label" for="ns1Negative">NS-1 Negative</label>
                                                            </div>                                                     
                                                        </div>
                                                        <div class="col-md-4" style="padding-left: 1%; padding-right: 0%; border-right: 1px solid #dee2e6;">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="igmPositive" name="igm" class="custom-control-input{{ $errors->has('igmPositive') ? ' is-invalid' : '' }}" value="positive" autofocus onclick="testRequired()" @if($igm == 'positive') checked @endif>
                                                                <label class="custom-control-label" for="igmPositive">IgM Positive</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="igmNegative" name="igm" class="custom-control-input{{ $errors->has('igmNegative') ? ' is-invalid' : '' }}" value="negative" autofocus onclick="testRequired()" @if($igm == 'negative') checked @endif>
                                                                <label class="custom-control-label" for="igmNegative">IgM Negative</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="padding-left: 1%; padding-right: 0%;">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="iggPositive" name="igg" class="custom-control-input{{ $errors->has('iggPositive') ? ' is-invalid' : '' }}" value="positive" autofocus onclick="testRequired()" @if($igg == 'positive') checked @endif>
                                                                <label class="custom-control-label" for="iggPositive">IgG Positive</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="iggNegative" name="igg" class="custom-control-input{{ $errors->has('iggNegative') ? ' is-invalid' : '' }}" value="negative" autofocus onclick="testRequired()" @if($igg == 'negative') checked @endif>
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
                                            @php $sameAddress = 'no'; @endphp
                                            @if($h544Data->sameAddress == 'yes')
                                                @php $sameAddress = 'yes'; @endphp
                                            @endif
                                            <div class="form-group row">
                                                <label for="sameAddress" class="col-sm-4 col-form-label">Current Address</label>
                                                <div class="col-md-7">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="sameAddress" class="custom-control-input{{ $errors->has('sameAddress') ? ' is-invalid' : '' }}" name="sameAddress" value="{{ old('sameAddress') }}" autofocus @if($sameAddress == 'yes') checked @endif onclick="fillCurAdd(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
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
                                                    <input type="text" class="form-control{{ $errors->has('resAddLine1') ? ' is-invalid' : '' }}" id="resAddLine1" name="resAddLine1" value="{{ $h544Data->resAddLine1 }}" required autofocus onkeyup="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                    <small class="form-text text-muted">Address Line 1</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curAddLine1" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curAddLine1') ? ' is-invalid' : '' }}" id="curAddLine1" name="curAddLine1" value="{{ $h544Data->curAddLine1 }}" required autofocus>
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
                                                    <input type="text" class="form-control{{ $errors->has('resAddLine2') ? ' is-invalid' : '' }}" id="resAddLine2" name="resAddLine2" value="{{ $h544Data->resAddLine2 }}" autofocus onkeyup="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                    <small class="form-text text-muted">Address Line 2</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curAddLine2" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curAddLine2') ? ' is-invalid' : '' }}" id="curAddLine2" name="curAddLine2" value="{{ $h544Data->curAddLine2 }}" autofocus>
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
                                                        <option value="Anthoniyarpuram" {{ $h544Data->resGSDivName == 'Anthoniyarpuram' ? 'selected' : '' }}>Anthoniyarpuram</option>
                                                        <option value="Ariyalai Center" {{ $h544Data->resGSDivName == 'Ariyalai Center' ? 'selected' : '' }}>Ariyalai Center</option>
                                                        <option value="Ariyalai Center North" {{ $h544Data->resGSDivName == 'Ariyalai Center North' ? 'selected' : '' }}>Ariyalai Center North</option>
                                                        <option value="Ariyalai Center South" {{ $h544Data->resGSDivName == 'Ariyalai Center South' ? 'selected' : '' }}>Ariyalai Center South</option>
                                                        <option value="Ariyalai Center West" {{ $h544Data->resGSDivName == 'Ariyalai Center West' ? 'selected' : '' }}>Ariyalai Center West</option>
                                                        <option value="Ariyalai North West" {{ $h544Data->resGSDivName == 'Ariyalai North West' ? 'selected' : '' }}>Ariyalai North West</option>
                                                        <option value="Ariyalai South West" {{ $h544Data->resGSDivName == 'Ariyalai South West' ? 'selected' : '' }}>Ariyalai South West</option>
                                                        <option value="Athiyady" {{ $h544Data->resGSDivName == 'Athiyady' ? 'selected' : '' }}>Athiyady</option>
                                                        <option value="Chundukuli North" {{ $h544Data->resGSDivName == 'Chundukuli North' ? 'selected' : '' }}>Chundukuli North</option>
                                                        <option value="Chundukuli South" {{ $h544Data->resGSDivName == 'Chundukuli South' ? 'selected' : '' }}>Chundukuli South</option>
                                                        <option value="Colompuththurai East" {{ $h544Data->resGSDivName == 'Colompuththurai East' ? 'selected' : '' }}>Colompuththurai East</option>
                                                        <option value="Colompuththurai West" {{ $h544Data->resGSDivName == 'Colompuththurai West' ? 'selected' : '' }}>Colompuththurai West</option>
                                                        <option value="Eachchamodai" {{ $h544Data->resGSDivName == 'Eachchamodai' ? 'selected' : '' }}>Eachchamodai</option>
                                                        <option value="Fort" {{ $h544Data->resGSDivName == 'Fort' ? 'selected' : '' }}>Fort</option>
                                                        <option value="Grand Bazaar" {{ $h544Data->resGSDivName == 'Grand Bazaar' ? 'selected' : '' }}>Grand Bazaar</option>
                                                        <option value="Gurunagar East" {{ $h544Data->resGSDivName == 'Gurunagar East' ? 'selected' : '' }}>Gurunagar East</option>
                                                        <option value="Gurunagar West" {{ $h544Data->resGSDivName == 'Gurunagar West' ? 'selected' : '' }}>Gurunagar West</option>
                                                        <option value="Illupaikadavai" {{ $h544Data->resGSDivName == 'Illupaikadavai' ? 'selected' : '' }}>Illupaikadavai</option>
                                                        <option value="Iyanar kovilady" {{ $h544Data->resGSDivName == 'Iyanar kovilady' ? 'selected' : '' }}>Iyanar kovilady</option>
                                                        <option value="Jaffna town East" {{ $h544Data->resGSDivName == 'Jaffna town East' ? 'selected' : '' }}>Jaffna town East</option>
                                                        <option value="Jaffna town West" {{ $h544Data->resGSDivName == 'Jaffna town West' ? 'selected' : '' }}>Jaffna town West</option>
                                                        <option value="Kandarmadam N.E" {{ $h544Data->resGSDivName == 'Kandarmadam N.E' ? 'selected' : '' }}>Kandarmadam N.E</option>
                                                        <option value="Kandarmadam N.W" {{ $h544Data->resGSDivName == 'Kandarmadam N.W' ? 'selected' : '' }}>Kandarmadam N.W</option>
                                                        <option value="Kandarmadam S.E" {{ $h544Data->resGSDivName == 'Kandarmadam S.E' ? 'selected' : '' }}>Kandarmadam S.E</option>
                                                        <option value="Kandarmadam S.W" {{ $h544Data->resGSDivName == 'Kandarmadam S.W' ? 'selected' : '' }}>Kandarmadam S.W</option>
                                                        <option value="Keerisuddan" {{ $h544Data->resGSDivName == 'Keerisuddan' ? 'selected' : '' }}>Keerisuddan</option>
                                                        <option value="Kodday" {{ $h544Data->resGSDivName == 'Kodday' ? 'selected' : '' }}>Kodday</option>
                                                        <option value="Madhu" {{ $h544Data->resGSDivName == 'Madhu' ? 'selected' : '' }}>Madhu</option>
                                                        <option value="Maruthady" {{ $h544Data->resGSDivName == 'Maruthady' ? 'selected' : '' }}>Maruthady</option>
                                                        <option value="Moor Street North" {{ $h544Data->resGSDivName == 'Moor Street North' ? 'selected' : '' }}>Moor Street North</option>
                                                        <option value="Moor Street South" {{ $h544Data->resGSDivName == 'Moor Street South' ? 'selected' : '' }}>Moor Street South</option>
                                                        <option value="Nadankulam" {{ $h544Data->resGSDivName == 'Nadankulam' ? 'selected' : '' }}>Nadankulam</option>
                                                        <option value="Nallur North" {{ $h544Data->resGSDivName == 'Nallur North' ? 'selected' : '' }}>Nallur North</option>
                                                        <option value="Nallur Rajathany" {{ $h544Data->resGSDivName == 'Nallur Rajathany' ? 'selected' : '' }}>Nallur Rajathany</option>
                                                        <option value="Nallur South" {{ $h544Data->resGSDivName == 'Nallur South' ? 'selected' : '' }}>Nallur South</option>
                                                        <option value="Navanthurai North" {{ $h544Data->resGSDivName == 'Navanthurai North' ? 'selected' : '' }}>Navanthurai North</option>
                                                        <option value="Navanthurai South" {{ $h544Data->resGSDivName == 'Navanthurai South' ? 'selected' : '' }}>Navanthurai South</option>
                                                        <option value="Neeraviyady" {{ $h544Data->resGSDivName == 'Neeraviyady' ? 'selected' : '' }}>Neeraviyady</option>
                                                        <option value="New Moor Street" {{ $h544Data->resGSDivName == 'New Moor Street' ? 'selected' : '' }}>New Moor Street</option>
                                                        <option value="Palampiddy" {{ $h544Data->resGSDivName == 'Palampiddy' ? 'selected' : '' }}>Palampiddy</option>
                                                        <option value="Paliaru" {{ $h544Data->resGSDivName == 'Paliaru' ? 'selected' : '' }}>Paliaru</option>
                                                        <option value="Passaiyoor East" {{ $h544Data->resGSDivName == 'Passaiyoor East' ? 'selected' : '' }}>Passaiyoor East</option>
                                                        <option value="Passaiyoor West" {{ $h544Data->resGSDivName == 'Passaiyoor West' ? 'selected' : '' }}>Passaiyoor West</option>
                                                        <option value="Periyapandivirichchan East" {{ $h544Data->resGSDivName == 'Periyapandivirichchan East' ? 'selected' : '' }}>Periyapandivirichchan East</option>
                                                        <option value="Periyapandivirichchan West" {{ $h544Data->resGSDivName == 'Periyapandivirichchan West' ? 'selected' : '' }}>Periyapandivirichchan West</option>
                                                        <option value="Reclamation East" {{ $h544Data->resGSDivName == 'Reclamation East' ? 'selected' : '' }}>Reclamation East</option>
                                                        <option value="Reclamation West" {{ $h544Data->resGSDivName == 'Reclamation West' ? 'selected' : '' }}>Reclamation West</option>
                                                        <option value="Sangiliyan thoppu" {{ $h544Data->resGSDivName == 'Sangiliyan thoppu' ? 'selected' : '' }}>Sangiliyan thoppu</option>
                                                        <option value="Sirampaiyady" {{ $h544Data->resGSDivName == 'Sirampaiyady' ? 'selected' : '' }}>Sirampaiyady</option>
                                                        <option value="Small bazaar" {{ $h544Data->resGSDivName == 'Small bazaar' ? 'selected' : '' }}>Small bazaar</option>
                                                        <option value="Thevanpiddy" {{ $h544Data->resGSDivName == 'Thevanpiddy' ? 'selected' : '' }}>Thevanpiddy</option>
                                                        <option value="Thirunagar" {{ $h544Data->resGSDivName == 'Thirunagar' ? 'selected' : '' }}>Thirunagar</option>
                                                        <option value="Vannarpannai" {{ $h544Data->resGSDivName == 'Vannarpannai' ? 'selected' : '' }}>Vannarpannai</option>
                                                        <option value="Vannarpannai N.E" {{ $h544Data->resGSDivName == 'Vannarpannai N.E' ? 'selected' : '' }}>Vannarpannai N.E</option>
                                                        <option value="Vannarpannai N.W" {{ $h544Data->resGSDivName == 'Vannarpannai N.W' ? 'selected' : '' }}>Vannarpannai N.W</option>
                                                        <option value="Vannarpannai North" {{ $h544Data->resGSDivName == 'Vannarpannai North' ? 'selected' : '' }}>Vannarpannai North</option>
                                                        <option value="Vellankulam" {{ $h544Data->resGSDivName == 'Vellankulam' ? 'selected' : '' }}>Vellankulam</option>
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
                                                        <option value="Anthoniyarpuram" {{ $h544Data->curGSDivName == 'Anthoniyarpuram' ? 'selected' : '' }}>Anthoniyarpuram</option>
                                                        <option value="Ariyalai Center" {{ $h544Data->curGSDivName == 'Ariyalai Center' ? 'selected' : '' }}>Ariyalai Center</option>
                                                        <option value="Ariyalai Center North" {{ $h544Data->curGSDivName == 'Ariyalai Center North' ? 'selected' : '' }}>Ariyalai Center North</option>
                                                        <option value="Ariyalai Center South" {{ $h544Data->curGSDivName == 'Ariyalai Center South' ? 'selected' : '' }}>Ariyalai Center South</option>
                                                        <option value="Ariyalai Center West" {{ $h544Data->curGSDivName == 'Ariyalai Center West' ? 'selected' : '' }}>Ariyalai Center West</option>
                                                        <option value="Ariyalai North West" {{ $h544Data->curGSDivName == 'Ariyalai North West' ? 'selected' : '' }}>Ariyalai North West</option>
                                                        <option value="Ariyalai South West" {{ $h544Data->curGSDivName == 'Ariyalai South West' ? 'selected' : '' }}>Ariyalai South West</option>
                                                        <option value="Athiyady" {{ $h544Data->curGSDivName == 'Athiyady' ? 'selected' : '' }}>Athiyady</option>
                                                        <option value="Chundukuli North" {{ $h544Data->curGSDivName == 'Chundukuli North' ? 'selected' : '' }}>Chundukuli North</option>
                                                        <option value="Chundukuli South" {{ $h544Data->curGSDivName == 'Chundukuli South' ? 'selected' : '' }}>Chundukuli South</option>
                                                        <option value="Colompuththurai East" {{ $h544Data->curGSDivName == 'Colompuththurai East' ? 'selected' : '' }}>Colompuththurai East</option>
                                                        <option value="Colompuththurai West" {{ $h544Data->curGSDivName == 'Colompuththurai West' ? 'selected' : '' }}>Colompuththurai West</option>
                                                        <option value="Eachchamodai" {{ $h544Data->curGSDivName == 'Eachchamodai' ? 'selected' : '' }}>Eachchamodai</option>
                                                        <option value="Fort" {{ $h544Data->curGSDivName == 'Fort' ? 'selected' : '' }}>Fort</option>
                                                        <option value="Grand Bazaar" {{ $h544Data->curGSDivName == 'Grand Bazaar' ? 'selected' : '' }}>Grand Bazaar</option>
                                                        <option value="Gurunagar East" {{ $h544Data->curGSDivName == 'Gurunagar East' ? 'selected' : '' }}>Gurunagar East</option>
                                                        <option value="Gurunagar West" {{ $h544Data->curGSDivName == 'Gurunagar West' ? 'selected' : '' }}>Gurunagar West</option>
                                                        <option value="Illupaikadavai" {{ $h544Data->curGSDivName == 'Illupaikadavai' ? 'selected' : '' }}>Illupaikadavai</option>
                                                        <option value="Iyanar kovilady" {{ $h544Data->curGSDivName == 'Iyanar kovilady' ? 'selected' : '' }}>Iyanar kovilady</option>
                                                        <option value="Jaffna town East" {{ $h544Data->curGSDivName == 'Jaffna town East' ? 'selected' : '' }}>Jaffna town East</option>
                                                        <option value="Jaffna town West" {{ $h544Data->curGSDivName == 'Jaffna town West' ? 'selected' : '' }}>Jaffna town West</option>
                                                        <option value="Kandarmadam N.E" {{ $h544Data->curGSDivName == 'Kandarmadam N.E' ? 'selected' : '' }}>Kandarmadam N.E</option>
                                                        <option value="Kandarmadam N.W" {{ $h544Data->curGSDivName == 'Kandarmadam N.W' ? 'selected' : '' }}>Kandarmadam N.W</option>
                                                        <option value="Kandarmadam S.E" {{ $h544Data->curGSDivName == 'Kandarmadam S.E' ? 'selected' : '' }}>Kandarmadam S.E</option>
                                                        <option value="Kandarmadam S.W" {{ $h544Data->curGSDivName == 'Kandarmadam S.W' ? 'selected' : '' }}>Kandarmadam S.W</option>
                                                        <option value="Keerisuddan" {{ $h544Data->curGSDivName == 'Keerisuddan' ? 'selected' : '' }}>Keerisuddan</option>
                                                        <option value="Kodday" {{ $h544Data->curGSDivName == 'Kodday' ? 'selected' : '' }}>Kodday</option>
                                                        <option value="Madhu" {{ $h544Data->curGSDivName == 'Madhu' ? 'selected' : '' }}>Madhu</option>
                                                        <option value="Maruthady" {{ $h544Data->curGSDivName == 'Maruthady' ? 'selected' : '' }}>Maruthady</option>
                                                        <option value="Moor Street North" {{ $h544Data->curGSDivName == 'Moor Street North' ? 'selected' : '' }}>Moor Street North</option>
                                                        <option value="Moor Street South" {{ $h544Data->curGSDivName == 'Moor Street South' ? 'selected' : '' }}>Moor Street South</option>
                                                        <option value="Nadankulam" {{ $h544Data->curGSDivName == 'Nadankulam' ? 'selected' : '' }}>Nadankulam</option>
                                                        <option value="Nallur North" {{ $h544Data->curGSDivName == 'Nallur North' ? 'selected' : '' }}>Nallur North</option>
                                                        <option value="Nallur Rajathany" {{ $h544Data->curGSDivName == 'Nallur Rajathany' ? 'selected' : '' }}>Nallur Rajathany</option>
                                                        <option value="Nallur South" {{ $h544Data->curGSDivName == 'Nallur South' ? 'selected' : '' }}>Nallur South</option>
                                                        <option value="Navanthurai North" {{ $h544Data->curGSDivName == 'Navanthurai North' ? 'selected' : '' }}>Navanthurai North</option>
                                                        <option value="Navanthurai South" {{ $h544Data->curGSDivName == 'Navanthurai South' ? 'selected' : '' }}>Navanthurai South</option>
                                                        <option value="Neeraviyady" {{ $h544Data->curGSDivName == 'Neeraviyady' ? 'selected' : '' }}>Neeraviyady</option>
                                                        <option value="New Moor Street" {{ $h544Data->curGSDivName == 'New Moor Street' ? 'selected' : '' }}>New Moor Street</option>
                                                        <option value="Palampiddy" {{ $h544Data->curGSDivName == 'Palampiddy' ? 'selected' : '' }}>Palampiddy</option>
                                                        <option value="Paliaru" {{ $h544Data->curGSDivName == 'Paliaru' ? 'selected' : '' }}>Paliaru</option>
                                                        <option value="Passaiyoor East" {{ $h544Data->curGSDivName == 'Passaiyoor East' ? 'selected' : '' }}>Passaiyoor East</option>
                                                        <option value="Passaiyoor West" {{ $h544Data->curGSDivName == 'Passaiyoor West' ? 'selected' : '' }}>Passaiyoor West</option>
                                                        <option value="Periyapandivirichchan East" {{ $h544Data->curGSDivName == 'Periyapandivirichchan East' ? 'selected' : '' }}>Periyapandivirichchan East</option>
                                                        <option value="Periyapandivirichchan West" {{ $h544Data->curGSDivName == 'Periyapandivirichchan West' ? 'selected' : '' }}>Periyapandivirichchan West</option>
                                                        <option value="Reclamation East" {{ $h544Data->curGSDivName == 'Reclamation East' ? 'selected' : '' }}>Reclamation East</option>
                                                        <option value="Reclamation West" {{ $h544Data->curGSDivName == 'Reclamation West' ? 'selected' : '' }}>Reclamation West</option>
                                                        <option value="Sangiliyan thoppu" {{ $h544Data->curGSDivName == 'Sangiliyan thoppu' ? 'selected' : '' }}>Sangiliyan thoppu</option>
                                                        <option value="Sirampaiyady" {{ $h544Data->curGSDivName == 'Sirampaiyady' ? 'selected' : '' }}>Sirampaiyady</option>
                                                        <option value="Small bazaar" {{ $h544Data->curGSDivName == 'Small bazaar' ? 'selected' : '' }}>Small bazaar</option>
                                                        <option value="Thevanpiddy" {{ $h544Data->curGSDivName == 'Thevanpiddy' ? 'selected' : '' }}>Thevanpiddy</option>
                                                        <option value="Thirunagar" {{ $h544Data->curGSDivName == 'Thirunagar' ? 'selected' : '' }}>Thirunagar</option>
                                                        <option value="Vannarpannai" {{ $h544Data->curGSDivName == 'Vannarpannai' ? 'selected' : '' }}>Vannarpannai</option>
                                                        <option value="Vannarpannai N.E" {{ $h544Data->curGSDivName == 'Vannarpannai N.E' ? 'selected' : '' }}>Vannarpannai N.E</option>
                                                        <option value="Vannarpannai N.W" {{ $h544Data->curGSDivName == 'Vannarpannai N.W' ? 'selected' : '' }}>Vannarpannai N.W</option>
                                                        <option value="Vannarpannai North" {{ $h544Data->curGSDivName == 'Vannarpannai North' ? 'selected' : '' }}>Vannarpannai North</option>
                                                        <option value="Vellankulam" {{ $h544Data->curGSDivName == 'Vellankulam' ? 'selected' : '' }}>Vellankulam</option>
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
                                                        <option value="J/61" {{ $h544Data->resGSDiv == 'J/61' ? 'selected' : '' }}> J/61 </option>
                                                        <option value="J/62" {{ $h544Data->resGSDiv == 'J/62' ? 'selected' : '' }}> J/62 </option>
                                                        <option value="J/63" {{ $h544Data->resGSDiv == 'J/63' ? 'selected' : '' }}> J/63 </option>
                                                        <option value="J/64" {{ $h544Data->resGSDiv == 'J/64' ? 'selected' : '' }}> J/64 </option>
                                                        <option value="J/65" {{ $h544Data->resGSDiv == 'J/65' ? 'selected' : '' }}> J/65 </option>
                                                        <option value="J/66" {{ $h544Data->resGSDiv == 'J/66' ? 'selected' : '' }}> J/66 </option>
                                                        <option value="J/67" {{ $h544Data->resGSDiv == 'J/67' ? 'selected' : '' }}> J/67 </option>
                                                        <option value="J/68" {{ $h544Data->resGSDiv == 'J/68' ? 'selected' : '' }}> J/68 </option>
                                                        <option value="J/69" {{ $h544Data->resGSDiv == 'J/69' ? 'selected' : '' }}> J/69 </option>
                                                        <option value="J/70" {{ $h544Data->resGSDiv == 'J/70' ? 'selected' : '' }}> J/70 </option>
                                                        <option value="J/71" {{ $h544Data->resGSDiv == 'J/71' ? 'selected' : '' }}> J/71 </option>
                                                        <option value="J/72" {{ $h544Data->resGSDiv == 'J/72' ? 'selected' : '' }}> J/72 </option>
                                                        <option value="J/73" {{ $h544Data->resGSDiv == 'J/73' ? 'selected' : '' }}> J/73 </option>
                                                        <option value="J/74" {{ $h544Data->resGSDiv == 'J/74' ? 'selected' : '' }}> J/74 </option>
                                                        <option value="J/75" {{ $h544Data->resGSDiv == 'J/75' ? 'selected' : '' }}> J/75 </option>
                                                        <option value="J/76" {{ $h544Data->resGSDiv == 'J/76' ? 'selected' : '' }}> J/76 </option>
                                                        <option value="J/77" {{ $h544Data->resGSDiv == 'J/77' ? 'selected' : '' }}> J/77 </option>
                                                        <option value="J/78" {{ $h544Data->resGSDiv == 'J/78' ? 'selected' : '' }}> J/78 </option>
                                                        <option value="J/79" {{ $h544Data->resGSDiv == 'J/79' ? 'selected' : '' }}> J/79 </option>
                                                        <option value="J/80" {{ $h544Data->resGSDiv == 'J/80' ? 'selected' : '' }}> J/80 </option>
                                                        <option value="J/81" {{ $h544Data->resGSDiv == 'J/81' ? 'selected' : '' }}> J/81 </option>
                                                        <option value="J/82" {{ $h544Data->resGSDiv == 'J/82' ? 'selected' : '' }}> J/82 </option>
                                                        <option value="J/83" {{ $h544Data->resGSDiv == 'J/83' ? 'selected' : '' }}> J/83 </option>
                                                        <option value="J/84" {{ $h544Data->resGSDiv == 'J/84' ? 'selected' : '' }}> J/84 </option>
                                                        <option value="J/85" {{ $h544Data->resGSDiv == 'J/85' ? 'selected' : '' }}> J/85 </option>
                                                        <option value="J/86" {{ $h544Data->resGSDiv == 'J/86' ? 'selected' : '' }}> J/86 </option>
                                                        <option value="J/87" {{ $h544Data->resGSDiv == 'J/87' ? 'selected' : '' }}> J/87 </option>
                                                        <option value="J/88" {{ $h544Data->resGSDiv == 'J/88' ? 'selected' : '' }}> J/88 </option>
                                                        <option value="J/91" {{ $h544Data->resGSDiv == 'J/91' ? 'selected' : '' }}> J/91 </option>
                                                        <option value="J/92" {{ $h544Data->resGSDiv == 'J/92' ? 'selected' : '' }}> J/92 </option>
                                                        <option value="J/93" {{ $h544Data->resGSDiv == 'J/93' ? 'selected' : '' }}> J/93 </option>
                                                        <option value="J/94" {{ $h544Data->resGSDiv == 'J/94' ? 'selected' : '' }}> J/94 </option>
                                                        <option value="J/95" {{ $h544Data->resGSDiv == 'J/95' ? 'selected' : '' }}> J/95 </option>
                                                        <option value="J/96" {{ $h544Data->resGSDiv == 'J/96' ? 'selected' : '' }}> J/96 </option>
                                                        <option value="J/97" {{ $h544Data->resGSDiv == 'J/97' ? 'selected' : '' }}> J/97 </option>
                                                        <option value="J/98" {{ $h544Data->resGSDiv == 'J/98' ? 'selected' : '' }}> J/98 </option>
                                                        <option value="J/99" {{ $h544Data->resGSDiv == 'J/99' ? 'selected' : '' }}> J/99 </option>
                                                        <option value="J/100" {{ $h544Data->resGSDiv == 'J/100' ? 'selected' : '' }}> J/100 </option>
                                                        <option value="J/101" {{ $h544Data->resGSDiv == 'J/101' ? 'selected' : '' }}> J/101 </option>
                                                        <option value="J/102" {{ $h544Data->resGSDiv == 'J/102' ? 'selected' : '' }}> J/102 </option>
                                                        <option value="J/103" {{ $h544Data->resGSDiv == 'J/103' ? 'selected' : '' }}> J/103 </option>
                                                        <option value="J/104" {{ $h544Data->resGSDiv == 'J/104' ? 'selected' : '' }}> J/104 </option>
                                                        <option value="J/105" {{ $h544Data->resGSDiv == 'J/105' ? 'selected' : '' }}> J/105 </option>
                                                        <option value="J/106" {{ $h544Data->resGSDiv == 'J/106' ? 'selected' : '' }}> J/106 </option>
                                                        <option value="J/107" {{ $h544Data->resGSDiv == 'J/107' ? 'selected' : '' }}> J/107 </option>
                                                        <option value="J/108" {{ $h544Data->resGSDiv == 'J/108' ? 'selected' : '' }}> J/108 </option>
                                                        <option value="J/109" {{ $h544Data->resGSDiv == 'J/109' ? 'selected' : '' }}> J/109 </option>
                                                        <option value="MN/1" {{ $h544Data->resGSDiv == 'MN/1' ? 'selected' : '' }}> MN/1 </option>
                                                        <option value="MN/2" {{ $h544Data->resGSDiv == 'MN/2' ? 'selected' : '' }}> MN/2 </option>
                                                        <option value="MN/3" {{ $h544Data->resGSDiv == 'MN/3' ? 'selected' : '' }}> MN/3 </option>
                                                        <option value="MN/4" {{ $h544Data->resGSDiv == 'MN/4' ? 'selected' : '' }}> MN/4 </option>
                                                        <option value="MN/5" {{ $h544Data->resGSDiv == 'MN/5' ? 'selected' : '' }}> MN/5 </option>
                                                        <option value="MN/37" {{ $h544Data->resGSDiv == 'MN/37' ? 'selected' : '' }}> MN/37 </option>
                                                        <option value="MN/38" {{ $h544Data->resGSDiv == 'MN/38' ? 'selected' : '' }}> MN/38 </option>
                                                        <option value="MN/39" {{ $h544Data->resGSDiv == 'MN/39' ? 'selected' : '' }}> MN/39 </option>
                                                        <option value="MN/40" {{ $h544Data->resGSDiv == 'MN/40' ? 'selected' : '' }}> MN/40 </option>
                                                        <option value="MN/41" {{ $h544Data->resGSDiv == 'MN/41' ? 'selected' : '' }}> MN/41 </option>
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
                                                        <option value="J/61" {{ $h544Data->curGSDiv == 'J/61' ? 'selected' : '' }}> J/61 </option>
                                                        <option value="J/62" {{ $h544Data->curGSDiv == 'J/62' ? 'selected' : '' }}> J/62 </option>
                                                        <option value="J/63" {{ $h544Data->curGSDiv == 'J/63' ? 'selected' : '' }}> J/63 </option>
                                                        <option value="J/64" {{ $h544Data->curGSDiv == 'J/64' ? 'selected' : '' }}> J/64 </option>
                                                        <option value="J/65" {{ $h544Data->curGSDiv == 'J/65' ? 'selected' : '' }}> J/65 </option>
                                                        <option value="J/66" {{ $h544Data->curGSDiv == 'J/66' ? 'selected' : '' }}> J/66 </option>
                                                        <option value="J/67" {{ $h544Data->curGSDiv == 'J/67' ? 'selected' : '' }}> J/67 </option>
                                                        <option value="J/68" {{ $h544Data->curGSDiv == 'J/68' ? 'selected' : '' }}> J/68 </option>
                                                        <option value="J/69" {{ $h544Data->curGSDiv == 'J/69' ? 'selected' : '' }}> J/69 </option>
                                                        <option value="J/70" {{ $h544Data->curGSDiv == 'J/70' ? 'selected' : '' }}> J/70 </option>
                                                        <option value="J/71" {{ $h544Data->curGSDiv == 'J/71' ? 'selected' : '' }}> J/71 </option>
                                                        <option value="J/72" {{ $h544Data->curGSDiv == 'J/72' ? 'selected' : '' }}> J/72 </option>
                                                        <option value="J/73" {{ $h544Data->curGSDiv == 'J/73' ? 'selected' : '' }}> J/73 </option>
                                                        <option value="J/74" {{ $h544Data->curGSDiv == 'J/74' ? 'selected' : '' }}> J/74 </option>
                                                        <option value="J/75" {{ $h544Data->curGSDiv == 'J/75' ? 'selected' : '' }}> J/75 </option>
                                                        <option value="J/76" {{ $h544Data->curGSDiv == 'J/76' ? 'selected' : '' }}> J/76 </option>
                                                        <option value="J/77" {{ $h544Data->curGSDiv == 'J/77' ? 'selected' : '' }}> J/77 </option>
                                                        <option value="J/78" {{ $h544Data->curGSDiv == 'J/78' ? 'selected' : '' }}> J/78 </option>
                                                        <option value="J/79" {{ $h544Data->curGSDiv == 'J/79' ? 'selected' : '' }}> J/79 </option>
                                                        <option value="J/80" {{ $h544Data->curGSDiv == 'J/80' ? 'selected' : '' }}> J/80 </option>
                                                        <option value="J/81" {{ $h544Data->curGSDiv == 'J/81' ? 'selected' : '' }}> J/81 </option>
                                                        <option value="J/82" {{ $h544Data->curGSDiv == 'J/82' ? 'selected' : '' }}> J/82 </option>
                                                        <option value="J/83" {{ $h544Data->curGSDiv == 'J/83' ? 'selected' : '' }}> J/83 </option>
                                                        <option value="J/84" {{ $h544Data->curGSDiv == 'J/84' ? 'selected' : '' }}> J/84 </option>
                                                        <option value="J/85" {{ $h544Data->curGSDiv == 'J/85' ? 'selected' : '' }}> J/85 </option>
                                                        <option value="J/86" {{ $h544Data->curGSDiv == 'J/86' ? 'selected' : '' }}> J/86 </option>
                                                        <option value="J/87" {{ $h544Data->curGSDiv == 'J/87' ? 'selected' : '' }}> J/87 </option>
                                                        <option value="J/88" {{ $h544Data->curGSDiv == 'J/88' ? 'selected' : '' }}> J/88 </option>
                                                        <option value="J/91" {{ $h544Data->curGSDiv == 'J/91' ? 'selected' : '' }}> J/91 </option>
                                                        <option value="J/92" {{ $h544Data->curGSDiv == 'J/92' ? 'selected' : '' }}> J/92 </option>
                                                        <option value="J/93" {{ $h544Data->curGSDiv == 'J/93' ? 'selected' : '' }}> J/93 </option>
                                                        <option value="J/94" {{ $h544Data->curGSDiv == 'J/94' ? 'selected' : '' }}> J/94 </option>
                                                        <option value="J/95" {{ $h544Data->curGSDiv == 'J/95' ? 'selected' : '' }}> J/95 </option>
                                                        <option value="J/96" {{ $h544Data->curGSDiv == 'J/96' ? 'selected' : '' }}> J/96 </option>
                                                        <option value="J/97" {{ $h544Data->curGSDiv == 'J/97' ? 'selected' : '' }}> J/97 </option>
                                                        <option value="J/98" {{ $h544Data->curGSDiv == 'J/98' ? 'selected' : '' }}> J/98 </option>
                                                        <option value="J/99" {{ $h544Data->curGSDiv == 'J/99' ? 'selected' : '' }}> J/99 </option>
                                                        <option value="J/100" {{ $h544Data->curGSDiv == 'J/100' ? 'selected' : '' }}> J/100 </option>
                                                        <option value="J/101" {{ $h544Data->curGSDiv == 'J/101' ? 'selected' : '' }}> J/101 </option>
                                                        <option value="J/102" {{ $h544Data->curGSDiv == 'J/102' ? 'selected' : '' }}> J/102 </option>
                                                        <option value="J/103" {{ $h544Data->curGSDiv == 'J/103' ? 'selected' : '' }}> J/103 </option>
                                                        <option value="J/104" {{ $h544Data->curGSDiv == 'J/104' ? 'selected' : '' }}> J/104 </option>
                                                        <option value="J/105" {{ $h544Data->curGSDiv == 'J/105' ? 'selected' : '' }}> J/105 </option>
                                                        <option value="J/106" {{ $h544Data->curGSDiv == 'J/106' ? 'selected' : '' }}> J/106 </option>
                                                        <option value="J/107" {{ $h544Data->curGSDiv == 'J/107' ? 'selected' : '' }}> J/107 </option>
                                                        <option value="J/108" {{ $h544Data->curGSDiv == 'J/108' ? 'selected' : '' }}> J/108 </option>
                                                        <option value="J/109" {{ $h544Data->curGSDiv == 'J/109' ? 'selected' : '' }}> J/109 </option>
                                                        <option value="MN/1" {{ $h544Data->curGSDiv == 'MN/1' ? 'selected' : '' }}> MN/1 </option>
                                                        <option value="MN/2" {{ $h544Data->curGSDiv == 'MN/2' ? 'selected' : '' }}> MN/2 </option>
                                                        <option value="MN/3" {{ $h544Data->curGSDiv == 'MN/3' ? 'selected' : '' }}> MN/3 </option>
                                                        <option value="MN/4" {{ $h544Data->curGSDiv == 'MN/4' ? 'selected' : '' }}> MN/4 </option>
                                                        <option value="MN/5" {{ $h544Data->curGSDiv == 'MN/5' ? 'selected' : '' }}> MN/5 </option>
                                                        <option value="MN/37" {{ $h544Data->curGSDiv == 'MN/37' ? 'selected' : '' }}> MN/37 </option>
                                                        <option value="MN/38" {{ $h544Data->curGSDiv == 'MN/38' ? 'selected' : '' }}> MN/38 </option>
                                                        <option value="MN/39" {{ $h544Data->curGSDiv == 'MN/39' ? 'selected' : '' }}> MN/39 </option>
                                                        <option value="MN/40" {{ $h544Data->curGSDiv == 'MN/40' ? 'selected' : '' }}> MN/40 </option>
                                                        <option value="MN/41" {{ $h544Data->curGSDiv == 'MN/41' ? 'selected' : '' }}> MN/41 </option>
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
                                                    <input type="text" class="form-control{{ $errors->has('resDSDiv') ? ' is-invalid' : '' }}" id="resDSDiv" name="resDSDiv" value="{{ $h544Data->resDSDiv }}" readonly required autofocus>
                                                    <small class="form-text text-muted">DS Division</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curDSDiv" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curDSDiv') ? ' is-invalid' : '' }}" id="curDSDiv" name="curDSDiv" value="{{ $h544Data->curDSDiv }}" readonly required autofocus>
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
                                                    <input type="text" class="form-control{{ $errors->has('resDistrict') ? ' is-invalid' : '' }}" id="resDistrict" name="resDistrict" value="{{ $h544Data->resDistrict }}" readonly required autofocus>
                                                    <small class="form-text text-muted">District</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curDistrict" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curDistrict') ? ' is-invalid' : '' }}" id="curDistrict" name="curDistrict" value="{{ $h544Data->curDistrict }}" readonly required autofocus>
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
                                                    <input type="text" class="form-control{{ $errors->has('resProvince') ? ' is-invalid' : '' }}" id="resProvince" name="resProvince" value="{{ $h544Data->resProvince }}" readonly required autofocus>
                                                    <small id="resProvince" class="form-text text-muted">Province</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curProvince" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curProvince') ? ' is-invalid' : '' }}" id="curProvince" name="curProvince" value="{{ $h544Data->curProvince }}" readonly required autofocus>
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
                                                        <option value="{{ $h544Data->resMOHArea }}" selected>{{ $h544Data->resMOHArea }}</option>  
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
                                                        <option value="{{ $h544Data->curMOHArea }}" selected>{{ $h544Data->curMOHArea }}</option>
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
                                                        <option value="{{ $h544Data->resPHIRange }}" selected>{{ $h544Data->resPHIRange }}</option>
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
                                                        <option value="{{ $h544Data->curPHIRange }}" selected>{{ $h544Data->curPHIRange }}</option>
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
                                                    <input type="text" class="form-control{{ $errors->has('resLandmark') ? ' is-invalid' : '' }}" id="resLandmark" name="resLandmark" value="{{ $h544Data->resLandmark }}" required autofocus onkeyup="fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange)">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="curLandmark" class="col-sm-4 col-form-label">Landmark For Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('curLandmark') ? ' is-invalid' : '' }}" id="curLandmark" name="curLandmark" value="{{ $h544Data->curLandmark }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;"> 
                                            <div class="form-group row">
                                                <label for="phoneMobile" class="col-sm-4 col-form-label">Patient's Phone No (Mobile)</label>
                                                <div class="col-sm-7">
                                                    <input id="phoneMobile" type="tel" class="form-control{{ $errors->has('phoneMobile') ? ' is-invalid' : '' }}"  name="phoneMobile" value="{{ $h544Data->contactNoMobile }}" required autofocus placeholder="##########" maxlength="10">
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="phoneHome" class="col-sm-4 col-form-label">Patient's Phone No (Home)</label>
                                                <div class="col-sm-3">
                                                    <input id="areaCode" type="tel" class="form-control{{ $errors->has('areaCode') ? ' is-invalid' : '' }}"  name="areaCode" value="{{ substr(trim($h544Data->contactNoHome), 0, 3) }}" required autofocus placeholder="###" maxlength="3">
                                                    <small id="areaCode" class="form-text text-muted">Area Code</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input id="phoneNo" type="tel" class="form-control{{ $errors->has('phoneNo') ? ' is-invalid' : '' }}"  name="phoneNo" value="{{ substr(trim($h544Data->contactNoHome), 3, 7) }}" required autofocus placeholder="#######" maxlength="7">
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
                                                    <input type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" id="designation" name="designation" value="{{ $h544Data->designation }}" readonly autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        @if($h544Data->status == 'draft')
                                            <td style="padding-top: 0%; padding-bottom: 0%;">
                                                <div class="form-group row mb-0">
                                                    <div class="offset-md-8">
                                                        <!-- <input class="btn btn-primary" type="button" name="save" value="Save"> -->
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
