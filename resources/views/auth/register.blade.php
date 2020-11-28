@extends('layouts.app')
@section('content')

<div class="login">
    <div class="login__bg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto col-md-12 bg-white mx-auto p-3">
                <h2 class="text-center">SVU<span class="text-primary">Flixify</span></h2>
                <hr>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    @method('post')
                    @include('layouts.dashboard._error')

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Username -->
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name"
                                    aria-describedby="helpId" placeholder="">

                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}"
                                    id="email" aria-describedby="helpId" placeholder="">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            {{-- Gender --}}
                            <label for="">Gender</label>
                            <div class="form-group">
                                <input class="" type="radio" name="gender" value="male"> Male<br>
                                <input class="" type="radio" name="gender" value="female"> Female<br>
                            </div>

                        </div>

                        <div class="col-md-6">
                            {{-- birth_date --}}
                            <div class="form-group">
                                <label for="birth_date">Date of birth</label>
                                <input type="date" class="form-control" name="birth_date" id="birth_date"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            {{-- married --}}
                            <div class="form-group">
                                <label for="married">Married?</label><br>
                                <input type="checkbox" value="married" class="" name="married" id="married" aria-describedby="helpId"
                                    placeholder="">
                            </div>

                            {{-- children_number --}}
                            <div class="form-group">
                                <label for="children_number">Number of children</label><br>
                                <input style="margin-top: 12px; margin-bottom: 11px;" type="number" class="form-control"
                                    name="children_number" id="children_number" aria-describedby="helpId"
                                    placeholder="">
                            </div>

                            {{-- hoppies --}}
                            <div class="form-group">
                                <label for="name">Hoppies</label>
                                <input type="text" class="form-control" name="hoppies" value="{{old('hoppies')}}"
                                    id="name" aria-describedby="helpId" placeholder="">
                            </div>

                        </div>
                    </div>
                    {{-- <hr> --}}
                    <!-- Submit -->
                    <div style="display: flex;justify-content: center;" class="form-group col-md-offset-3 col-md-12 ">
                        <button type="submit" class="btn btn-primary btn-block col-md-6">Register</button>
                    </div>

                    <p class="text-center col-md-12">Already have an account <a href="{{ route('login') }}">Login</a>
                    </p>
                    <hr>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
