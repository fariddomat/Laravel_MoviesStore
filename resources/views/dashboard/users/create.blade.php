@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Create User </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">
    <form action="{{ route('dashboard.users.store') }}" method="POST">
        @csrf
        @method('post')
        @include('layouts.dashboard._error')


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"
                aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email"
        class="form-control" name="email" id="email" value="{{old('email')}}" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="">
        </div>
        <div class="form-group">
          <label for="password_c">Password Confirmation</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_c" placeholder="">
        </div>
        {{-- Roles --}}
        <div class="form-group">
          <label for="role">Roles</label>
          <select class="form-control" name="role_id" id="role_id">
            @foreach ($roles as $role)
          <option value="{{$role->id}}">{{$role->name}}</option>
                
            @endforeach
        </select>
        <a href="{{ route('dashboard.roles.create') }}">Create new Role</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
        </div>
    </form>
</div>

@endsection