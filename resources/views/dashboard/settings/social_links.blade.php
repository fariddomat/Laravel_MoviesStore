@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Social Links Settings </h1>
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
@php
 $social_sites=['facebook','linkedin','twitter','github'];
@endphp
@foreach ($social_sites as $social_site)

    {{-- client id --}}
    <div class="form-group">
      <label for="{{$social_site}}_link" class="text-capitalize">{{$social_site}} link</label>
      <input type="text" class="form-control" name="{{$social_site}}_link" id="{{$social_site}}_link"
        value="{{setting($social_site.'_link')}}" aria-describedby="helpId" placeholder="">
    </div>
@endforeach
    <div class="form-group">
      <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
    </div>
  </form>
</div>

@endsection
