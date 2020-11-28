@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Edit User </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>


<div class="tile mb-4">
    <form action="{{ route('dashboard.users.update',$user->id) }}" method="POST">
        @csrf
        @method('put')
        @include('layouts.dashboard._error')


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name',$user->name)}}"
                aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email"
        class="form-control" name="email" id="email" value="{{old('email',$user->email)}}" aria-describedby="helpId" placeholder="">
        </div>
        
        
        {{-- Roles --}}
        <div class="form-group">
          <label for="role">Roles</label>
          <select class="form-control" name="role_id" id="role_id">
            @foreach ($roles as $role)
          <option value="{{$role->id}}" {{$user->hasRole($role->name) ? 'selected' : ''}}>{{$role->name}}</option>
                
            @endforeach
        </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Edit</button>
        </div>
    </form>
</div>

@endsection