@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../mOHHome" style="text-decoration: none;">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">H399</li>
    </ol>
</nav>

<div class="container" style="margin-top: 3%">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h5>WEEKLY RETURN OF COMMUNICABLE DISEASES</h5><hr/>
                    <h6>DEPARTMENT OF HEALTH SERVICES</h6>
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
                    <form method="POST" action="/h544">
                        <h6><i><b>Part I - Cases notified during the week</b></i></h6>
                        <br/>
                        @csrf
                        <!-- <div class="table-responsive"> -->
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                            <div class="form-group row">
                                                <label for="weekEnding" class="col-sm-4 col-form-label">Week Ending</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control{{ $errors->has('weekEnding') ? ' is-invalid' : '' }}" id="weekEnding" name="weekEnding" value="{{ old('weekEnding') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-bottom: 0%; width: 50%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="province" class="col-sm-4 col-form-label">Province</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" id="province" name="province" value="{{ old('province') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="district" class="col-sm-4 col-form-label">District</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" id="district" name="district" value="{{ old('district') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="rDHSDiv" class="col-sm-4 col-form-label">R.D.H.S Division</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('rDHSDiv') ? ' is-invalid' : '' }}" id="rDHSDiv" name="rDHSDiv" value="{{ old('rDHSDiv') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-top: 0%; padding-bottom: 0%;">
                                            <div class="form-group row">
                                                <label for="mOHArea" class="col-sm-4 col-form-label">M.O.H Area</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control{{ $errors->has('mOHArea') ? ' is-invalid' : '' }}" id="mOHArea" name="mOHArea" value="{{ old('mOHArea') }}" required autofocus>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <!-- </div> -->
                        <h6><i><b>Part I I - Weekly Summary</b></i></h6>
                        <br/>
                        <h6>PHI Area Vs Diseases</h6>
                        <div class="table-responsive" style="margin-right: 10%;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Internationally Notifiable Diseases(Cholera, Plague, Yellow Fever)</th>
                                        <th scope="col">Polio Myelitis / Acute Flaccid Paralysis</th>
                                        <th scope="col">Chicken Pox</th>
                                        <th scope="col">Dengue Fever/ Dengue Hemorrhagic Fever</th>
                                        <th scope="col">Diphtheria</th>
                                        <th scope="col">Dysentery</th>
                                        <th scope="col">Encephalitis (including Japanese Encephalitis)</th>
                                        <th scope="col">Enteric Fever</th>
                                        <th scope="col">Food Poisoning</th>
                                        <th scope="col">Human Rabies</th>
                                        <th scope="col">Leptospirosis</th>
                                        <th scope="col">Malaria</th>
                                        <th scope="col">Measles</th>
                                        <th scope="col">Meningitis</th>
                                        <th scope="col">Mumps</th>
                                        <th scope="col">Rubella</th>
                                        <th scope="col">Congenital Rubella Syndrome</th>
                                        <th scope="col">Simple continued fever</th>
                                        <th scope="col">Tetanus</th>
                                        <th scope="col">Neonatal tetanus</th>
                                        <th scope="col">Typhus Fever</th>
                                        <th scope="col">Viral Hepatitis</th>
                                        <th scope="col">Whooping cough</th>
                                        <th scope="col">Tuberculosis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">New cases notified during the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cases informed earlier and awaiting investigation at beginning of the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cases decided as untraceable during the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cases decided as belonging to other MOH areas during the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cases confirmed as a non-notifiable disease during the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cases confirmed as a notifiable disease during the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cases awaiting investigation at the end of the week</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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