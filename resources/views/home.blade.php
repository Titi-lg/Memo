@extends('layouts.master')
@section('content')
    <div class="bvn">
        <h1 class="bvn">Home Page</h1>
    </div>
    @include('layouts.counter')
    @include('layouts.dateToday')
    @include('layouts.notice')
@stop
