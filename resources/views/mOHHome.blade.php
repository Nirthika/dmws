@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
                                        @foreach ($draftH399s as $draft)
                                            <tr>
                                                <th scope="row">{{ $draft->h399RecordId }}</th>
                                                <td>Week End Date &nbsp; {{ $draft->weekEndDate }}</td>
                                                <td>
                                                    <a href="{{ url('h399/'.$draft->h399RecordId.'/edit') }}" class="btn-link" style="text-decoration: none;">Edit</a>
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
                                        @foreach ($sentH399s as $sent)
                                            <tr>
                                                <th scope="row">{{ $sent->h399RecordId }}</th>
                                                <td>Week End Date &nbsp; {{ $sent->weekEndDate }}</td>
                                                <td>
                                                    <a href="{{ url('/h399/'.$sent->h399RecordId) }}" class="btn-link" style="text-decoration: none;">View</a>
                                                </td>
                                                <td>{{ $sent->updated_at }}</td>
                                                <td>
                                                    <form method="POST" action="/h399/{{ $sent->h399RecordId }}">
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
                                        @foreach ($draftH411as as $draft)
                                            <tr>
                                                <th scope="row">{{ $draft->h411aRecordId }}</th>
                                                <td>{{ $draft->confirmedDisease }} &nbsp; {{ $draft->confirmationDate }}</td>
                                                <td>
                                                    <a href="{{ url('h411a/'.$draft->h411aRecordId.'/edit') }}" class="btn-link" style="text-decoration: none;">Edit</a>
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
                                        @foreach ($sentH411as as $sent)
                                            <tr>
                                                <th scope="row">{{ $sent->h411aRecordId }}</th>
                                                <td>{{ $sent->confirmedDisease }} &nbsp; {{ $sent->confirmationDate }}</td>
                                                <td>
                                                    <a href="{{ url('/h411a/'.$sent->h411aRecordId) }}" class="btn-link" style="text-decoration: none;">View</a>
                                                </td>
                                                <td>{{ $sent->updated_at }}</td>
                                                <td>
                                                    <form method="POST" action="/h411a/{{ $sent->h411aRecordId }}">
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
                                        @foreach ($receivedH544s as $receive)
                                            @if ($receive->curMOHArea == $mOHArea)
                                                <tr>
                                                    <th scope="row">{{ $receive->id }}</th>
                                                    <td>{{ $receive->firstName }} &nbsp; {{ $receive->lastName }}</td>
                                                    <td>
                                                        <a href="{{ url('/h544/'.$receive->id) }}" class="btn-link" style="text-decoration: none;">View</a>
                                                    </td>
                                                    <td>{{ $receive->updated_at }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
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
                                        @foreach ($receivedH411s as $receive)
                                            <tr>
                                                <th scope="row">{{ $receive->h411RecordId }}</th>
                                                <td>{{ $receive->firstName }} &nbsp; {{ $receive->lastName }}</td>
                                                <td>
                                                    <a href="{{ url('/h411/'.$receive->h411RecordId) }}" class="btn-link" style="text-decoration: none;">View</a>
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
