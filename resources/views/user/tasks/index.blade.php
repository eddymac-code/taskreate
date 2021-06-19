@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Hello, Welcome!') }}</div>
    
                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <h1 class="display">This is the user tasks page</h1>
                            <p class="lead">Manage your tasks from here</p>
                            <p>            
                                <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                                    {{ __('Create new Task') }}
                                </a>
                            
                                <a href="{{ route('tasks.show') }}" class="btn btn-primary">
                                    {{ __('View your Tasks') }}
                                </a>                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection