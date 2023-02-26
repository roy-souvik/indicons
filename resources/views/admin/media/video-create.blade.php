@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Add Video</h3>

    @include('admin.flash-message')

    <div class="col-lg-8 col-xlg-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <form
                    name="video-create-form" method="POST"
                    action="{{route('admin.videos.create')}}"
                    class="form-horizontal form-material"
                >
                    @csrf

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Title</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="title" placeholder="Enter title" value="{{ old('title') }}" class="form-control p-0 border-0" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Category</label>
                        <div class="col-md-12 border-bottom p-0">
                            <select name="category_id" id="category_id" class="form-control p-0 border-0" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Link</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="video_link" placeholder="Enter link" value="{{ old('video_link') }}" class="form-control p-0 border-0" required>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>

                <a class="btn btn-link my-4" href="/admin/videos">Back</a>
            </div>
        </div>
    </div>
</div>

@stop
