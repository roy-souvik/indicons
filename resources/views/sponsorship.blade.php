@extends('layouts.indicons.main-layout')
@section('content')

<div class="demo">
    <div class="container">
        <div class="row">
            @foreach ($sponsorships as $sponsorship)

            @if ($sponsorship->category == 'main')
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <h3 class="title">{{$sponsorship->title}}</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">{{$sponsorship->currency}} {{$sponsorship->amount}}</span>
                    </div>

                    <ul class="pricing-content">
                        @foreach ($sponsorship->features as $feature)
                        <li>{{$feature->title}}</li>
                        @endforeach
                    </ul>

                    <div class="pricingTable-signup">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <!-- <div class="col-md-4 col-sm-6">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <h3 class="title">Business</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">$20</span>
                        <span class="duration">/month</span>
                    </div>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li>Maintenance</li>
                        <li class="disable">15 Subdomains</li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <h3 class="title">Premium</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">$30</span>
                        <span class="duration">/month</span>
                    </div>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li>Maintenance</li>
                        <li>15 Subdomains</li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div> -->

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
                            <td>{{$sponsorship->currency}} {{$sponsorship->amount}}</td>
                            <td>{{$sponsorship->number}}</td>
                            <td>
                                <button class="btn btn-link" data-id={{$sponsorship->id}}>Buy</button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
</div>

@stop
