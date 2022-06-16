@extends('layouts.indicons.main-layout')
@section('content')
<div class="title">Registration</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/registration">
    @csrf
    <div class="user__details">

        <div class="input__box">
            <span class="details">City</span>
            <input type="text" name="city" value="{{ old('city') }}" required>
        </div>


        <div style="clear:both;"> </div>

        <p class="agree">
            <input style="width: 20px; height: 20px; position: relative;top: 4px;" name="privacy_policy_check" type="checkbox" required>
            I agree to the <a href="#"> Privacy Policy</a>
        </p>

    </div>

    <div class="button">
        <input type="submit" value="Register" />
    </div>
</form>
@stop
