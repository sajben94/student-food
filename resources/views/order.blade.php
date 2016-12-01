@extends('master')

@section('title','Order')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (Auth::check())
                    @yield('orderlist')
                @else
                    <h1>Nemate žiadne objednávky</h1>
                @endif
            </div>
        </div>
    </div>
@stop