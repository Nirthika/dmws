@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="padding-top: 2%; padding-bottom: 1%"><h5 style="font-weight: bold">Received H399 Forms</h5></div>
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
                                    <td>1997-07-16 19:20+01:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
