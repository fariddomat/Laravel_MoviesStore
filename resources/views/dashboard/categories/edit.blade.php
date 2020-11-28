@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Edit Category </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">
    <form action="{{ route('dashboard.categories.update',$category->id) }}" method="POST">
        @csrf
        @method('put')
        @include('layouts.dashboard._error')


        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"
        class="form-control" name="name" id="name" value="{{old('name',$category->name)}}" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Edit</button>
        </div>
    </form>
</div>

@endsection