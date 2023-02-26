@extends('layouts.indicons-admin.main-layout')

@section('content')
<div class="white-box">

    @include('admin.flash-message')

    <div>
        <a class="btn-btn-primary" href="{{route('admin.images.createForm')}}">Create New +</a>
    </div>
    <div class="container">
        <h3 class="box-title">Images</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $image)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $image->category->name }}</td>
                            <td>{{ $image->title }}</td>
                            <td>
                                <img class="img-circle" width="120" src="{{ $image->getImagePath() }}" alt="">
                            </td>
                            <td>
                                <form name="delete-media" action="{{route('admin.media.destroy', $image->id)}}" method="post">
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
