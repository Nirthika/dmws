@extends('layouts.app')

@section('content')
<script type="text/javascript"> 
    function selectProvince(id1,id2) {
        switch (id1.value) {
            case 'Jaffna':case 'Kilinochchi':case 'Mannar':case 'Mullaitivu':case 'Vavuniya': id2.value='Northern'; break;
            case 'Puttalam':case 'Kurunegala': id2.value='North Western'; break;
            case 'Gampaha':case 'Colombo':case 'Kalutara': id2.value='Western'; break;
            case 'Anuradhapura':case 'Polonnaruwa': id2.value='North Central'; break;
            case 'Matale':case 'Kandy':case 'Nuwara Eliya': id2.value='Central'; break;
            case 'Kegalle':case 'Ratnapura': id2.value='Sabaragamuwa'; break;
            case 'Trincomalee':case 'Batticaloa':case 'Ampara': id2.value='Eastern'; break;
            case 'Badulla':case 'Monaragala': id2.value='Uva'; break;
            case 'Hambantota':case 'Matara':case 'Galle': id2.value='Southern'; break;
            default: id2.value=''; break;
        }
    }
</script>

<div class="container" style="margin-top: 3%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register-PHI') }}</div>

                <div class="card-body">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    <br>
                    <form method="POST" action="/pHI">
                        @csrf

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                                <!-- @if ($errors->has('firstName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                <!-- @if ($errors->has('lastName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="male" type="radio" class="form-control-sm{{ $errors->has('male') ? ' is-invalid' : '' }}" name="gender" value="Male" required autofocus>&nbsp;
                                <label for="male" class="col-form-label text-md-right">{{ __('Male') }}</label>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <input id="female" type="radio" class="form-control-sm{{ $errors->has('female') ? ' is-invalid' : '' }}" name="gender" value="Female" required autofocus>&nbsp;
                                <label for="female" class="col-form-label text-md-right">{{ __('Female') }}</label>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <input id="other" type="radio" class="form-control-sm{{ $errors->has('other') ? ' is-invalid' : '' }}" name="gender" value="Other" required autofocus>&nbsp;
                                <label for="other" class="col-form-label text-md-right">{{ __('Other') }}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pHIRegNo" class="col-md-4 col-form-label text-md-right">{{ __('PHI Registration No') }}</label>

                            <div class="col-md-6">
                                <input id="pHIRegNo" type="text" class="form-control{{ $errors->has('pHIRegNo') ? ' is-invalid' : '' }}" name="pHIRegNo" value="{{ old('pHIRegNo') }}" required>

                                <!-- @if ($errors->has('pHIRegNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('pHIRegNo') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pHIRange" class="col-md-4 col-form-label text-md-right">{{ __('PHI Range') }}</label>

                            <div class="col-md-6">
                                <input id="pHIRange" type="text" class="form-control{{ $errors->has('pHIRange') ? ' is-invalid' : '' }}" name="pHIRange" value="{{ old('pHIRange') }}" required>

                                <!-- @if ($errors->has('pHIRange'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('pHIRange') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="addLine1" class="col-md-4 col-form-label text-md-right">{{ __('Personal Address') }}</label>

                            <div class="col-md-6">
                                <input id="addLine1" type="text" class="form-control{{ $errors->has('addLine1') ? ' is-invalid' : '' }}" name="addLine1" value="{{ old('addLine1') }}" required>
                                <label for="addLine1" class="col-form-label-sm text-md-left">Address Line 1</label>

                                <!-- @if ($errors->has('addLine1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('addLine1') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="addLine2" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="addLine2" type="text" class="form-control{{ $errors->has('addLine2') ? ' is-invalid' : '' }}" name="addLine2" value="{{ old('addLine2') }}">
                                <label for="addLine2" class="col-form-label-sm text-md-left">Address Line 2</label>

                                <!-- @if ($errors->has('addLine2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('addLine2') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <select id="district" name="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" value="{{ old('district') }}" required autofocus onchange="selectProvince(this,province)">
                                    <option value="" disabled selected>Select a district</option>
                                    <option value="Ampara">Ampara</option>
                                    <option value="Anuradhapura">Anuradhapura</option>
                                    <option value="Badulla">Badulla</option>
                                    <option value="Batticaloa">Batticaloa</option>
                                    <option value="Colombo">Colombo</option>
                                    <option value="Galle">Galle</option>
                                    <option value="Gampaha">Gampaha</option>
                                    <option value="Hambantota">Hambantota</option>
                                    <option value="Jaffna">Jaffna</option>
                                    <option value="Kalutara">Kalutara</option>
                                    <option value="Kandy">Kandy</option>
                                    <option value="Kegalle">Kegalle</option>
                                    <option value="Kilinochchi">Kilinochchi</option>
                                    <option value="Kurunegala">Kurunegala</option>
                                    <option value="Mannar">Mannar</option>
                                    <option value="Matale">Matale</option>
                                    <option value="Matara">Matara</option>
                                    <option value="Monaragala">Monaragala</option>
                                    <option value="Mullaitivu">Mullaitivu</option>
                                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                                    <option value="Polonnaruwa">Polonnaruwa</option>
                                    <option value="Puttalam">Puttalam</option>
                                    <option value="Ratnapura">Ratnapura</option>
                                    <option value="Trincomalee">Trincomalee</option>
                                    <option value="Vavuniya">Vavuniya</option>
                                </select>
                                <label for="district" class="col-form-label-sm text-md-left">District</label>

                                <!-- @if ($errors->has('district'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" value="{{ old('province') }}" readonly="true" required autofocus>
                                <label for="province" class="col-form-label-sm text-md-left">Province</label>

                                <!-- @if ($errors->has('province'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneOffice" class="col-md-4 col-form-label text-md-right">{{ __('Contact No-Office') }}</label>

                            <div class="col-md-6">
                                <label for="areaCode" class="col-form-label-sm text-md-left">Area Code</label>
                                <input id="areaCode" type="text" class="form-tel{{ $errors->has('areaCode') ? ' is-invalid' : '' }}"  name="areaCode" value="{{ old('areaCode') }}" required autofocus placeholder="###" size="3">

                                <!-- @if ($errors->has('areaCode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('areaCode') }}</strong>
                                    </span>
                                @endif -->
                                &nbsp; &nbsp; &nbsp;
                                <label for="phoneNo" class="col-form-label-sm text-md-left">Phone Number</label>
                                <input id="phoneNo" type="text" class="form-tel{{ $errors->has('phoneNo') ? ' is-invalid' : '' }}"  name="phoneNo" value="{{ old('phoneNo') }}" required autofocus placeholder="#######" size="8">
                                
                                <!-- @if ($errors->has('phoneNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneMobile" class="col-md-4 col-form-label text-md-right">{{ __('Contact No-Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="phoneMobile" type="text" class="form-control{{ $errors->has('phoneMobile') ? ' is-invalid' : '' }}"  name="phoneMobile" value="{{ old('phoneMobile') }}" required autofocus placeholder="### ### ####">
                                
                                <!-- @if ($errors->has('phoneMobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phoneMobile') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="insName" class="col-md-4 col-form-label text-md-right">{{ __('Institute') }}</label>

                            <div class="col-md-6">
                                <select id="insName" name="insName" class="form-control{{ $errors->has('insName') ? ' is-invalid' : '' }}" value="{{ old('insName') }}" required autofocus>
                                    <option value="" disabled selected>Select a institute</option>
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
                                    <option value="Renny Dental &amp; Optical Service">Renny Dental &amp; Optical Service</option>
                                    <option value="Suharni Hospital">Suharni Hospital</option>
                                </select>
                                
                                <!-- @if ($errors->has('insName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('insName') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
