@extends('layouts.indicons.main-layout')
@section('content')

<h1>Videos of {{$category->name}}</h1>

<div style="background: #fff; padding: 1rem;" class="inner-page-confr">
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-md-4 mb-4 text-center gallery-video-wrapper">
            <iframe width="300" height="250" src="{{$video->path}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
        </div>
        @endforeach
    </div>
</div>
@stop
