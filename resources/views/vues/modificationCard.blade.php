@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="blanc">
            <h1>Modification</h1>
        </div>
        <div class="well">
            {!! Form::open(array('route' => array('updateCard',$Card->id),'method'=>'post')) !!}
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Type Card </label>
                    <div class="col-md-2 col-sm-2">
                        <p>
                            <input type="radio" name="type" value="Word" @if($Card->type == 'Word') checked @endif/>Word
                        </p>
                        <p>
                            <input type="radio" name="type" value="Sentence" @if($Card->type == 'Sentence') checked @endif/>Sentence
                        </p>
                        <p>
                            <input type="radio" name="type" value="Lesson" @if($Card->type == 'Lesson') checked @endif/>Lesson
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Name</label>
                    <div class="col-md-2 col-sm-2">
                        <input type="text" name="name" value="{{$Card->name}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Theme</label>
                    <div class="col-md-2 col-sm-2">
                        <input type="text" name="theme" value="{{$Card->theme}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Url</label>
                    <div class="col-md-2 col-sm-2">
                        <input type="url" name="url" value="{{$Card->url}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Date</label>
                    <div class="col-md-2 col-sm-2">
                        <input type="date" name="date" value="{{$Card->date}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Iteration</label>
                    <div class="col-md-2 col-sm-2">
                        <input type="number" name="iteration" value="{{$Card->iteration}}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-default btn-primary">
                            <span class="glyphicon glyphicon-ok"></span>Valider
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default btn-primary"
                                onclick="javascript:if(confirm('vous êtes sûr ?'))
                                    window.location='{{url('/')}}';">
                            <span class="glyphicon glyphicon-remove"></span>Annuler</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
