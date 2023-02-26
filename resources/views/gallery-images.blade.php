@extends('layouts.indicons.main-layout')
@section('content')

<h1>Images of {{$category->name}}</h1>

<div style="background: #fff; padding: 1rem;" class="inner-page-confr">
    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4 text-center">
            <img
                src="{{ $image->getImagePath() }}"
                class="img-thumbnail gallery-item"
                style="max-width: 120px; cursor: pointer;"
                alt="{{$image->title}}"
            />
            <br>
            <span>{{$image->title}}</span>
        </div>
        @endforeach
    </div>
</div>

<script>
    $(function() {
        $('.gallery-item').click(function() {
            const imagePath = $(this).attr('src');
            const imageAlt = $(this).attr('alt');

            Swal.fire({
                imageUrl: imagePath,
                imageAlt: imageAlt,
                showCloseButton: true,
                showConfirmButton: false,
            });
        });
    });
</script>
@stop
