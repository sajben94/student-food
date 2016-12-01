@extends('master')

@section('title','Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="jumbotron">
                    <h2>Login</h2>
                    <form method="POST" action="/auth/login">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            Email
                            <input type="email" name="email" class="form-control"  value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            Password
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div>
                        <button type="submit" class="btn btn-default" >Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop



