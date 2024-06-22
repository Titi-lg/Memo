@extends('layouts.master')
@section('content')
    <style>
        .btn-delete {
    border: none;
    background: none;
    color: #56a9f5;
        }
    </style>
    <br><br>
    <br><br>
    <div class="container">
        <div class="blanc">
            <h1>Recherche</h1>
        </div>
        <div class="well">
            {!! Form::open(['url' => 'search']) !!}
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-primary">Search</button>
            {!! Form::close() !!}
        </div>
        @if(isset($posts))
            <ul>
                @foreach($posts as $card)
                    <div>
                        <h1>{{$card->name}}</h1>
                    </div>
                    <div>
                        <h2>{{$card->theme}}</h2>
                    </div>
                    <div>
                        <h3>{{$card->type}}</h3>
                    </div>
                    <div>
                        <a href="{{url('ModifierCard')}}/{{$card->id}}">Modifier</a>
                    </div>
                    <div>
                    <form action="{{ url('deleteCard', $card->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                    </div>
                    <div class="btn-url">
                        <a href="{{$card->url}}" target="_blank">Vers la page</a>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>
@stop
