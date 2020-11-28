@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Edit Movie </h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>


<div class="tile mb-4">
    <form id="movie__properties" method="post"
        action="{{ route('dashboard.movies.update', ['movie' => $movie->id, 'type' => 'update']) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('layouts.dashboard._error')


        {{--name--}}
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="movie__name" value="{{ old('name', $movie->name) }}"
                class="form-control">
        </div>

        {{--description--}}
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $movie->description) }}</textarea>
        </div>

        {{--poster--}}
        <div class="form-group">
            <label>Poster</label>
            <input type="file" name="poster" class="form-control">
            <img src="{{ $movie->poster_path }}" style=" margin-top: 10px; width: 255px; height: 378px;" alt="">
        </div>

        {{--image--}}
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ $movie->image_path }}" style=" margin-top: 10px; width: 300px; height: 300;" alt="">
        </div>

        {{--categories--}}
        <div class="form-group">
            <label>Category</label>
            <select name="categories[]" class="form-control select2" multiple>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : ''}}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{--director--}}
        <div class="form-group">
            <label>Directos</label>
            <select name="director_id" class="form-control" >
                @foreach ($directors as $director)
                <option value="{{ $director->id }}">
                    {{ $director->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{--actors--}}
        <div class="form-group">
            <label>Actor</label>
            <select name="actors[]" class="form-control select2" multiple>
                @foreach ($actors as $actor)
                <option value="{{ $actor->id }}"
                    {{ in_array($actor->id, $movie->actors->pluck('id')->toArray()) ? 'selected' : ''}}>
                    {{ $actor->name }}
                </option>
                @endforeach
            </select>
        </div>


        {{--year--}}
        <div class="form-group">
            <label>Year</label>
            <input type="text" name="year" value="{{ old('year', $movie->year) }}" class="form-control">
        </div>

        {{--rating--}}
        <div class="form-group">
            <label>Rating</label>
            <input type="number" min="1" name="rating" value="{{ old('rating', $movie->rating) }}" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
        </div>

    </form><!-- end of form -->

</div>

@endsection
