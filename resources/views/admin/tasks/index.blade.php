@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Tasks') }} <a class="btn btn-primary float-right" 
                        href="{{ route('admin.index') }}">Go Back</a>
                    </div>
    
                    <div class="card-body">
                        @include('inc.messages')
                        @if ($tasks->count())
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Owned By (User Id)</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                            <tr id="task-id{{ $task->id }}">
                                                <td>{{ $task->user_id }}</td>
                                                <td>{{ $task->description }}</td>
                                                <td>
                                                    <div class="btn-toolbar">
                                                        <div class="btn-group mr-2">
                                                            <a href="{{ route('admin.tasks.show', $task->id) }}" class="btn btn-primary">Details</a>
                                                        </div>
                                                        <div class="btn-group mr-2">
                                                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" 
                                                                onclick="deleteTask({{ $task->id }})">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have not registered any tasks for any user</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">Create New Task</a>
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
            return false;
        }
        else
        {
            return false;
        }
    }
</script>