@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User\'s Details') }} <a class="btn btn-primary float-right" 
                        href="{{ route('admin.users.index') }}">Go Back</a>
                    </div>
    
                    <div class="card-body">
                        <p class="lead">These are the details for user {{ $user->name }}</p>
                        <ul class="list-group">
                            <li class="list-group-item">Gender: {{ $user->gender }}</li>
                            <li class="list-group-item">Birthday: {{ $user->birthday }}</li>
                            <li class="list-group-item">Phone: {{ $user->phone }}</li>
                            <li class="list-group-item">Email: {{ $user->email }}</li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection