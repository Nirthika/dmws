@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2%;">
    <br/>
    <div class="row justify-content-center">
        <div class="col-10">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-newForm-tab" data-toggle="tab" href="#nav-newForm" role="tab" aria-controls="nav-newForm" aria-selected="true">New Form</a>
                    <a class="nav-item nav-link" id="nav-draftForm-tab" data-toggle="tab" href="#nav-draftForm" role="tab" aria-controls="nav-draftForm" aria-selected="false">Draft Forms</a>
                    <a class="nav-item nav-link" id="nav-sentForm-tab" data-toggle="tab" href="#nav-sentForm" role="tab" aria-controls="nav-sentForm" aria-selected="false">Sent Forms</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-newForm" role="tabpanel" aria-labelledby="nav-newForm-tab">
                    <div class="card">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 1%">
                            <p style="float: left;">Notification of Communicable Disease Form</p>
                            <a href="{{ url('/form/h544') }}" style="text-decoration: none; float: right;"><button>H544</button></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-draftForm" role="tabpanel" aria-labelledby="nav-draftForm-tab">
                    <div class="card">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 1%">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Form</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Send</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td><a href="{{ url('/form/edit/id') }}" style="text-decoration: none;"><button>Edit</button></a></td>
                                            <td><a href="{{ url('/form/send') }}" style="text-decoration: none;"><button>Send</button></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-sentForm" role="tabpanel" aria-labelledby="nav-sentForm-tab">
                    <div class="card">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 1%">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Form</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Date&Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td><a href="{{ url('/form/view/id') }}" style="text-decoration: none;"><button>View</button></a></td>
                                            <td>1997-07-16 &ensp; 19:20+01:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
