@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> User Statistics</h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="tile mb-4">

    <div class="row">
        <div class="col-md-12">
            @if (1 > 0)

            <table class="table table-hover">
                <thead style="background-color: aliceblue;">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Orders Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index=>$user)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->movie->count()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center m-auto">{{$users->links()}}</div>
        @else
        <h3 style="font-weight: 400">Sorry no record found !</h3>
        @endif
    </div>
</div>
</div>

@endsection
