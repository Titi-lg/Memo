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
                        <div>
                            <div>
                                <h1>{{$Card->name}}</h1>
                            </div>
                            <div>
                                <h2>{{$Card->theme}}</h2>
                            </div>
                            <div>
                                <h3>{{$Card->type}}</h3>
                            </div>
                            <div>
                                <iframe width="560" height="315" src="{{$Card->url}}" ></iframe>
                            </div>
                            <div>
                                <a href="{{$Card->url}}">Vers la page</a>
                            </div>
                            <div>
                                <a href="{{url('FinishCard')}}/{{$Card->id}}">Finish</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <BR><BR>
    </div>
    @stop
