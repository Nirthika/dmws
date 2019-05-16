@extends('layouts.app')

@section('content')
<script type="text/javascript">
    window.onload = myAlert;
    function myAlert(){
        for ($j = 1; $j < 26; $j++) {
            $total = 0;
            for ($i = 1; $i <= "{{ count($pHIRanges) }}"; $i++) {
                $total += parseInt(document.getElementById('numR'+$i+'C'+$j).value);
            }
            document.getElementById('total'+$j).value = $total;
        }
        if("{{ $h399Data->status }}" === "sent"){
            var form = document.getElementById("h399Edit");
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
<script src="{{ asset('js/h399.js') }}"></script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($userType == 'RDHS')
            <li class="breadcrumb-item"><a href="../../rDHSHome" style="text-decoration: none;">Home</a></li>
        @elseif ($userType == 'MOH')
            <li class="breadcrumb-item"><a href="../../mOHHome" style="text-decoration: none;">Home</a></li>
        @endif 
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
                    <form id="h399Edit" method="POST" action="/h399/{{ $h399Data->h399RecordId }}" onsubmit="return confSubmit()">
                        <h6><i><b>Part I - Cases notified during the week</b></i></h6>
                        <br/>
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="border-right: 1px solid #dee2e6; padding-bottom: 0%; width: 50%;">
                                        <div class="form-group row">
                                            <label for="weekEndDate" class="col-sm-4 col-form-label">Week Ending</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control{{ $errors->has('weekEndDate') ? ' is-invalid' : '' }}" id="weekEndDate" name="weekEndDate" value="{{ $h399Data->weekEndDate }}" required autofocus>
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
                                                <input type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" id="province" name="province" value="{{ $h399Data->province }}" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding-top: 0%; padding-bottom: 0%;">
                                        <div class="form-group row">
                                            <label for="district" class="col-sm-4 col-form-label">District</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" id="district" name="district" value="{{ $h399Data->district }}" readonly>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #dee2e6; padding-top: 0%; padding-bottom: 0%;">
                                        <div class="form-group row">
                                            <label for="rDHSDiv" class="col-sm-4 col-form-label">R.D.H.S Division</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control{{ $errors->has('rDHSDiv') ? ' is-invalid' : '' }}" id="rDHSDiv" name="rDHSDiv" value="{{ $h399Data->rDHSDiv }}" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding-top: 0%; padding-bottom: 0%;">
                                        <div class="form-group row">
                                            <label for="mOHArea" class="col-sm-4 col-form-label">M.O.H Area</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control{{ $errors->has('mOHArea') ? ' is-invalid' : '' }}" id="mOHArea" name="mOHArea" value="{{ $h399Data->mOHArea }}" readonly>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h6><b>PHI Area Vs Diseases</b></h6>
                        <div class="table-responsive" style="margin-right: 10%;">
                            <table class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                                        <th scope="col">Internationally Notifiable Diseases(Cholera, Plague, Yellow Fever)</th>
                                        <th scope="col">Acute Poliomyelitis / Acute Flaccid Paralysis</th>
                                        <th scope="col">Chicken Pox</th>
                                        <th scope="col">Dengue Fever / Dengue Haemorrhagic Fever</th>
                                        <th scope="col">Diphtheria</th>
                                        <th scope="col">Dysentery</th>
                                        <th scope="col">Encephalitis</th>
                                        <th scope="col">Enteric Fever</th>
                                        <th scope="col">Food Poisoning</th>
                                        <th scope="col">Human Rabies</th>
                                        <th scope="col">Leishmaniasis</th>
                                        <th scope="col">Leprosy</th>
                                        <th scope="col">Leptospirosis</th>
                                        <th scope="col">Malaria</th>
                                        <th scope="col">Measles</th>
                                        <th scope="col">Meningitis</th>
                                        <th scope="col">Mumps</th>
                                        <th scope="col">Neonatal Tetanus</th>
                                        <th scope="col">Rubella / Congenital Rubella Syndrom</th>
                                        <th scope="col">Simple Continued Fever of over 7 days or more</th>
                                        <th scope="col">Tetanus</th>
                                        <th scope="col">Tuberculosis</th>
                                        <th scope="col">Typhus Fever</th>
                                        <th scope="col">Viral Hepatitis</th>
                                        <th scope="col">Whooping Cough</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $headerDiseases = ['Internationally Notifiable Diseases', 'Acute Poliomyelitis / Acute Flaccid Paralysis', 'Chicken Pox', 'Dengue Fever / Dengue Haemorrhagic Fever', 'Diphtheria', 'Dysentery', 'Encephalitis', 'Enteric Fever', 'Food Poisoning', 'Human Rabies', 'Leishmaniasis', 'Leprosy', 'Leptospirosis', 'Malaria', 'Measles', 'Meningitis', 'Mumps', 'Neonatal Tetanus', 'Rubella / Congenital Rubella Syndrom', 'Simple Continued Fever of over 7 days or more', 'Tetanus', 'Tuberculosis', 'Typhus Fever', 'Viral Hepatitis', 'Whooping Cough']; 
                                ?>                                
                                @for ($i = 0; $i < count($pHIRanges); $i++)
                                    <tr>
                                        <th scope="row">
                                            <input type="text" class="form-control" id="{{ $pHIRanges[$i]->pHIRange }}" name="{{ $pHIRanges[$i]->pHIRange }}" value="{{ $pHIRanges[$i]->pHIRange }}" readonly>                                 
                                        </th>
                                        @for ($j = 0; $j < 25; $j++)
                                            <?php 
                                                $x = 'numR'.($i+1).'C'.($j+1); 
                                                $count = 0;
                                            ?>

                                            @for ($k = 0; $k < count($diseaseData); $k++)
                                                @if (($diseaseData[$k]->curPHIRange) == ($pHIRanges[$i]->pHIRange))
                                                    @if ($j == 0)
                                                        @if (($diseaseData[$k]->diseaseName) == 'Cholera' || ($diseaseData[$k]->diseaseName) == 'Plague' || ($diseaseData[$k]->diseaseName) == 'Yellow Fever')
                                                            <?php $count++; ?>
                                                        @endif
                                                    @else 
                                                        @if (($diseaseData[$k]->diseaseName) == $headerDiseases[$j])
                                                            <?php $count++; ?>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endfor

                                            <td style="vertical-align: middle;">
                                                <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" value="{{ $count }}" style="width: 80px;" readonly>
                                            </td>
                                        @endfor
                                    </tr>
                                @endfor
                                    <tr>
                                        <th scope="row">Total</th>
                                        @for ($j = 1; $j < 26; $j++)
                                            <?php $x = 'total'.$j; ?>
                                            <td style="vertical-align: middle;">
                                                <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" style="width: 80px; font-weight: bold;" readonly>
                                            </td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <h6><i><b>Part II - Weekly Summary</b></i></h6>
                        <br/>
                        <div class="table-responsive" style="margin-right: 10%;">                      
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Internationally Notifiable Diseases(Cholera, Plague, Yellow Fever)</th>
                                        <th scope="col">Acute Poliomyelitis / Acute Flaccid Paralysis</th>
                                        <th scope="col">Chicken Pox</th>
                                        <th scope="col">Dengue Fever / Dengue Haemorrhagic Fever</th>
                                        <th scope="col">Diphtheria</th>
                                        <th scope="col">Dysentery</th>
                                        <th scope="col">Encephalitis</th>
                                        <th scope="col">Enteric Fever</th>
                                        <th scope="col">Food Poisoning</th>
                                        <th scope="col">Human Rabies</th>
                                        <th scope="col">Leishmaniasis</th>
                                        <th scope="col">Leprosy</th>
                                        <th scope="col">Leptospirosis</th>
                                        <th scope="col">Malaria</th>
                                        <th scope="col">Measles</th>
                                        <th scope="col">Meningitis</th>
                                        <th scope="col">Mumps</th>
                                        <th scope="col">Neonatal Tetanus</th>
                                        <th scope="col">Rubella / Congenital Rubella Syndrom</th>
                                        <th scope="col">Simple Continued Fever of over 7 days or more</th>
                                        <th scope="col">Tetanus</th>
                                        <th scope="col">Tuberculosis</th>
                                        <th scope="col">Typhus Fever</th>
                                        <th scope="col">Viral Hepatitis</th>
                                        <th scope="col">Whooping cough</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($summaryData as $data)
                                        @if (($data->summary) == 'Cases awaiting investigation at the end of the week') 
                                            <tr>
                                                <th scope="row">Cases awaiting investigation at the end of the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR1C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @elseif (($data->summary) == 'Cases confirmed as a non-notifiable disease during the week') 
                                            <tr>
                                                <th scope="row">Cases confirmed as a non-notifiable disease during the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR2C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @elseif (($data->summary) == 'Cases confirmed as a notifiable disease during the week') 
                                            <tr>
                                                <th scope="row">Cases confirmed as a notifiable disease during the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR3C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @elseif (($data->summary) == 'Cases decided as belonging to other MOH areas during the week') 
                                            <tr>
                                                <th scope="row">Cases decided as belonging to other MOH areas during the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR4C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @elseif (($data->summary) == 'Cases decided as untraceable during the week') 
                                            <tr>
                                                <th scope="row">Cases decided as untraceable during the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR5C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @elseif (($data->summary) == 'Cases informed earlier and awaiting investigation at beginning of the week') 
                                            <tr>
                                                <th scope="row">Cases informed earlier and awaiting investigation at beginning of the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR6C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @elseif (($data->summary) == 'New cases notified during the week') 
                                            <tr>
                                                <th scope="row">New cases notified during the week</th>
                                                @for ($i = 1; $i < 26; $i++)
                                                    <?php $x = 'countR7C'.$i; $disease = trim($diseases[$i-1]); ?>
                                                    <td style="vertical-align: middle;">
                                                        <input type="number" class="form-control input-sm" id="{{ $x }}" name="{{ $x }}" min="0" value="{{ $data->$disease }}" style="width: 80px;" autofocus oninput="setMin(this);">
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div>
                        <br/>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding-bottom: 0%; width: 50%;"></td>
                                    @if($h399Data->status == 'draft')
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection