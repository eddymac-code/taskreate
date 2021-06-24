@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users\' List') }} <a class="btn btn-primary float-right" 
                        href="{{ route('admin.index') }}">Go Back</a>
                    </div>
    
                    <div class="card-body">
                        @include('inc.messages')
                        @if ($users->count())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                            <tr id="user-id{{ $user->id }}">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    <div class="btn-toolbar">
                                                        <div class="btn-group mr-2">
                                                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">Show Details</a>
                                                        </div>
                                                        <div class="btn-group mr-2">
                                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" 
                                                                onclick="deleteUser({{ $user->id }})">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>There are no users in the database yet</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create New User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteUser(id)
    {
        if(confirm('Do you really want to delete this user?'))
        {
            $.ajax({
                url :'users/'+id,
                type : DELETE,
                data : {
                    _token : $("input[name=token]").val()
                },
                success : function(response)
                {
                    $("#user-id"+id).remove();
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