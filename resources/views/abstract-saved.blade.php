@extends('layouts.indicons.main-layout')
@section('content')

@if ($abstract)
    <h2>Your abstract is saved successfully.</h2>
    <p>Our team will review your abstract and reach out to you.</p>
@else
    <h2>Unable to save your abstract.</h2>
    <p>Please try again or contact us.</p>
@endif

<a href="/" class="btn btn-primary">Go Back</a>

@stop
