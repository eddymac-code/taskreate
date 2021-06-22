@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Hello, Welcome Admin!') }}</div>
    
                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <h1 class="display">This is the Admin page</h1>
                            <p class="lead">Manage everything from here</p>
                            <p>            
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                                    {{ __('Manage Users') }}
                                </a>
                            
                                <a href="{{ route('admin.tasks.index') }}" class="btn btn-primary">
                                    {{ __('Manage Tasks') }}
                                </a>                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection