@extends('layouts.indicons.main-layout')
@section('content')

<h1>Images of {{$category->name}}</h1>

<style>
    .swal2-popup {
        width: auto !important;
    }

    .gallery-image-wrapper {
        height: 230px;
        overflow: hidden;
    }
</style>

<div style="background: #fff; padding: 1rem;" class="inner-page-confr">
    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4 mb-4 text-center gallery-image-wrapper">
            <img src="{{ $image->getImagePath() }}" class="img-thumbnail gallery-item" style="cursor: pointer;" alt="{{$image->title}}" />
            <br>
            <!-- <span>{{$image->title}}</span> -->
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
                footer: `
                    <a
                        href="#"
                        data-imgurl="${imagePath}"
                        data-imgalt="${imageAlt}"
                        id="gallery-item-download-btn"
                    >
                        Download
                    </a>
                `,
                didOpen: () => {
                    $('#gallery-item-download-btn').on('click', function(e) {
                        console.log('Test');
                        const link = document.createElement('a');

                        const url = $(this).attr('data-imgurl');
                        const alt = $(this).attr('data-imgalt');

                        link.href = url;
                        link.download = alt;
                        document.body.appendChild(link);
                        link.click();

                        document.body.removeChild(link);
                        e.preventDefault();
                    });
                }
            });
        });
    });
</script>
@stop
