@extends('layouts.usermanager')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Hello, Welcome User Manager!') }}</div>
    
                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <h1 class="display">This is the User Management page</h1>
                            <p class="lead">Manage users from here</p>
                            <p>            
                                <a href="{{ route('usermanager.users.index') }}" class="btn btn-primary">
                                    {{ __('Manage Users') }}
                                </a>                               
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection