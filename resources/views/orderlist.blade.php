@extends('order')

@section('orderlist')
    @if (Auth::check())
        @foreach($user->orders as $order)
            @if (strtotime($order->expire) >= strtotime($days[0]) )
            <div class="col-lg-6"> 
                <div class="panel panel-info">
                    <div class="panel-heading"><strong>{{ $order->menu->name }}</strong></div>
                    <div class="panel-body fixed-panel">
                    <div class="col-lg-8">
                        <ul class="list-unstyled">
                            <li>Cena: {{ $order->menu->price }}€</li>
                            <li>Polievka: {{ $order->menu->soup }} </li>
                            <li>{{ $order->menu->about }}</li>
                            <li>Vyzdvihnut: {{ $order->expire}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-4"> 
                        <form action=" {{ action('PageController@postDelOrder') }} " method="post">
                            @if (strtotime($order->expire) == strtotime($days[0]) )
                                <div>Neda sa odstraniť</div>
                            @else
                                <input class="btn btn-danger btn-mg pull-right" type="submit" value="Odstranit">
                            @endif
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="wallet" value="{{ (double)$user->wallet + (double)$order->menu->price }}">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endif
@stop

