@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script type="text/javascript">
    function confirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x) return true;
        else return false;
    }    
</script>

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
                            <p style="float: left;">Communicable Disease Report - Part I</p>
                            <a href="{{ url('/form/h411') }}" style="text-decoration: none; float: right;"><button class="btn btn-primary">H411</button></a>
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
                                            <th scope="col">Date&Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($draftH411s as $draft)
                                            <tr>
                                                <th scope="row">{{ $draft->h411RecordId }}</th>
                                                <td>{{ $draft->firstName }} &nbsp; {{ $draft->lastName }}</td>
                                                <td>
                                                    <a href="{{ url('h411/'.$draft->h411RecordId.'/edit') }}" class="btn-link" style="text-decoration: none;">Edit</a>
                                                </td>
                                                <td>{{ $draft->updated_at }}</td>
                                            </tr>
                                        @endforeach 
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
                                            <th scope="col">Delete for Everyone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sentH411s as $sent)
                                            <tr>
                                                <th scope="row">{{ $sent->h411RecordId }}</th>
                                                <td>{{ $sent->firstName }} &nbsp; {{ $sent->lastName }}</td>
                                                <td>
                                                    <a href="{{ url('/h411/'.$sent->h411RecordId) }}" class="btn-link" style="text-decoration: none;">View</a>
                                                </td>
                                                <td>{{ $sent->updated_at }}</td>
                                                <td>
                                                    <form method="POST" action="/h411/{{ $sent->h411RecordId }}" onsubmit="return confirmDelete()">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-link" type="submit">Delete</button>
                                                    </form>
                                                </td>
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
