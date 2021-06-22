@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Task Details') }} <a class="btn btn-primary float-right" 
                        href="{{ route('admin.tasks.index') }}">Go Back</a>
                    </div>
    
                    <div class="card-body">
                        <p class="lead">These are the details for the task }}</p>
                        <ul class="list-group">
                            <li class="list-group-item">Owned By user ID: {{ $task->user_id }}</li>
                            <li class="list-group-item">Description: {{ $task->description }}</li>
                            <li class="list-group-item">Start-Time: {{ $task->start_time }}</li>
                            <li class="list-group-item">End-Time: {{ $task->end_time }}</li>
                            <li class="list-group-item">Is Task Completed? {{ $task->completed }}</li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection