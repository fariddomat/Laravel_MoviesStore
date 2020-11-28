@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> User Profile </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">
<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
                <h4>{{ Auth::user()->roles()->first()->name }}</h4>
                <p><b>User Name: {{ Auth::user()->name }}</b></p>
            </div>
        </div>
    </div><!-- end of col -->

    <div class="col-md-6 col-lg-6">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-play fa-3x"></i>
            <div class="info">
                <h4>User Movies</h4>
                <p><b>{{ Auth::user()->movie->count() }}</b></p>
            </div>
        </div>
    </div><!-- end of col -->


</div>
</div>

@endsection
