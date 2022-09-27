@extends('layouts.indicons.main-layout')
@section('content')

<h2>Payment successful</h2>

<h4>Transaction ID: {{$transactionId}}</h4>

<a href="/" class="btn btn-primary">Go Back</a>

<br><br>

<a href="/abstract" class="btn btn-primary">Submit an abstract</a>
@stop
