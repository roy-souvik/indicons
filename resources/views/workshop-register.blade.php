@extends('layouts.indicons.main-layout')
@section('content')

<div class="container">

    <h4>Register for workshop</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @guest
    <div class="row">
        <div class="card p-4" style="width: 40rem;">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="name" class="form-label">Name</label>

                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" class="form-label" />

                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <div>
                    <label for="company" class="form-label">Company</label>

                    <input type="text" name="company" class="form-control" id="company" />
                </div>

                <div>
                    <label for="phone" class="form-label">Phone</label>

                    <input type="text" name="phone" class="form-control" id="phone" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" class="form-label" />

                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

                    <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4 btn btn-primary">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    @endguest
    @stop
