@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">
    <h3 class="box-title">Edit {{$sponsorship->title}}</h3>

    @include('admin.flash-message')

    <div class="col-lg-8 col-xlg-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <form name="sponsorship-update-form" method="POST" action="{{route('admin.sponsorship.update', $sponsorship->id)}}" class="form-horizontal form-material">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Title</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="title" placeholder="Enter title" value="{{$sponsorship->title}}" class="form-control p-0 border-0">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="example-email" class="col-md-12 p-0">Amount</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="number" placeholder="e.g. 10000" class="form-control p-0 border-0" name="amount" id="amount" value="{{$sponsorship->amount}}">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Number</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="number" placeholder="e.g. 5" name="number" value="{{$sponsorship->number}}" class="form-control p-0 border-0">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Label Color</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="color" name="color" value="{{$sponsorship->color}}" class="form-control p-0 border-0">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
