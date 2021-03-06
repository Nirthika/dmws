@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 2%;">
    <br/>
    <div class="row justify-content-center">
        <div class="col-10">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-receivedH411a-tab" data-toggle="tab" href="#nav-receivedH411a" role="tab" aria-controls="nav-receivedH411a" aria-selected="true">Received H411a Forms</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-receivedH411a" role="tabpanel" aria-labelledby="nav-receivedH411a-tab">
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
                                        @foreach ($receivedH411as as $receive)
                                            <tr>
                                                <th scope="row">{{ $receive->h411aRecordId }}</th>
                                                <td>{{ $receive->confirmedDisease }} &nbsp; {{ $receive->confirmationDate }}</td>
                                                <td>
                                                    <a href="{{ url('/h411a/'.$receive->h411aRecordId) }}" class="btn-link" style="text-decoration: none;">View</a>
                                                </td>
                                                <td>{{ $receive->updated_at }}</td>
                                            </tr>
                                        @endforeach
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
