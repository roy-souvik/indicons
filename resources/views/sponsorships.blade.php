@extends('layouts.indicons.main-layout')
@section('content')

<div class="demo">
    <div class="container">
        <div class="row">
            @foreach ($sponsorships as $sponsorship)

            @if ($sponsorship->category == 'main')
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header" style="background-color: {{data_get($sponsorship, 'color', '#cecece')}};">
                        <h3 class="title">{{$sponsorship->title}}</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</span>
                    </div>

                    <ul class="pricing-content">
                        @foreach ($sponsorship->features as $feature)
                        <li>{{$feature->title}}</li>
                        @endforeach
                    </ul>

                    <div class="pricingTable-signup">
                        <a href="{{route('sponsorship.buy', $sponsorship->id)}}">Sign Up</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <h3 class="mt-4">Other Sponsorships</h3>
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Number</th>
                    <th></th>
                </tr>

                @foreach ($sponsorships as $sponsorship)
                    @if ($sponsorship->category !== 'main')
                        <tr>
                            <td>{{$sponsorship->title}}</td>
                            <td>{{$sponsorship->currency}} {{number_format($sponsorship->amount)}}</td>
                            <td>{{$sponsorship->number}}</td>
                            <td>
                                <a href="{{route('sponsorship.buy', $sponsorship->id)}}" class="btn btn-link" data-id={{$sponsorship->id}}>Buy</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
</div>

@stop
