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
                            <p style="float: left;">Weekly Return of Communicable Diseases (WRCD) form</p>
                            <a href="{{ url('/form/h399') }}" style="text-decoration: none; float: right;"><button class="btn btn-primary">H399</button></a>
                            <br/><br/>
                            <p style="float: left;">Communicable Disease Report - Part II</p>
                            <a href="{{ url('/form/h411a') }}" style="text-decoration: none; float: right;"><button class="btn btn-primary">H411a</button></a>
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
                                            <th scope="col">Date&Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td>
                                                <a href="" class="btn-link" style="text-decoration: none;">Edit</a>
                                            </td>
                                            <td>1997-07-16 &ensp; 19:20+01:00</td>
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
                                            <th scope="col">Delete for Everyone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td>
                                                <a href="" class="btn-link" style="text-decoration: none;">View</a>
                                            </td>
                                            <td>1997-07-16 &ensp; 19:20+01:00</td>
                                            <td>
                                                <form method="POST" action="">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-link" type="submit">Delete</button>
                                                </form>
                                            </td>
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
                                            <th scope="col">Date&Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td>
                                                <a href="" class="btn-link" style="text-decoration: none;">Edit</a>
                                            </td>
                                            <td>1997-07-16 &ensp; 19:20+01:00</td>
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
                                            <th scope="col">Delete for Everyone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td>
                                                <a href="" class="btn-link" style="text-decoration: none;">View</a>
                                            </td>
                                            <td>1997-07-16 &ensp; 19:20+01:00</td>
                                            <td>
                                                <form method="POST" action="">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-link" type="submit">Delete</button>
                                                </form>
                                            </td>
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
                                            <th scope="row">1</th>
                                            <td>Jerry Yang David Filo Mark Antony</td>
                                            <td>
                                                <a href="" class="btn-link" style="text-decoration: none;">View</a>
                                            </td>
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
                                            <td>
                                                <a href="" class="btn-link" style="text-decoration: none;">View</a>
                                            </td>
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
