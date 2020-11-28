@extends('layouts.app')

@section('content')
<div class="login">
    <div class="login__bg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto col-md-6 bg-white mx-auto p-3">
                <h2 class="text-center">SVU<span class="text-primary">Flixify</span></h2>
                <hr>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @method('post')
                    @include('layouts.dashboard._error')

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                            placeholder="">
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <!-- Remember me -->
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remember" id=""
                                    value="checkedValue" checked>
                                Remember me
                            </label>
                        </div>
                    </div>
                    <!-- Submit -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <p class="text-center">Create new account <a href="{{ route('register') }}">Register</a></p>
                    <hr>
                    <a href="/login/facebook" class="btn btn-block btn-primary" style="background: #3b5998;"><span
                            class="fab fa-facebook" aria-hidden="true"></span> Login by Facebook</a>
                    <a href="/login/google" class="btn btn-block btn-primary" style="background: #ea4335;"><span
                            class="fab fa-google" aria-hidden="true"></span> Login by Gmail</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
