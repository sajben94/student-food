@extends('master')

@section('title','Update Meals')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="jumbotron">    
                                <h2>Pridaj jedlo</h2>
                                <form method="POST" action="{{ action('PageController@postUpdate', ['id' => $menu->id] ) }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        Názov jedla
                                        <input type="text" name="name" class="form-control" value="{{ $menu->name }}">
                                    </div>
                                    <div class="form-group">
                                        Polievka
                                        <input type="text" name="soup" class="form-control" value="{{ $menu->soup }}">
                                    </div>
                                    <div class="form-group">
                                        Cena
                                        <input type="text" name="price" class="form-control" value="{{ $menu->price }}">
                                    </div>
                                    <div class="form-group">
                                        Den
                                        <select name="day_in_week" class="selectpicker" value="{{ $menu->day_in_week }}">
                                            @for ($i=1; $i<8; $i++)
                                                @if ($i == $menu->day_in_week)
                                                    <option selected value="$i">{{ $week[$i]}}</option>
                                                @else
                                                    <option value="$i">{{ $week[$i]}}</option>
                                                @endif
                                            @endfor
                                            
                                            <!--<option value="1">Nedela</option>-->
                                            <!--<option value="2">Pondelok</option>-->
                                            <!--<option value="3">Utorok</option>-->
                                            <!--<option value="4">Streda</option>-->
                                            <!--<option value="5">Stvrtok</option>-->
                                            <!--<option value="6">Piatok</option>-->
                                            <!--<option value="7">Sobota</option>-->
                                        </select>
                                        
                                        
                                    </div>
                                    <div class="form-group">
                                        Opis
                                        <input type="text" name="about" class="form-control" value="{{ $menu->about }}">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-default">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop