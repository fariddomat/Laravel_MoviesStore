@foreach($comments as $comment)
<div class="display-comment text-white p-1 rounded">
    <div class="row">
        <div class="col-md-1 center">
            <i class="app-menu__icon fa fa-user text-primary" style="font-size: 35px;
            justify-content: center;
            display: grid;
            margin-top: 10px;
            margin-left: 15px;"></i>
        </div>
        <div class="col-md-11">
            <strong class="upper">{{ $comment->user->name }}</strong>
            {{$comment->created_at->diffForHumans()}}
            <p>{{ $comment->comment }}</p>
        </div>

    </div>

    @if ($comment->replies->count() > 0)
    <div style="margin-left: 75px">
        Replies:
        @include('movies.replies', ['comments' => $comment->replies])
    </div>
    @endif

    @if ($comment->parent_id == null)
    <div style="margin-left: 75px">
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="movie_id" value="{{ $movie_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
    </div>
    @endif
    <hr>

</div>
@endforeach
