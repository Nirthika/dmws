@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function myAlert(){
        var inp = document.getElementsByTagName('input');
        for (var i = inp.length-1; i>=0; i--) {
            if ('radio'===inp[i].type || 'checkbox'===inp[i].type) inp[i].checked = false;
        }   
        document.getElementById("birthYear").value='';
        document.getElementById("birthDate").value='';
        document.getElementById("age").value=0;
    }
</script>
<script src="{{ asset('js/h411a.js') }}"></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../mOHHome" style="text-decoration: none;">Home</a></li>
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
                    <form method="POST" action="/h411a">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="rDHSDiv" class="col-sm-4 col-form-label">RDHS Division</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('rDHSDiv') ? ' is-invalid' : '' }}" id="rDHSDiv" name="rDHSDiv" value="{{ $rDHSDiv }}" readonly>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="notifiedDisease" class="col-sm-4 col-form-label">Disease as Notified</label>
                                                <div class="col-sm-7">
                                                    <select id="notifiedDisease" name="notifiedDisease" class="form-control{{ $errors->has('notifiedDisease') ? ' is-invalid' : '' }}" value="{{ old('notifiedDisease') }}" required autofocus>
                                                        <option value="" disabled selected>Select a Disease</option>
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
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="mOHArea" class="col-sm-4 col-form-label">MOH Area</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('mOHArea') ? ' is-invalid' : '' }}" id="mOHArea" name="mOHArea" value="{{ $mOHArea }}" readonly autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="notificationDate" class="col-sm-4 col-form-label">Date of Notification</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('notificationDate') ? ' is-invalid' : '' }}" id="notificationDate" name="notificationDate" value="{{ old('notificationDate') }}" required autofocus onchange="setMinConfirmationDate()">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="mOHRegNo" class="col-sm-4 col-form-label">MOH Registration No</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('mOHRegNo') ? ' is-invalid' : '' }}" id="mOHRegNo" name="mOHRegNo" value="{{ $mOHRegNo }}" readonly autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="confirmedDisease" class="col-sm-4 col-form-label">Disease as Confirmed</label>
                                                <div class="col-sm-7">
                                                    <select id="confirmedDisease" name="confirmedDisease" class="form-control{{ $errors->has('confirmedDisease') ? ' is-invalid' : '' }}" value="{{ old('confirmedDisease') }}" required autofocus>
                                                        <option value="" disabled selected>Select a Disease</option>
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
                                                <label for="confirmationDate" class="col-sm-4 col-form-label">Date of Confirmation</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('confirmationDate') ? ' is-invalid' : '' }}" id="confirmationDate" name="confirmationDate" value="{{ old('confirmationDate') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" id="age" name="age" value="{{ old('age') }}" readonly required autofocus>
                                                </div>
                                            </div>

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
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="confirmedBy" class="col-sm-4 col-form-label">Confirmed by</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="hospitalMO" name="confirmedBy" class="custom-control-input{{ $errors->has('hospitalMO') ? ' is-invalid' : '' }}" value="Hospital M.O" required autofocus>
                                                        <label class="custom-control-label" for="hospitalMO">Hospital M.O</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="mOH" name="confirmedBy" class="custom-control-input{{ $errors->has('mOH') ? ' is-invalid' : '' }}" value="M.O.H" required autofocus>
                                                        <label class="custom-control-label" for="mOH">M.O.H</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="otherGovtMO" name="confirmedBy" class="custom-control-input{{ $errors->has('otherGovtMO') ? ' is-invalid' : '' }}" value="Other Govt M.O" required autofocus>
                                                        <label class="custom-control-label" for="otherGovtMO">Other Govt M.O</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="apothecary" name="confirmedBy" class="custom-control-input{{ $errors->has('apothecary') ? ' is-invalid' : '' }}" value="Apothecary" required autofocus>
                                                        <label class="custom-control-label" for="apothecary">Apothecary</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="practitioner" name="confirmedBy" class="custom-control-input{{ $errors->has('practitioner') ? ' is-invalid' : '' }}" value="Practitioner" required autofocus>
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
                                                    <input type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" id="occupation" name="occupation" value="{{ old('occupation') }}" required autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sourceOfNotify" class="col-sm-4 col-form-label">Source of Notification</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="hospital" name="sourceOfNotify" class="custom-control-input{{ $errors->has('hospital') ? ' is-invalid' : '' }}" value="Hospital" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="hospital">Hospital</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dispensary" name="sourceOfNotify" class="custom-control-input{{ $errors->has('dispensary') ? ' is-invalid' : '' }}" value="Dispensary" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="dispensary">Dispensary</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="pHI" name="sourceOfNotify" class="custom-control-input{{ $errors->has('pHI') ? ' is-invalid' : '' }}" value="P.H.I" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="pHI">P.H.I</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="gramaSevaka" name="sourceOfNotify" class="custom-control-input{{ $errors->has('gramaSevaka') ? ' is-invalid' : '' }}" value="Grama Sevaka" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="gramaSevaka">Grama Sevaka</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="schoolTeacher" name="sourceOfNotify" class="custom-control-input{{ $errors->has('schoolTeacher') ? ' is-invalid' : '' }}" value="School Teacher" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="schoolTeacher">School Teacher</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="privatePractitioner" name="sourceOfNotify" class="custom-control-input{{ $errors->has('privatePractitioner') ? ' is-invalid' : '' }}" value="Private Practitioner" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="privatePractitioner">Private Practitioner</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="ayurvedicPhysician" name="sourceOfNotify" class="custom-control-input{{ $errors->has('ayurvedicPhysician') ? ' is-invalid' : '' }}" value="Ayurvedic Physician" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="ayurvedicPhysician">Ayurvedic Physician</label>
                                                    </div> 
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="estateSuperintendent" name="sourceOfNotify" class="custom-control-input{{ $errors->has('estateSuperintendent') ? ' is-invalid' : '' }}" value="Estate Superintendent" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="estateSuperintendent">Estate Superintendent</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="otherSource" name="sourceOfNotify" class="custom-control-input{{ $errors->has('otherSource') ? ' is-invalid' : '' }}" value="Other Source" required autofocus onclick="specifyOtherSource()">
                                                        <label class="custom-control-label" for="otherSource">Other Source</label>
                                                    </div>     
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="natureOfConf" class="col-sm-4 col-form-label">Nature of Confirmation</label>
                                                <div class="col-sm-7">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalOnly" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalOnly') ? ' is-invalid' : '' }}" value="Clinical only" required autofocus>
                                                        <label class="custom-control-label" for="clinicalOnly">Clinical only</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndEpid" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndEpid') ? ' is-invalid' : '' }}" value="Clinical and Epidemiological" required autofocus>
                                                        <label class="custom-control-label" for="clinicalAndEpid">Clinical and Epidemiological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndBact" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndBact') ? ' is-invalid' : '' }}" value="Clinical and Bacteriological" required autofocus>
                                                        <label class="custom-control-label" for="clinicalAndBact">Clinical and Bacteriological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndSero" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndSero') ? ' is-invalid' : '' }}" value="Clinical and Serological" required autofocus>
                                                        <label class="custom-control-label" for="clinicalAndSero">Clinical and Serological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalBactAndSero" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalBactAndSero') ? ' is-invalid' : '' }}" value="Clinical, Bacteriological and Serological" required autofocus>
                                                        <label class="custom-control-label" for="clinicalBactAndSero">Clinical, Bacteriological and Serological</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="clinicalAndDirectMicro" name="natureOfConf" class="custom-control-input{{ $errors->has('clinicalAndDirectMicro') ? ' is-invalid' : '' }}" value="Clinical and direct Microscopy" required autofocus>
                                                        <label class="custom-control-label" for="clinicalAndDirectMicro">Clinical and direct Microscopy</label>
                                                    </div>                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="officeUseOnly" class="col-sm-4 col-form-label">Office Use Only</label>
                                                <div class="col-sm-7">
                                                    <textarea id="officeUseOnly" class="form-control{{ $errors->has('officeUseOnly') ? ' is-invalid' : '' }}" name="officeUseOnly" rows="5" value="{{ old('officeUseOnly') }}" autofocus></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row" id="specifySource" style="display:none">
                                                <label for="specify" class="col-sm-4 col-form-label">Specify</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('specify') ? ' is-invalid' : '' }}" id="specify" name="specify" value="{{ old('specify') }}" autofocus>
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
