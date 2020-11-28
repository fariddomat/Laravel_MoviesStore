@extends('layouts.app')

@section('content')


<section id="show">

    @include('layouts.__nav')

    <div class="movie">

        <div class="movie__bg"
            style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url({{asset('images/bg.jpg')}}) center/cover no-repeat;">
        </div>

        <div class="container">
            @include('layouts.dashboard._error')

            <div class="row">

                <div class="col-md-offset-2 col-md-8">
                    @if ($movie->poster_path!='/storage/images/')
                    <img style="box-shadow: 0px 0px 25px 5px #0ff; max-width: 250px;" src="{{$movie->poster_path }}"
                        class="img-fluid rounded" alt="">
                    @else
                    <img style="box-shadow: 0px 0px 25px 5px #0ff; max-width: 250px;" src="{{asset('images/poster.jpg')}}"
                        class="img-fluid rounded" alt="">
                    @endif
                </div><!-- end of col -->

                <div class="col-md-4 text-white">
                    <h3 class="movie__name fw-300">{{$movie->name}} <span
                            style="font-size: 20px;font-weight: bold;color: #1edd2a;">{{$movie->price}}$</span></h3>

                    <h5 class=" fw-300">Directed by : {{$movie->director->name}}</h5>

                    <h6 class=" fw-300">Actors :
                        @foreach ($movie->actors as $actor)
                        {{$actor->name}},
                        @endforeach
                    </h6>
                    IMDB Rating <br />
                    <div class="d-flex movie__rating my-1">

                        <div class="d-flex mr-2">
                            @for ($i = 0; $i < $movie->rating; $i++)

                                <span class="fas fa-star text-primary mr-2"></span>
                                @endfor
                        </div>
                        {{-- <span class="align-self-center">{{$movie->rating}}</span> --}}
                    </div>
                    User Rating <br />
                    <div class="d-flex movie__rating my-1">

                        <div class="d-flex mr-2">
                            @for ($i = 0; $i < $rating_average; $i++) <span class="fas fa-star text-warning mr-2">
                                </span>
                                @endfor
                        </div>
                        {{-- <span class="align-self-center">{{$movie->rating}}</span> --}}
                    </div>
                    <div>
                        <p>Download : <span id="movie__views">{{$movie->user->count() ? $movie->user->count() : 0}}</span></p>
                    </div>
                    <p class="movie__description my-3">
                        {{$movie->description}}
                    </p>

                    @auth
                    <a href="#" class="btn btn-primary text-capitalize movie__fav-btn">
                        <span
                            class="far fa-heart movie__fav-icon movie-{{ $movie->id }} {{ $movie->is_favored ? 'fw-700' : '' }}"
                            data-movie-id="{{ $movie->id }}"
                            data-url="{{ route('movies.toggle_favorite', $movie->id) }}">
                        </span>
                        add to favorite
                    </a>
                    {{-- <a href="{{ route('movies.order', $movie->id) }}" class="btn btn-success text-capitalize">
                    <span class="far fa-download  fw-700"></span>
                    Download Movie
                    </a> --}}
                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal"><span
                            class="far fa-download  fw-700"></span>
                        Download Movie</button>

                    <!-- Modal -->
                    <div style="color: black;float:left" class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <strong>Credit Card : </strong>
                                    <span> enter your card details</span>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('movies.order', $movie->id) }}" method="POST"
                                        class="form-container">
                                        @csrf
                                        <div class="form-group col-10 mx-auto col-md-6 bg-white mx-auto p-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Name"
                                                name="name" required>

                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" placeholder="Enter Email"
                                                name="email" required>

                                            <div class="form-group">
                                                <label for="ccnumber">Credit Card Number</label>
                                                <div class="input-group">
                                                    <input name="cc_number" class="form-control" type="text"
                                                        placeholder="0000 0000 0000 0000" autocomplete="email">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="ccmonth">Month</label>
                                                    <select name="cc_month" class="form-control" id="ccmonth">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="ccyear">Year</label>
                                                    <select name="cc_year" class="form-control" id="ccyear">
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="cvv">CVV/CVC</label>
                                                        <input name="cvv" class="form-control" id="cvv" type="text"
                                                            placeholder="123">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-success form-control">Continue & Download
                                            <i class="fa fa-download"></i> </button>

                                </div>
                                </form>
                            </div>

                        </div>
                    </div>


                    <br />
                    <div class="rating">
                        <br />
                        <span>your rate is :</span>
                        <form action="{{route('movies.rateMovie')}}" method="POST">
                            @csrf
                            @method('POST')
                            <fieldset class="rating">
                                <input class="rating" type="radio" id="star5" name="rating" value="5"
                                    {{$rate==5 ? 'checked' : ''}} />
                                <label for="star5">5 stars</label>
                                <input class="rating" type="radio" id="star4" name="rating" value="4"
                                    {{$rate==4 ? 'checked' : ''}} />
                                <label for="star4">4 stars</label>
                                <input class="rating" type="radio" id="star3" name="rating" value="3"
                                    {{$rate==3 ? 'checked' : ''}} />
                                <label for="star3">3 stars</label>
                                <input class="rating" type="radio" id="star2" name="rating" value="2"
                                    {{$rate==2 ? 'checked' : ''}} />
                                <label for="star2">2 stars</label>
                                <input class="rating" type="radio" id="star1" name="rating" value="1"
                                    {{$rate==1 ? 'checked' : ''}} />
                                <label for="star1">1 star</label>
                            </fieldset>
                            <input class="rate_id" type="hidden" name="id" required="" value="{{ $movie->id }}">
                            {{-- <span class="review-no">422 reviews</span> --}}
                            {{-- <br /> --}}
                            {{-- <button class="btn btn-success">Submit rating</button> --}}
                        </form>

                    </div>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary text-capitalize my-3"><i
                            class="far fa-heart"></i>
                        add to favorites</a>
                    @endauth




                </div><!-- end of col -->

            </div><!-- end of row -->



        </div><!-- end of container -->
        {{-- <div id="disqus_thread"></div> --}}
        <div class="container" style="position: relative">

            <div class="card-body">
                <h5 class="text-white">Leave a comment</h5>
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" />
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"
                            value="Add Comment" />
                    </div>
                </form>
            </div>

            <div class="card-body ">
                <h5 class="text-white">Display Comments</h5>

                @include('movies.replies', ['comments' => $movie->comments, 'movie_id' => $movie->id])

                <hr />
            </div>
        </div>

    </div><!-- end of movie -->

