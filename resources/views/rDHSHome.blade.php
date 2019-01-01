@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2%;">
    <br/>
    <div class="row justify-content-center">
        <div class="col-10">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-receivedH544-tab" data-toggle="tab" href="#nav-receivedH544" role="tab" aria-controls="nav-receivedH544" aria-selected="true">Received H399 Forms</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-receivedH544" role="tabpanel" aria-labelledby="nav-receivedH544-tab">
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
