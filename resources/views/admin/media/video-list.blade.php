@extends('layouts.indicons-admin.main-layout')

@section('content')
<div class="white-box">

    @include('admin.flash-message')

    <div>
        <a class="btn-btn-primary" href="{{route('admin.videos.createForm')}}">Create New +</a>
    </div>
    <div class="container">
        <h3 class="box-title">Videos</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Video</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $video->category->name }}</td>
                            <td>{{ $video->title }}</td>
                            <td>
                                <iframe
                                    width="200"
                                    src="{{ $video->path }}"
                                >
                                </iframe>

                            </td>
                            <td>
                                <form name="delete-media" action="{{route('admin.media.destroy', $video->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
