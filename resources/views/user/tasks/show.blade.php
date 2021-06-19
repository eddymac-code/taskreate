@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tasks') }} <a class="btn btn-primary float-right" 
                        href="{{ route('tasks.index') }}">Go Back</a>
                    </div>
    
                    <div class="card-body">
                        @include('inc.messages')
                        @if ($tasks->count())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th scope="col">Completed</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        @if($task->ownedBy(auth()->user()))
                                            <tr id="task-id{{ $task->id }}">
                                                <td>{{ $task->description }}</td>
                                                <td>{{ $task->start_time }}</td>
                                                <td>{{ $task->end_time }}</td>
                                                <td>{{ $task->completed}}</td>
                                                <td>
                                                    <div class="btn-toolbar">
                                                        <div class="btn-group mr-2">
                                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" 
                                                                onclick="deleteTask({{ $task->id }})">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have not registered any tasks</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteTask(id)
    {
        if(confirm('Do you really want to delete this task?'))
        {
            $.ajax({
                url :'tasks/'+id,
                type : DELETE,
                data : {
                    _token : $("input[name=token]").val()
                },
                success : function(response)
                {
                    $("#task-id"+id).remove();
                }
            });
        }
    }
</script>