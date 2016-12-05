@extends('menu')

@section('meals')
  <div class="col-lg-12">
      <select  id= 'date_picker' name="date" class="selectpicker">
        @foreach ($days as $day)
          <option value="{{ $day }}">{{ $day }} | {{ $week[date("w",strtotime($day))+1] }}</option>
        @endforeach
      </select>
    </form>
  </div>    
  
  @foreach ($menu as $meal)
  <div class="col-lg-6">
    <div class="panel panel-info">
      <div class="panel-heading"><strong>{{ $meal->name }}</strong></div>
      <div class="panel-body fixed-panel" >
        <div class="col-lg-8">
          <ul class="list-unstyled">
            <li>Cena: {{ $meal->price }}€</li>
            <li>Polievka: {{ $meal->soup }} </li>
            <li>{{ $meal->about }}</li>
          </ul>
        </div>
        <div class="col-lg-4">
          @if (Auth::check())
            @if ($user->wallet >= $meal->price)
              <form action=" {{ action('PageController@postAddOrder') }} " method="post">
                <input class="btn btn-success btn-mg pull-right" type="submit" value="Objednat">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="wallet" value="{{ (double)$user->wallet - (double)$meal->price }}">
                <input type="hidden" name="menu_id" value="{{ $meal->id }}">
                <input id="expire_{{ $meal->id }}" type="hidden" name="expire" value="">
              </form>
            @else
              Nedostatok kreditu
            @endif
          @else
            <a href="{{ URL::route('login') }}">Login</a> / 
            <a href="{{ URL::route('register') }}">Register</a>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endforeach
@stop