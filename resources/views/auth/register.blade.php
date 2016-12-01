@extends('master')

@section('title','Register')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="jumbotron">    
                    <h2>Register</h2>
                    <form method="POST" action="/auth/register">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            Name
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            Email
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            Password
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            Confirm Password
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop



