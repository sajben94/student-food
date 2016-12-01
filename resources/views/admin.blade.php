@extends('master')

@section('title','Administracia')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        @if (Auth::check())
          <table class="table table-hover" id="fixedheight">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Wallet</th>
                <th>Paymant</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $usr)
                <tr>
                  <th scope="row">{{$usr->id}}</th>
                  <td>{{$usr->name}}</td>
                  <td>{{$usr->email}}</td>
                  <td>{{$usr->wallet}} €</td>
                  <td>
                    <form class="form-inline pull-right" action=" {{ action('PageController@postPayment') }} " method="post">
                      <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount"></label>
                        <div class="input-group">
                          <div class="input-group-addon">€</div>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" class="form-control" id="exampleInputAmount" name="payment">
                          <input type="hidden" name="user_id" value="{{ $usr->id }}">
                          <div class="input-group-addon" ><input class="pull-right" type="submit" value="Add"></div>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <h1>Prihlaste sa</h1>
        @endif
      </div>
    </div>
  </div>
@stop