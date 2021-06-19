@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Welcome!') }}</div>
    
                    <div class="card-body">
                        <div class="jumbotron">
                            <h1>Welcome to Taskreate!</h1>
                            <p class="lead">Here, you can keep track of your different tasks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection