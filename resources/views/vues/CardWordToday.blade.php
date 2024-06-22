@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="blanc">
            <h1>Liste des Cards aujourd'hui</h1>
        </div>
        <div class="well">
            @foreach($Cards as $Card)
                <div>
                    <div>
                        <div class="card-list">
                            <div>
                                <h1>{{$Card->name}}</h1>
                            </div>
                            <div>
                                <h2>{{$Card->theme}}</h2>
                            </div>
                            <div>
                                <h3>{{$Card->type}}</h3>
                            </div>
                            <div style="align-self: center ; border: solid slategrey thick;
                            border-radius: 3em;box-shadow: #2b669a 0.1em 0.1em 0.2em 0.2em;">
                                <iframe width="800" height="600" style="align-self: center ; border-radius: 3em; margin: 0" src="{{$Card->url}}" ></iframe>
                            </div>
                            <div class="btn-url">
                                <a href="{{$Card->url}}" target="_blank">Vers la page</a>
                            </div>
                            <div class="btn-finish">
                                <a href="{{url('FinishCard')}}/{{$Card->id}}">Finish</a>
                            </div>
                            <div class="btn-finish">
                                <a href="{{url('graph')}}/{{$Card->id}}">Show graph</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <BR><BR>
    </div>
    @stop
