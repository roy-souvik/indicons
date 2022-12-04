@extends('layouts.indicons-admin.main-layout')
@section('content')

<div class="white-box">

@include('admin.flash-message')

    <div>
        <form action="{{route('admin.coupons.create')}}" method="post" class="form-horizontal form-material">
            @csrf

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Count</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="number" min="1" max="10" name="coupon_count" value="2" class="form-control p-0 border-0">
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Percent Off</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="number" name="percent_off" min="1" max="90" class="form-control p-0 border-0" value="10">
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Create coupons</button>
                </div>
            </div>
        </form>
    </div>

    <h3 class="box-title">Coupons</h3>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Code</th>
                    <th class="border-top-0">Percent Off (%)</th>
                    <th class="border-top-0">Active</th>
                    <th class="border-top-0">Used By</th>
                    <th class="border-top-0">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->percent_off}}</td>
                    <td>{{$coupon->is_active ? 'Yes' : 'No'}}</td>
                    <td>{{$coupon->user_id}}</td>
                    <td>
                        <form name="delete-feature" action="{{route('admin.coupons.destroy', $coupon->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
