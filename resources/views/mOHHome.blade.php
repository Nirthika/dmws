@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2%;">
    <br/>
    <div class="row justify-content-center">
        <div class="col-10">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-newForm-tab" data-toggle="tab" href="#nav-newForm" role="tab" aria-controls="nav-newForm" aria-selected="true">New Forms</a>
                    <a class="nav-item nav-link" id="nav-draftH399-tab" data-toggle="tab" href="#nav-draftH399" role="tab" aria-controls="nav-draftH399" aria-selected="false">Draft H399 Forms</a>
                    <a class="nav-item nav-link" id="nav-sentH399-tab" data-toggle="tab" href="#nav-sentH399" role="tab" aria-controls="nav-sentH399" aria-selected="false">Sent H399 Forms</a>
                    <a class="nav-item nav-link" id="nav-draftH411a-tab" data-toggle="tab" href="#nav-draftH411a" role="tab" aria-controls="nav-draftH411a" aria-selected="false">Draft H411a Forms</a>
                    <a class="nav-item nav-link" id="nav-sentH411a-tab" data-toggle="tab" href="#nav-sentH411a" role="tab" aria-controls="nav-sentH411a" aria-selected="false">Sent H411a Forms</a>
                    <a class="nav-item nav-link" id="nav-receivedH544-tab" data-toggle="tab" href="#nav-receivedH544" role="tab" aria-controls="nav-receivedH544" aria-selected="false">Received H544 Forms</a>
                    <a class="nav-item nav-link" id="nav-receivedH411-tab" data-toggle="tab" href="#nav-receivedH411" role="tab" aria-controls="nav-receivedH411" aria-selected="false">Received H411 Forms</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-newForm" role="tabpanel" aria-labelledby="nav-newForm-tab">
                    <div class="card">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 1%">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Weekly Return of Communicable Diseases (WRCD) form</td>
                                            <td><a href="{{ url('/form/h399') }}" style="text-decoration: none;"><button>H399</button></a></td>                                    
                                        </tr>
                                        <tr>
                                            <td>Communicable Disease Report - Part II</td>
                                            <td><a href="{{ url('/form/h411a') }}" style="text-decoration: none;"><button>H411a</button></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-draftH399" role="tabpanel" aria-labelledby="nav-draftH399-tab">
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
                <div class="tab-pane fade" id="nav-sentH399" role="tabpanel" aria-labelledby="nav-sentH399-tab">
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
                <div class="tab-pane fade" id="nav-draftH411a" role="tabpanel" aria-labelledby="nav-draftH411a-tab">
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
                <div class="tab-pane fade" id="nav-sentH411a" role="tabpanel" aria-labelledby="nav-sentH411a-tab">
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
                <div class="tab-pane fade" id="nav-receivedH544" role="tabpanel" aria-labelledby="nav-receivedH544-tab">
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
                                            <th scope="row">2</th>
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
                <div class="tab-pane fade" id="nav-receivedH411" role="tabpanel" aria-labelledby="nav-receivedH411-tab">
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
