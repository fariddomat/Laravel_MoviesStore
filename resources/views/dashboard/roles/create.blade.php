@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Create Role </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">
    <form action="{{ route('dashboard.roles.store') }}" method="POST">
        @csrf
        @method('post')
        @include('layouts.dashboard._error')


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"
                aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <h4>Permissions</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Model</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $models=['categories','movies','roles','users','settings'];
                    @endphp
                    @foreach ($models as $index=>$model)
                    <tr>
                        <td>{{$index + 1 }}</td>
                        <td>{{$model}}</td>
                        <td>
                            @php
                            $permission_maps=['create','read','update','delete'];
                            @endphp
                            @if ($model=='settings')
                                @php
                                $permission_maps=['create','read'];
                                    
                                @endphp
                            @endif
                            <select name="permissions[]" id="" class="form-control select2" multiple>
                                @foreach ($permission_maps as $permission_map)
                            <option value="{{$permission_map.'_'.$model}}">{{$permission_map}}</option>

                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
        </div>
    </form>
</div>

@endsection