@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Task') }} <a class="btn btn-primary float-right" 
                        href="{{ route('tasks.index') }}">Go Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" 
                                    name="description" rows="5" required autofocus>{{ $task->description }}</textarea>
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Time') }}</label>
    
                                <div class="col-md-6">
                                    <input id="start_time" type="date" class="form-control @error('start_time') is-invalid @enderror"
                                     name="start_time" value="{{ $task->start_time }}" required autofocus>
    
                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('End Time') }}</label>
    
                                <div class="col-md-6">
                                    <input id="end_time" type="date" class="form-control @error('end_time') is-invalid @enderror"
                                     name="end_time" value="{{ $task->end_time }}" required autofocus>
    
                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="completed" class="col-md-4 col-form-label text-md-right">{{ __('Task Completed?') }}</label>
    
                                <div class="col-md-6">
                                    <select class="form-control" id="completed" name="completed" required autofocus>
                                        <option value="">--Select--</option>                        
                                        <option value="yes" @if ($task->completed == 'yes') selected="selected" @endif>Yes</option>
                                        <option value="no" @if ($task->completed == 'no') selected="selected" @endif>No</option>
                                    </select>
    
                                    @error('completed')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Task') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection