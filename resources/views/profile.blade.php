@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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

<div class="container" style="margin-top: 1.5%">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card" style="padding: 1%; background-color: #cce6ff;">
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">
                        <!-- <img src="/uploads/avatars/{{ $user->avatar }}" style="border-radius:5%;"><br/><br/> -->

                        <div class="card" style="border-radius:3%;">
                            <img class="card-img-top" src="/uploads/avatars/{{ $user->avatar }}" style="border-top-right-radius:3%; border-top-left-radius: 3%;">
                            <div class="card-body" style="padding: 1.5%;">
                                <h3 class="card-title">{{ $user->name }}</h3>
                                {{ $user->userType }}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i style="color: #005ce6;">{{ $user->email }}</i></li>
                            </ul>
                            <div class="card-body" style="padding: 1.5%;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editUser">Edit</button>

                                <!-- Modal -->
                                <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form enctype="multipart/form-data" action="/profile/{{ $user->id }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalCenterTitle">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">  
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label" style="float: left;">Username:</label>
                                                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="col-form-label" style="float: left;">E-Mail Address:</label>
                                                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="form-group">
                                                        <label for="avatar" class="col-form-label" style="float: left;">Profile Photo:</label>
                                                        <input type="file" class="form-control" name="avatar" id="avatar" aria-describedby="fileHelp">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" value="Save changes" name="editUserDetails" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changePassword">Change Password</button>

                                <!-- Modal -->
                                <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form enctype="multipart/form-data" action="/profile/{{ $user->id }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="changePasswordModalCenterTitle">Change Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="form-group">
                                                        <label for="currentPassword" class="col-form-label" style="float: left;">Current Password:</label>
                                                        <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newPassword" class="col-form-label" style="float: left;">New Password:</label>
                                                        <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirmPassword" class="col-form-label" style="float: left;">Confirm Password:</label>
                                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                                                    </div>                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" value="Reset Password" name="resetPassword" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($user->status == 'yes')
                        <div class="col-md-9">
                            <div class="card" style="border-radius:1%;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped">
                                            <tbody>
                                                <tr>
                                                    <td style="border-right: 1px solid #dee2e6; width: 35%;"><h5>First Name<h5></td>
                                                    <td><h5>{{ $firstName }}<h5></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Last Name</h5></td>
                                                    <td><h5>{{ $lastName }}</h5></td>
                                                </tr>                                            
                                                <tr>
                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Gender</h5></td>
                                                    <td><h5>{{ $gender }}</h5></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Address</h5></td>
                                                    <td>
                                                        <h5>{{ $addLine1 }}, {{ $addLine2 }}, 
                                                            {{ $district }}, 
                                                            {{ $province }}.
                                                        </h5>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Contact No-Office</h5></td>
                                                    <td><h5>{{ $contactNoOffice }}</h5></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Contact No-Mobile</h5></td>
                                                    <td><h5>{{ $contactNoMobile }}</h5></td>
                                                </tr>
                                                @if ($user->userType == 'Doctor')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Doctor Registration No</h5></td>
                                                        <td><h5>{{ $doctor->doctorRegNo }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Designation</h5></td>
                                                        <td><h5>{{ $doctor->designation }}</h5></td>
                                                    </tr>                                            
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 1</h5></td>
                                                        <td><h5>{{ $doctor->hospital1 }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 2</h5></td>
                                                        <td><h5>{{ $doctor->hospital2 }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 3</h5></td>
                                                        <td><h5>{{ $doctor->hospital3 }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 4</h5></td>
                                                        <td><h5>{{ $doctor->hospital4 }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 5</h5></td>
                                                        <td><h5>{{ $doctor->hospital5 }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Other Hospital</h5></td>
                                                        <td><h5>{{ $doctor->otherHospital }}</h5></td>
                                                    </tr>
                                                @endif
                                                @if ($user->userType == 'PHI')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>PHI Registration No</h5></td>
                                                        <td><h5>{{ $pHI->pHIRegNo }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>PHI Range</h5></td>
                                                        <td><h5>{{ $pHI->pHIRange }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Institute</h5></td>
                                                        <td><h5>{{ $pHI->insName }}</h5></td>
                                                    </tr>
                                                @endif
                                                @if ($user->userType == 'MOH')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>MOH Registration No</h5></td>
                                                        <td><h5>{{ $mOH->mOHRegNo }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>MOH Area</h5></td>
                                                        <td><h5>{{ $mOH->mOHArea }}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Institute</h5></td>
                                                        <td><h5>{{ $mOH->insName }}</h5></td>
                                                    </tr>
                                                @endif
                                                @if ($user->userType == 'RDHS')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>RDHS Division</h5></td>
                                                        <td><h5>{{ $rDHS->rDHSDiv }}</h5></td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Institute</h5></td>
                                                        <td><h5>{{ $rDHS->insName }}</h5></td>
                                                    </tr>
                                                @endif
                                                @if ($user->userType == 'EU')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>EU Division</h5></td>
                                                        <td><h5>{{ $eU->eUDiv }}</h5></td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Institute</h5></td>
                                                        <td><h5>{{ $eU->insName }}</h5></td>
                                                    </tr>
                                                @endif
                                                @if ($user->userType == 'Principal Investigator')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Institute</h5></td>
                                                        <td><h5>{{ $pI->insName }}</h5></td>
                                                    </tr>
                                                @endif
                                                @if ($user->userType == 'Research Assistant')
                                                    <tr>
                                                        <td style="border-right: 1px solid #dee2e6;"><h5>Institute</h5></td>
                                                        <td><h5>{{ $rA->insName }}</h5></td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td></td>
                                                    <td style="float: right;">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editIndividual">Edit</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editIndividual" tabindex="-1" role="dialog" aria-labelledby="editIndividualModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form enctype="multipart/form-data" action="/profile/{{ $user->id }}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editIndividualModalCenterTitle">Edit</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">  
                                                                            <div class="form-group row">
                                                                                <label for="firstName" class="col-md-4 col-form-label">First Name:</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $firstName }}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="lastName" class="col-md-4 col-form-label">Last Name:</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" name="lastName" id="lastName" value="{{ $lastName }}" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="gender" class="col-md-4 col-form-label">Gender:</label>
                                                                                <div class="col-md-8">
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" id="male" name="gender" class="custom-control-input" value="Male" @if($gender == 'Male') checked @endif required>
                                                                                        <label class="custom-control-label" for="male">Male</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" id="female" name="gender" class="custom-control-input" value="Female" @if($gender == 'Female') checked @endif required>
                                                                                        <label class="custom-control-label" for="female">Female</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" id="other" name="gender" class="custom-control-input" value="Other" @if($gender == 'Other') checked @endif required>
                                                                                        <label class="custom-control-label" for="other">Other</label>
                                                                                    </div>
                                                                                </div>      
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="addLine1" class="col-md-4 col-form-label">Personal Address:</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" name="addLine1" id="addLine1" value="{{ $addLine1 }}" required>
                                                                                    <label for="addLine1" class="col-form-label-sm text-md-left">Address Line 1</label>
                                                                                </div>
                                                                                <label for="addLine2" class="col-md-4 col-form-label"></label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" name="addLine2" id="addLine2" value="{{ $addLine2 }}">
                                                                                    <label for="addLine2" class="col-form-label-sm text-md-left">Address Line 2</label>
                                                                                </div>
                                                                                <label for="district" class="col-md-4 col-form-label"></label>
                                                                                <div class="col-md-8">
                                                                                    <select id="district" name="district" class="form-control" required onchange="selectProvince(this,province)">
                                                                                        <option value="Ampara" @if($district === 'Ampara') selected @endif>Ampara</option>
                                                                                        <option value="Anuradhapura" @if($district == 'Anuradhapura') selected @endif>Anuradhapura</option>
                                                                                        <option value="Badulla" @if($district == 'Badulla') selected @endif>Badulla</option>
                                                                                        <option value="Batticaloa" @if($district == 'Batticaloa') selected @endif>Batticaloa</option>
                                                                                        <option value="Colombo" @if($district == 'Colombo') selected @endif>Colombo</option>
                                                                                        <option value="Galle" @if($district == 'Galle') selected @endif>Galle</option>
                                                                                        <option value="Gampaha" @if($district == 'Gampaha') selected @endif>Gampaha</option>
                                                                                        <option value="Hambantota" @if($district == 'Hambantota') selected @endif>Hambantota</option>
                                                                                        <option value="Jaffna" @if($district === 'Jaffna') selected @endif>Jaffna</option>
                                                                                        <option value="Kalutara" @if($district == 'Kalutara') selected @endif>Kalutara</option>
                                                                                        <option value="Kandy" @if($district == 'Kandy') selected @endif>Kandy</option>
                                                                                        <option value="Kegalle" @if($district == 'Kegalle') selected @endif>Kegalle</option>
                                                                                        <option value="Kilinochchi" @if($district == 'Kilinochchi') selected @endif>Kilinochchi</option>
                                                                                        <option value="Kurunegala" @if($district == 'Kurunegala') selected @endif>Kurunegala</option>
                                                                                        <option value="Mannar" @if($district == 'Mannar') selected @endif>Mannar</option>
                                                                                        <option value="Matale" @if($district == 'Matale') selected @endif>Matale</option>
                                                                                        <option value="Matara" @if($district == 'Matara') selected @endif>Matara</option>
                                                                                        <option value="Monaragala" @if($district == 'Monaragala') selected @endif>Monaragala</option>
                                                                                        <option value="Mullaitivu" @if($district == 'Mullaitivu') selected @endif>Mullaitivu</option>
                                                                                        <option value="Nuwara Eliya" @if($district == 'Nuwara Eliya') checked @endif>Nuwara Eliya</option>
                                                                                        <option value="Polonnaruwa" @if($district == 'Polonnaruwa') selected @endif>Polonnaruwa</option>
                                                                                        <option value="Puttalam" @if($district == 'Puttalam') selected @endif>Puttalam</option>
                                                                                        <option value="Ratnapura" @if($district == 'Ratnapura') selected @endif>Ratnapura</option>
                                                                                        <option value="Trincomalee" @if($district == 'Trincomalee') selected @endif>Trincomalee</option>
                                                                                        <option value="Vavuniya" @if($district == 'Vavuniya') selected @endif>Vavuniya</option>
                                                                                    </select>
                                                                                    <label for="district" class="col-form-label-sm text-md-left">District</label>
                                                                                </div>
                                                                                <label for="province" class="col-md-4 col-form-label"></label>
                                                                                <div class="col-md-8">
                                                                                    <input id="province" type="text" class="form-control" name="province" value="{{ $province }}" readonly="true" required>
                                                                                    <label for="province" class="col-form-label-sm text-md-left">Province</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row row">
                                                                                <label for="phoneOffice" class="col-md-4 col-form-label">Contact No-Office:</label>
                                                                                <div class="col-md-8">
                                                                                    <label for="areaCode" class="col-form-label-sm text-md-left">Area Code</label>
                                                                                    <input id="areaCode" type="text" class="form-tel"  name="areaCode" value="{{ substr(trim($contactNoOffice), 0, 3) }}" required placeholder="###" size="3">
                                                                                    &nbsp;
                                                                                    <label for="phoneNo" class="col-form-label-sm text-md-left">Phone Number</label>
                                                                                    <input id="phoneNo" type="text" class="form-tel"  name="phoneNo" value="{{ substr(trim($contactNoOffice), 3, 7) }}" required placeholder="#######" size="6">
                                                                                </div>              
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="phoneMobile" class="col-md-4 col-form-label">Contact No-Mobile:</label>
                                                                                <div class="col-md-8">
                                                                                    <input id="phoneMobile" type="text" class="form-control" name="phoneMobile" value="{{ $contactNoMobile }}" required placeholder="### ### ####">
                                                                                </div>
                                                                            </div>
                                                                            @if ($user->userType == 'Doctor')
                                                                                <div class="form-group row">
                                                                                    <label for="doctorRegNo" class="col-md-4 col-form-label">Doctor Registration No:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="doctorRegNo" id="doctorRegNo" value="{{ $doctor->doctorRegNo }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="designation" class="col-md-4 col-form-label">Designation:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="designation" id="designation" value="{{ $doctor->designation }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" id="idHospital11">
                                                                                    <label for="hospital11" class="col-md-4 col-form-label">Hospital 1</label>
                                                                                    <div class="col-md-8">
                                                                                        <select id="hospital11" name="hospital11" class="form-control" onchange="document.getElementById('idHospital2').style.display = '';">
                                                                                            <option value="Jaffna Teaching Hospital" {{ $doctor->hospital1 == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                                                            <option value="New Yarl Hospital" {{ $doctor->hospital1 == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                                                            <option value="Northern Central Hospitals (pvt)" {{ $doctor->hospital1 == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                                                            <option value="Rakavo Hospital" {{ $doctor->hospital1 == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                                                            <option value="Ruhlins Hospital" {{ $doctor->hospital1 == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                                                            <option value="Sujeeva Hospital" {{ $doctor->hospital1 == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                                                            <option value="Nagaa Medical Centre" {{ $doctor->hospital1 == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                                                            <option value="Sampanthar Modern Clinic" {{ $doctor->hospital1 == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                                                            <option value="Shan's Health Care" {{ $doctor->hospital1 == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                                                            <option value="Divisional Hospital" {{ $doctor->hospital1 == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                                                            <option value="Sunrice Medi Clinic" {{ $doctor->hospital1 == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                                                            <option value="Royal Medical Centre" {{ $doctor->hospital1 == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                                                            <option value="Mangalapathy Siddha Ayurvedic" {{ $doctor->hospital1 == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                                                            <option value="Shanthe Medi Clinic" {{ $doctor->hospital1 == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                                                            <option value="Pillaiyar Medi Clinic" {{ $doctor->hospital1 == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                                                            <option value="Modern New Medi Care Hospital" {{ $doctor->hospital1 == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                                                            <option value="Care &amp; Cure" {{ $doctor->hospital1 == 'Care &amp; Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $doctor->hospital1 == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Dental Surgery" {{ $doctor->hospital1 == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                                                            <option value="Life Care Medi Cilinic" {{ $doctor->hospital1 == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $doctor->hospital1 == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Suharni Hospital" {{ $doctor->hospital1 == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>                                       
                                                                                <!-- <tr>
                                                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 1</h5></td>
                                                                                    <td><h5>{{ $doctor->hospital1 }}</h5></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 2</h5></td>
                                                                                    <td><h5>{{ $doctor->hospital2 }}</h5></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 3</h5></td>
                                                                                    <td><h5>{{ $doctor->hospital3 }}</h5></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 4</h5></td>
                                                                                    <td><h5>{{ $doctor->hospital4 }}</h5></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Hospital 5</h5></td>
                                                                                    <td><h5>{{ $doctor->hospital5 }}</h5></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-right: 1px solid #dee2e6;"><h5>Other Hospital</h5></td>
                                                                                    <td><h5>{{ $doctor->otherHospital }}</h5></td>
                                                                                </tr> -->
                                                                            @endif
                                                                            @if ($user->userType == 'PHI')
                                                                                <div class="form-group row">
                                                                                    <label for="pHIRegNo" class="col-md-4 col-form-label">PHI Registration No:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="pHIRegNo" id="pHIRegNo" value="{{ $pHI->pHIRegNo }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="pHIRange" class="col-md-4 col-form-label">PHI Range:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="pHIRange" id="pHIRange" value="{{ $pHI->pHIRange }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" id="insName">
                                                                                    <label for="insName" class="col-md-4 col-form-label">Institute</label>
                                                                                    <div class="col-md-8">
                                                                                        <select id="insName" name="insName" class="form-control">
                                                                                            <option value="Jaffna Teaching Hospital" {{ $pHI->insName == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                                                            <option value="New Yarl Hospital" {{ $pHI->insName == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                                                            <option value="Northern Central Hospitals (pvt)" {{ $pHI->insName == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                                                            <option value="Rakavo Hospital" {{ $pHI->insName == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                                                            <option value="Ruhlins Hospital" {{ $pHI->insName == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                                                            <option value="Sujeeva Hospital" {{ $pHI->insName == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                                                            <option value="Nagaa Medical Centre" {{ $pHI->insName == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                                                            <option value="Sampanthar Modern Clinic" {{ $pHI->insName == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                                                            <option value="Shan's Health Care" {{ $pHI->insName == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                                                            <option value="Divisional Hospital" {{ $pHI->insName == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                                                            <option value="Sunrice Medi Clinic" {{ $pHI->insName == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                                                            <option value="Royal Medical Centre" {{ $pHI->insName == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                                                            <option value="Mangalapathy Siddha Ayurvedic" {{ $pHI->insName == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                                                            <option value="Shanthe Medi Clinic" {{ $pHI->insName == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                                                            <option value="Pillaiyar Medi Clinic" {{ $pHI->insName == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                                                            <option value="Modern New Medi Care Hospital" {{ $pHI->insName == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                                                            <option value="Care &amp; Cure" {{ $pHI->insName == 'Care &amp; Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $pHI->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Dental Surgery" {{ $pHI->insName == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                                                            <option value="Life Care Medi Cilinic" {{ $pHI->insName == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $pHI->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Suharni Hospital" {{ $pHI->insName == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if ($user->userType == 'MOH')
                                                                                <div class="form-group row">
                                                                                    <label for="mOHRegNo" class="col-md-4 col-form-label">MOH Registration No:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="mOHRegNo" id="mOHRegNo" value="{{ $mOH->mOHRegNo }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="mOHArea" class="col-md-4 col-form-label">MOH Area:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="mOHArea" id="mOHArea" value="{{ $mOH->mOHArea }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" id="insName">
                                                                                    <label for="insName" class="col-md-4 col-form-label">Institute</label>
                                                                                    <div class="col-md-8">
                                                                                        <select id="insName" name="insName" class="form-control">
                                                                                            <option value="Jaffna Teaching Hospital" {{ $mOH->insName == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                                                            <option value="New Yarl Hospital" {{ $mOH->insName == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                                                            <option value="Northern Central Hospitals (pvt)" {{ $mOH->insName == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                                                            <option value="Rakavo Hospital" {{ $mOH->insName == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                                                            <option value="Ruhlins Hospital" {{ $mOH->insName == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                                                            <option value="Sujeeva Hospital" {{ $mOH->insName == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                                                            <option value="Nagaa Medical Centre" {{ $mOH->insName == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                                                            <option value="Sampanthar Modern Clinic" {{ $mOH->insName == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                                                            <option value="Shan's Health Care" {{ $mOH->insName == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                                                            <option value="Divisional Hospital" {{ $mOH->insName == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                                                            <option value="Sunrice Medi Clinic" {{ $mOH->insName == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                                                            <option value="Royal Medical Centre" {{ $mOH->insName == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                                                            <option value="Mangalapathy Siddha Ayurvedic" {{ $mOH->insName == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                                                            <option value="Shanthe Medi Clinic" {{ $mOH->insName == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                                                            <option value="Pillaiyar Medi Clinic" {{ $mOH->insName == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                                                            <option value="Modern New Medi Care Hospital" {{ $mOH->insName == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                                                            <option value="Care &amp; Cure" {{ $mOH->insName == 'Care &amp; Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $mOH->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Dental Surgery" {{ $mOH->insName == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                                                            <option value="Life Care Medi Cilinic" {{ $mOH->insName == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $mOH->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Suharni Hospital" {{ $mOH->insName == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if ($user->userType == 'RDHS')
                                                                                <div class="form-group row">
                                                                                    <label for="rDHSDiv" class="col-md-4 col-form-label">RDHS Division:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="rDHSDiv" id="rDHSDiv" value="{{ $rDHS->rDHSDiv }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" id="insName">
                                                                                    <label for="insName" class="col-md-4 col-form-label">Institute</label>
                                                                                    <div class="col-md-8">
                                                                                        <select id="insName" name="insName" class="form-control">
                                                                                            <option value="Jaffna Teaching Hospital" {{ $rDHS->insName == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                                                            <option value="New Yarl Hospital" {{ $rDHS->insName == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                                                            <option value="Northern Central Hospitals (pvt)" {{ $rDHS->insName == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                                                            <option value="Rakavo Hospital" {{ $rDHS->insName == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                                                            <option value="Ruhlins Hospital" {{ $rDHS->insName == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                                                            <option value="Sujeeva Hospital" {{ $rDHS->insName == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                                                            <option value="Nagaa Medical Centre" {{ $rDHS->insName == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                                                            <option value="Sampanthar Modern Clinic" {{ $rDHS->insName == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                                                            <option value="Shan's Health Care" {{ $rDHS->insName == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                                                            <option value="Divisional Hospital" {{ $rDHS->insName == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                                                            <option value="Sunrice Medi Clinic" {{ $rDHS->insName == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                                                            <option value="Royal Medical Centre" {{ $rDHS->insName == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                                                            <option value="Mangalapathy Siddha Ayurvedic" {{ $rDHS->insName == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                                                            <option value="Shanthe Medi Clinic" {{ $rDHS->insName == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                                                            <option value="Pillaiyar Medi Clinic" {{ $rDHS->insName == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                                                            <option value="Modern New Medi Care Hospital" {{ $rDHS->insName == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                                                            <option value="Care &amp; Cure" {{ $rDHS->insName == 'Care &amp; Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $rDHS->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Dental Surgery" {{ $rDHS->insName == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                                                            <option value="Life Care Medi Cilinic" {{ $rDHS->insName == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $rDHS->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Suharni Hospital" {{ $rDHS->insName == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if ($user->userType == 'EU')
                                                                                <div class="form-group row">
                                                                                    <label for="eUDiv" class="col-md-4 col-form-label">EU Division:</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" name="eUDiv" id="eUDiv" value="{{ $eU->eUDiv }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row" id="insName">
                                                                                    <label for="insName" class="col-md-4 col-form-label">Institute</label>
                                                                                    <div class="col-md-8">
                                                                                        <select id="insName" name="insName" class="form-control">
                                                                                            <option value="Jaffna Teaching Hospital" {{ $eU->insName == 'Jaffna Teaching Hospital' ? 'selected' : '' }}>Jaffna Teaching Hospital</option>
                                                                                            <option value="New Yarl Hospital" {{ $eU->insName == 'New Yarl Hospital' ? 'selected' : '' }}>New Yarl Hospital</option>
                                                                                            <option value="Northern Central Hospitals (pvt)" {{ $eU->insName == 'Northern Central Hospitals (pvt)' ? 'selected' : '' }}>Northern Central Hospitals (pvt)</option>
                                                                                            <option value="Rakavo Hospital" {{ $eU->insName == 'Rakavo Hospital' ? 'selected' : '' }}>Rakavo Hospital</option>
                                                                                            <option value="Ruhlins Hospital" {{ $eU->insName == 'Ruhlins Hospital' ? 'selected' : '' }}>Ruhlins Hospital</option>
                                                                                            <option value="Sujeeva Hospital" {{ $eU->insName == 'Sujeeva Hospital' ? 'selected' : '' }}>Sujeeva Hospital</option>
                                                                                            <option value="Nagaa Medical Centre" {{ $eU->insName == 'Nagaa Medical Centre' ? 'selected' : '' }}>Nagaa Medical Centre</option>
                                                                                            <option value="Sampanthar Modern Clinic" {{ $eU->insName == 'Sampanthar Modern Clinic' ? 'selected' : '' }}>Sampanthar Modern Clinic</option>
                                                                                            <option value="Shan's Health Care" {{ $eU->insName == "Shan's Health Care" ? 'selected' : '' }}>Shan's Health Care</option>
                                                                                            <option value="Divisional Hospital" {{ $eU->insName == 'Divisional Hospital' ? 'selected' : '' }}>Divisional Hospital</option>
                                                                                            <option value="Sunrice Medi Clinic" {{ $eU->insName == 'Sunrice Medi Clinic' ? 'selected' : '' }}>Sunrice Medi Clinic</option>
                                                                                            <option value="Royal Medical Centre" {{ $eU->insName == 'Royal Medical Centre' ? 'selected' : '' }}>Royal Medical Centre</option>
                                                                                            <option value="Mangalapathy Siddha Ayurvedic" {{ $eU->insName == 'Mangalapathy Siddha Ayurvedic' ? 'selected' : '' }}>Mangalapathy Siddha Ayurvedic</option>
                                                                                            <option value="Shanthe Medi Clinic" {{ $eU->insName == 'Shanthe Medi Clinic' ? 'selected' : '' }}>Shanthe Medi Clinic</option>
                                                                                            <option value="Pillaiyar Medi Clinic" {{ $eU->insName == 'Pillaiyar Medi Clinic' ? 'selected' : '' }}>Pillaiyar Medi Clinic</option>
                                                                                            <option value="Modern New Medi Care Hospital" {{ $eU->insName == 'Modern New Medi Care Hospital' ? 'selected' : '' }}>Modern New Medi Care Hospital</option>
                                                                                            <option value="Care &amp; Cure" {{ $eU->insName == 'Care &amp; Cure' ? 'selected' : '' }}>Care &amp; Cure</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $eU->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Dental Surgery" {{ $eU->insName == 'Dental Surgery' ? 'selected' : '' }}>Dental Surgery</option>
                                                                                            <option value="Life Care Medi Cilinic" {{ $eU->insName == 'Life Care Medi Cilinic' ? 'selected' : '' }}>Life Care Medi Cilinic</option>
                                                                                            <option value="Renny Dental &amp; Optical Service" {{ $eU->insName == 'Renny Dental &amp; Optical Service' ? 'selected' : '' }}>Renny Dental &amp; Optical Service</option>
                                                                                            <option value="Suharni Hospital" {{ $eU->insName == 'Suharni Hospital' ? 'selected' : '' }}>Suharni Hospital</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if ($user->userType == 'Principal Investigator')
                                                                                <div class="form-group row" id="insName">
                                                                                    <label for="insName" class="col-md-4 col-form-label">Institute</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control{{ $errors->has('insName') ? ' is-invalid' : '' }}" id="insName" name="insName" value="{{ $pI->insName }}" readonly autofocus>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if ($user->userType == 'Research Assistant')
                                                                                <div class="form-group row" id="insName">
                                                                                    <label for="insName" class="col-md-4 col-form-label">Institute</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control{{ $errors->has('insName') ? ' is-invalid' : '' }}" id="insName" name="insName" value="{{ $rA->insName }}" readonly autofocus>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <input type="submit" value="Save changes" name="editDetails" class="btn btn-primary">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
