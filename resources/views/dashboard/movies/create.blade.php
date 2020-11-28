@extends('layouts.dashboard.app')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Create Movie </h1>
    {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
  </ul>
</div>

<div class="tile mb-4">
  <div class="d-flex justify-content-center align-items-center flex-column"
    style="height: 25vh; border: 1px solid black; cursor: pointer; display: {{$errors->any() ? 'none' : ''}} !important;"
    onclick="document.getElementById('movie__file-input').click()"
    id="movie__input-wrapper">
    <i class="fa fa-video-camera fa-2x" aria-hidden="true"></i>
    <p>click to uploaad</p>
  </div>
<input type="file"
  name=""
  data-movie-id="{{ $movie->id }}"
  data-url="{{ route('dashboard.movies.store') }}"
  id="movie__file-input"
  style="display: none">

  <form id="movie_properties"
    action="{{ route('dashboard.movies.update', ['movie' => $movie->id, 'type' => 'publish']) }}"
    method="POST"
style="display: {{$errors->any() ? 'block' : 'none'}}"
    enctype="multipart/form-data">

    @csrf
    @method('put')
    @include('layouts.dashboard._error')
    {{-- progress bar --}}
    <div class="form-group" style="display: {{$errors->any() ? 'none' : ''}} !important;">
      <label id="movie__upload-status">Uploading</label>
      <div class="progress" >
        <div class="progress-bar" id="movie__upload-progress" role="progressbar"></div>
    </div>
    </div>
    {{-- Name --}}
    <div class="form-group">
      <label for="name">Name</label>
    <input type="text"
        class="form-control" name="name" value="{{old('name',$movie->name)}}" id="movie__name" aria-describedby="helpId" placeholder="">
    </div>
    {{-- description --}}
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description"  id="description" rows="3">{{old('description')}}</textarea>
    </div>
    {{-- poster --}}
    <div class="form-group">
      <label for="poster">Poster</label>
      <input type="file" class="form-control-file" name="poster" value="{{old('poster')}}" id="poster" placeholder="" aria-describedby="fileHelpId">
    </div>
    {{-- image --}}
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control-file" name="image" value="{{old('image')}}" id="image" placeholder="" aria-describedby="fileHelpId">
    </div>
    {{-- Categories --}}
    <div class="form-group">
      <label for="categories">Categories</label>
      <select multiple class="form-control select2" name="categories[]" id="categories">
        @foreach ($categories as $category)
      <option value="{{$category->id}}" {{in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : ''}}>{{$category->name}}</option>

        @endforeach
      </select>
    </div>
    {{-- Director --}}
    <div class="form-group">
        <label for="director">Director</label>
        <select  class="form-control select2" name="director_id" id="director">
          @foreach ($directors as $director)
        <option value="{{$director->id}}" >{{$director->name}}</option>

          @endforeach
        </select>
      </div>
    {{-- Actors --}}
    <div class="form-group">
      <label for="actors">Actors</label>
      <select multiple class="form-control select2" name="actors[]" id="actors">
        @foreach ($actors as $actor)
      <option value="{{$actor->id}}" {{in_array($actor->id, $movie->actors->pluck('id')->toArray()) ? 'selected' : ''}}>{{$actor->name}}</option>

        @endforeach
      </select>
    </div>
    {{-- year --}}
    <div class="form-group">
      <label for="year">Year</label>
      <input type="number"
        class="form-control" name="year" value="{{old('year')}}" id="year" aria-describedby="helpId" placeholder="">
    </div>
    {{-- rating --}}
    <div class="form-group">
      <label for="rating">Rating</label>
      <input type="text"
        class="form-control" name="rating" value="{{old('rating')}}" id="rating" min="1" aria-describedby="helpId" placeholder="">
    </div>

    <div class="form-group">
        <button id="movie__submit-btn" style="display: {{$errors->any() ? 'block' : 'none'}} !important;" type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Publish</button>
    </div>
</form>
</div>

@endsection
