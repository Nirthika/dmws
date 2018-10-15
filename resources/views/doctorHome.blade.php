@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2%;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="padding-top: 2%; padding-bottom: 1%"><h5 style="font-weight: bold"> New Form</h5></div>
                <div class="card-body" style="padding-top: 2%; padding-bottom: 1%">
                    <p style="float: left;">Notification of Communicable Disease Form</p>
                    <a href="{{ url('/form/h544') }}" style="text-decoration: none; float: right;"><button>H544</button></a>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row justify-content-center" style="margin: auto;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="padding-top: 2%; padding-bottom: 1%"><h5 style="font-weight: bold">Draft Forms</h5></div>
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="padding-top: 2%; padding-bottom: 1%"><h5 style="font-weight: bold">Sent Forms</h5></div>
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
                                    <td>1997-07-16<br/>19:20+01:00</td>
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
