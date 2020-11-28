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
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('put')
        @include('layouts.dashboard._error')




        <div class="row">
            <div class="col-md-6">
                <!-- Username -->
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}" id="name"
                        aria-describedby="helpId" placeholder="">

                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}"
                        id="email" aria-describedby="helpId" placeholder="">
                </div>

                <!-- Password -->
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        aria-describedby="helpId" placeholder="">
                </div> --}}
                {{-- Gender --}}
                <label for="">Gender</label>
                <div class="form-group">
                    <input class="" type="radio" name="gender" value="male" {{$user->gender=='male'? 'checked' : ''}}> Male<br>
                    <input class="" type="radio" name="gender" value="female"  {{$user->gender=='female'? 'checked' : ''}} > Female<br>
                </div>

            </div>

            <div class="col-md-6">
                {{-- birth_date --}}
                <div class="form-group">
                    <label for="birth_date">Date of birth</label>
                    <input value="{{old('birth_date',$user->birth_date)}}" type="date" class="form-control" name="birth_date" id="birth_date"
                        aria-describedby="helpId" placeholder="">
                </div>

                {{-- married --}}
                <div class="form-group">
                    <label for="married">Married?</label><br>
                    <input type="checkbox" class="" name="married" id="married" aria-describedby="helpId"
                        placeholder="" {{$user->married=='true'? 'checked' : ''}}>
                </div>

                {{-- children_number --}}
                <div class="form-group">
                    <label for="children_number">Number of children</label><br>
                    <input style="margin-top: 12px; margin-bottom: 11px;" type="number" class="form-control"
                        name="children_number" id="children_number" aria-describedby="helpId"
                        placeholder="" value="{{old('children_number',$user->children_number)}}">
                </div>

                {{-- hoppies --}}
                <div class="form-group">
                    <label for="name">Hoppies</label>
                    <input value="{{old('hoppies',$user->hoppies)}}" type="text" class="form-control" name="hoppies" value="{{old('hoppies')}}"
                        id="name" aria-describedby="helpId" placeholder="">
                </div>

            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Edit</button>
        </div>
    </form>
</div>

@endsection
