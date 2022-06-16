@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="m-3 p-2">
                        <a href="/client" class="btn btn-outline-success">Add Client</a> 
                        <a href="/invoice" class="btn btn-outline-primary">Create New Invoice</a>
                        <a href="/invoice/view" class="btn btn-outline-danger">View All Invoice</a>
                    </div>
                    <div class="p-3">
                        <b>All Clients</b>
                        @foreach($clients as $client)
                            <ul>
                                <li>{{$client->name}} >> <a href="">{{$client->email}}</a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
