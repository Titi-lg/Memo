@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'postCard']) !!}
    <div>
        <br><br>
        <br><br>
        <div class="well">
            <div class="col-md-12 col-sm-12 well well-md">
                <center><h1></h1></center>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Type Card </label>
                        <div class="col-md-2 col-sm-2">
                            <p>
                                <input type="radio" name="type" value="Word"/>Word
                            </p>
                            <p>
                                <input type="radio" name="type" value="Sentence"/>Sentence
                            </p>
                            <p>
                                <input type="radio" name="type" value="Lesson"/>Lesson
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Name</label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="name" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Theme</label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="theme" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Url</label>
                        <div class="col-md-2 col-sm-2">
                            <input type="url" name="url" value="" class="form-control" required>
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
            </div>
        </div>
    </div>
