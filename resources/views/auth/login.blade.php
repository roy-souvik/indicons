@extends('layouts.indicons.main-layout')
@section('content')
<section>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Email or Mobile</label>
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter email or mobile number" value="{{old('username')}}" required/>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required/>
                    </div>

                    <!-- <div class="d-flex justify-content-between align-items-center">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> -->

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <x-button class="ml-3 btn btn-primary">
                            {{ __('Log in') }}
                        </x-button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                            <a href="{{route('conference-register.show')}}" class="link-danger">Register</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@stop
