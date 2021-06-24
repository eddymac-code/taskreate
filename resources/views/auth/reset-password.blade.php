@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">Reset your password</h1>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="email">Enter your email</label>
                    <input type="email" id="email" name="email" class="form-control input-sm" 
                    placeholder="Your Email" value="{{ old('email') }}">
                </div>

                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control input-sm"
                     placeholder="Enter New Password">

                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="form-group col-sm-3">
                    <label for="password_confirmation">Repeat the password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                    class="form-control input-sm" placeholder="Repeat Password">

                    @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="token" value="{{ $token }}">

            @error('token')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <br>
            <button class="btn btn-primary col-sm-6" type="submit">Reset Password</button>
        </form>
    </div>
@endsection