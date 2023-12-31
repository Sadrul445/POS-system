@extends('authentication.login.master')

@push('css')
@endpush
@section('title', 'Login-Admin Panel')
@section('content')
    <section>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <form method="POST" action="{{ route('login') }}" class="theme-form login-form">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid" src="{{ asset('assets/images/logo/pos.png') }}" alt=""
                                    height="35" width="35">
                                <h3 class="mx-2 my-1"> {{ config('app.name', 'Point of Sale - POS') }}</h3>
                            </div>
                            <h5 class="my-3 py-2">Login</h5>
                            <h6>Welcome back! Log in to your account.</h6>

                            <!-- Email Address -->
                            <div class="form-group">
                                <x-input-label for="email" :value="__('Email')" />
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-email"></i></span>
                                    <x-text-input class="form-control" type="email" name="email" required autofocus
                                        autocomplete="username" :value="old('email')" />
                                    @error('email')
                                        <div class="alert alert-danger mt-2 w-100">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <x-input-label for="password" :value="__('Password')" />
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                    <x-text-input class="form-control" type="password" name="password" required
                                        autocomplete="current-password" />

                                    <div class="show-hide"><span class="show"> </span></div>
                                    @error('password')
                                        <div class="alert alert-danger mt-2 w-100">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" />
                                    <label for="checkbox1">Remember password</label>
                                </div>
                                <a class="link" href="#">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <x-primary-button class="btn btn-primary btn-block">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                            <div class="login-social-title">
                                <h5>Sign in with</h5>
                            </div>
                            <div class="form-group">
                                <ul class="login-social">
                                    <li>
                                        <a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/login" target="_blank"><i
                                                data-feather="instagram"> </i></a>
                                    </li>
                                </ul>
                            </div>
                            <p>Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('scripts')
    @endpush
@endsection
