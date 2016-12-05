@extends('master')

@section('title','Administracia')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        @if (Auth::check())
          @if ($user->admin)
            <a href="{{ route('editmeals') }}" class="btn btn-default" >Pridaj jedlo</a>
          @endif
          <table class="table table-hover" id="">
            <thead>
              <tr>
                <th>Den</th>
                <th>Meno</th>
                <th>Polievka</th>
                <th>Cena</th>
                <th>Popis</th>
                @if ($user->admin)
                    <th>Editacia</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($menu as $m)
                <tr>
                  <td>{{$m->day_in_week}}</td>
                  <td>{{$m->name}}</td>
                  <td>{{$m->soup}}</td>
                  <td>{{$m->price}}</td>
                  <td>{{$m->about}}</td>
                  @if ($user->admin)
                    <td>
                      <a href="{{ action('PageController@getUpdateForm',['id' => $m->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="{{ action('PageController@getDelete',['id' => $m->id]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td> 
                  @endif
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