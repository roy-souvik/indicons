@extends('layouts.indicons.main-layout')
@section('content')

<h1>Categories</h1>

<div style="background: #fff; padding: 1rem;">

    <ul style="list-style: none;">
        @foreach ($categories as $category)
            @if ($category->isActive())
                <li>
                    <a href="{{route('gallery.videos', $category->id)}}">
                        {{$category->name}}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

</div>
@stop
