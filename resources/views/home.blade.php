@extends('master')

@section('title','Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (Auth::check())
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <h1>Welcome {{ $user->name }}</h1>
                    </div>  
                @else
            <h1>Prihlaste sa</h1>
            @endif
            </div>
        </div>
    </div>
@stop