</section><!-- end of banner section-->



<section class="listing py-2">

    <div class="container">

        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between">
                <h3 class="listing__title text-white fw-300">Related Movies</h3>
            </div>
        </div><!-- end of row -->

        <div class="movies owl-carousel owl-theme">

            @foreach ($related_movies as $related_movie)

            <div class="movie p-0">
                @if ($related_movie->poster_path!='/storage/images/')
                <img src="{{$related_movie->poster_path}}" class="img-fluid" alt="">
                @else
                <img src="{{asset('images/poster.jpg')}}" class="img-fluid" alt="">
                @endif

                <div class="movie__details text-white">

                    <div class="d-flex justify-content-between">
                        <p class="mb-0 movie__name">{{ $related_movie->name }}</p>
                        <p class="mb-0 movie__year align-self-center">{{ $related_movie->year }}</p>
                    </div>

                    <div class="d-flex movie__rating">
                        <div class="mr-2">
                            @for ($i = 0; $i < $related_movie->rating; $i++)
                                <i class="fas fa-star text-primary mr-1"></i>
                                @endfor
                        </div>
                        <span>{{ $related_movie->rating }}</span>
                    </div>

                    <div class="movie___views">
                        <p>Downloaded: {{$related_movie->user->count() ? $related_movie->user->count() : 0}}</p>
                    </div>

                    <div class="d-flex movie__cta">
                        <a href="{{ route('movies.show', $related_movie->id) }}"
                            class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> Movie Details</a>
                        @auth
                        <i class="far fa-heart {{ $related_movie->is_favored ? 'fw-900' : ''}} fa-1x align-self-center movie__fav-icon movie-{{ $related_movie->id }}"
                            data-movie-id="{{ $related_movie->id }}"
                            data-url="{{ route('movies.toggle_favorite', $related_movie->id) }}">
                        </i>
                        @else
                        <a href="{{ route('login') }}" class="text-white align-self-center"><i
                                class="far fa-heart fa-1x align-self-center movie__fav-icon"></i></a>
                        @endauth
                    </div>

                </div><!-- end of movie details -->

            </div><!-- end of col -->

            @endforeach

        </div><!-- end of row -->

    </div><!-- end of container -->

</section><!-- end of listing section -->


@include('layouts.__footer')
@endsection


@push('scripts')
<script>
    $('input[type=radio][name=rating]').change(function(e) {
        e.preventDefault();
        // alert($('.rating:checked').val());
        $.ajax({
    type: 'POST',
    url: '/movies/rateMovie',
    data: { rating: $('.rating:checked').val(),
            id: $('.rate_id').val(),
     },
    success: function(response) {
        // alert("Transfer Thai Gayo");
    }
});
    });


</script>

<script>
    var file =
            "[Auto]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '.m3u8') }}," +
            "[360]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_100.m3u8') }}," +
            "[480]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_250.m3u8') }}," +
            "[720]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_500.m3u8') }}";
        var player = new Playerjs({
            id: "player",
            file: file,
            poster: "{{ $movie->image_path }}",
            default_quality: "Auto",
        });

        let viewsCounted = false;
        function PlayerjsEvents(event, id, data) {
            if (event == "duration") {
                duration = data;
            }
            if (event == "time") {
                time = data;
            }
            let percent = (time / duration) * 100;

            if (percent > 10 && !viewsCounted) {
                $.ajax({
                    url: "{{ route('movies.increment_views', $movie->id) }}",
                    method: 'POST',
                    success: function () {
                        let views = parseInt($('#movie__views').html());
                        $('#movie__views').html(views + 1);
                        // console.log('yeeeeeeeeeeeeeeeees');
                    },
                });//end of ajax call
                viewsCounted = true;
            } //end of if
        }//end of player event function

</script>
@endpush
