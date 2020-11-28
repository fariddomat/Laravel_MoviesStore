@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Roles </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">
    <div class="row">
        <div class="col-12">
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" id="search" autofocus
                                value="{{request()->search}}" aria-describedby="helpId" placeholder="Search">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i>Search</button>
                        @if (auth()->user()->hasPermission('create_roles'))

                        <a href="{{ route('dashboard.roles.create') }}" class="btn btn-outline-primary"><i
                                class="fa fa-plus" aria-hidden="true"></i>Add</a>

                        @else
                        <a href="#" class="btn btn-outline-secondary disabled" disabled><i class="fa fa-plus"
                                aria-hidden="true"></i>Add</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>


    </div>

    <div class="row">
        <div class="col-md-12">
            @if ($roles->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>Permissions</th>
                        <th>Users Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index=>$role)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                            <h5 style="display: inline-block">
                                <span class="badge badge-secondary">
                                    {{$permission->name}}
                                </span>
                            </h5>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <h5><span class="badge badge-success p-2 rounded-circle">
                                    {{$role->users->count()}}
                                </span></h5>
                        </td>
                        <td>
                           
                            @if (auth()->user()->hasPermission('update_roles'))

                            <a href="{{route('dashboard.roles.edit',$role->id)}}"
                                class="btn btn-outline-warning" style="display: inline-block"><i
                                    class="fa fa-edit"></i>Edit</a>
                            @else
                            <a href="#" class="btn btn-outline-warning disabled" disabled
                                style="display: inline-block"><i class="fa fa-edit"></i>Edit</a>
                            @endif
                            @if (auth()->user()->hasPermission('delete_roles'))

                            <form action="{{route('dashboard.roles.destroy',$role->id)}}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger delete"
                                    style="display: inline-block"><i class="fa fa-trash"
                                        aria-hidden="true"></i>Delete</button>
                            </form>
                            @else
                            <button class="btn btn-outline-danger  disabled" disabled style="display: inline-block"><i
                                    class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center m-auto">{{$roles->appends(request()->query())->links()}}</div>
            @else
            <h3 style="font-weight: 400">Sorry no record found !</h3>
            @endif
        </div>
    </div>
</div>

@endsection