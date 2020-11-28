@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Site Settings </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">
    <form action="{{ route('dashboard.settings.store') }}" method="POST">
        @csrf
        @method('post')
        @include('layouts.dashboard._error')

        <div class="row">
            <div class="col-md-6">
                {{-- Site Name --}}
                <div class="form-group">
                    <label for="site_name" class="text-capitalize">Site Name</label>
                    <input type="text" class="form-control" name="site_name" id="site_name"
                        value="{{setting('site_name')}}" aria-describedby="helpId" placeholder="">
                </div>
                {{-- Site title --}}
                <div class="form-group">
                    <label for="site_title" class="text-capitalize">Site Title</label>
                    <input type="text" class="form-control" name="site_title" id="site_title"
                        value="{{setting('site_title')}}" aria-describedby="helpId" placeholder="">
                </div>
                {{-- Site about --}}
                <div class="form-group">
                    <label for="site_about" class="text-capitalize">Site About</label>
                    <input type="text" class="form-control" name="site_about" id="site_about"
                        value="{{setting('site_about')}}" aria-describedby="helpId" placeholder="">
                </div>
                {{-- Developer Name --}}
                <div class="form-group">
                    <label for="developer_name" class="text-capitalize">Developer Name</label>
                    <input type="text" class="form-control" name="developer_name" id="developer_name"
                        value="{{setting('developer_name')}}" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-md-6">
                {{-- Site Email --}}
                <div class="form-group">
                    <label for="site_email" class="text-capitalize">Site Email</label>
                    <input type="text" class="form-control" name="site_email" id="site_email"
                        value="{{setting('site_email')}}" aria-describedby="helpId" placeholder="">
                </div>
                {{-- Site Phone --}}
                <div class="form-group">
                    <label for="site_phone" class="text-capitalize">Site Phone</label>
                    <input type="text" class="form-control" name="site_phone" id="site_phone"
                        value="{{setting('site_phone')}}" aria-describedby="helpId" placeholder="">
                </div>
                {{-- Site location --}}
                <div class="form-group">
                    <label for="site_location" class="text-capitalize">Site Location</label>
                    <input type="text" class="form-control" name="site_location" id="site_location"
                        value="{{setting('site_location')}}" aria-describedby="helpId" placeholder="">
                </div>
                {{-- Site st --}}
                <div class="form-group">
                    <label for="site_st" class="text-capitalize">Site Street</label>
                    <input type="text" class="form-control" name="site_st" id="site_st" value="{{setting('site_st')}}"
                        aria-describedby="helpId" placeholder="">
                </div>
            </div>
        </div>





        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Save Settings</button>
        </div>
    </form>
</div>

@endsection
