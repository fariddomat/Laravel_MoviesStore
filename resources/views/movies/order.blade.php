@extends('layouts.app')

@include('layouts.__nav')
@section('content')

<div class="movie" style="margin-top: 50px">
    <form action="/action_page.php" class="form-container">

        <div class="form-group col-10 mx-auto col-md-6 bg-white mx-auto p-3">
            <h1>Download</h1>
            <label for="name"><b>Name</b></label>
            <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" required>


            <button type="submit" class="btn btn-success form-control">Download</button>

        </div>
    </form>
</div>


{{-- @include('layouts.__footer') --}}


@endsection
