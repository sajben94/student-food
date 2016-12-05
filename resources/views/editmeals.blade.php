@extends('master')

@section('title','Edit Meals')

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
                                <form method="POST" action="editmeals">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        Názov jedla
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        Polievka
                                        <input type="text" name="soup" class="form-control" value="{{ old('soup') }}">
                                    </div>
                                    <div class="form-group">
                                        Cena
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        Den v tyzni
                                        <select name="day_in_week" class="selectpicker">
                                            <option value="1">Nedela</option>
                                            <option value="2">Pondelok</option>
                                            <option value="3">Utorok</option>
                                            <option value="4">Streda</option>
                                            <option value="5">Stvrtok</option>
                                            <option value="6">Piatok</option>
                                            <option value="7">Sobota</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        Opis
                                        <input type="text" name="about" class="form-control">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-default">Pridaj jedlo</button>
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