@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Change Password </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>


<div class="tile mb-4">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Change your password</div>



                    <div class="card-body">

                        <form method="POST" action="{{ route('profile.change.password') }}">

                            @csrf



                            @foreach ($errors->all() as $error)

                            <p class="text-danger">{{ $error }}</p>

                            @endforeach



                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">Current
                                    Password</label>



                                <div class="col-md-6">

                                    <input id="password" type="password" class="form-control" name="current_password"
                                        autocomplete="current-password">

                                </div>

                            </div>



                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>



                                <div class="col-md-6">

                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="current-password">

                                </div>

                            </div>



                            <div class="form-group row">

                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                    Password</label>



                                <div class="col-md-6">

                                    <input id="new_confirm_password" type="password" class="form-control"
                                        name="new_confirm_password" autocomplete="current-password">

                                </div>

                            </div>



                            <div class="form-group row mb-0">

                                <div class="col-md-8 offset-md-4">

                                    <button type="submit" class="btn btn-primary">

                                        Update Password

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
