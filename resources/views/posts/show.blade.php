@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="row">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </div>
            <div class="row d-flex p-3 align-items-baseline justify-content-between">
              <p class="p-3">
          <span class="icon-clap"></span><small><strong>#</strong> claps </small>
           </p>
                <p>
                    <small>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                </p>
            </div>

            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between align-items-baseline p-3">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <div class="pr-2">
                                <img src="{{ $post->user->profile->avatar}}" class="rounded-circle" width="50px;" alt="">
                            </div>
                            <h5>
                                By <strong class="pl-1"><a href="/{{ $post->user->username }}">{{ $post->user->username }}</a></strong>
                            </h5>
                        </div>
                        @can ('update', $post)
                        <div class="dropdown">
                            <button class="btn btn-primary-outline" type="button" id="more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="more">
                                <a class="dropdown-item" href="/posts/{{ $post->id }}/edit">Edit</a>
                                <form action="/posts/{{$post->id}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="dropdown-item" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="px-2 text-justify align-items-baseline">
                        <p class="card-text">
                            {!!nl2br(e($post->caption)) !!}
                            <!-- is this safe way to use lines?-->
                        </p>
                        <p>
                          <small class="text-muted">Last updated {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</small>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--comment section -->
    <div class="row justify-content-center pt-5">
        <div class="d-flex col-md-10 justify-content-between align-items-baseline">
            <h3>Write a comments</h3> <p class="text-muted">{{ $post->comments->count() }} Comments</p>
        </div>
        <div class="col-md-10">
          <form action="/posts/{{$post->id}}/comment" method="post">
              @csrf

              <fieldset class="form-group">

                  <textarea type="text" class="form-control" name="body" placeholder="your comment" required autofocus></textarea>
              </fieldset>
              <fieldset class="form-group">
                  <button class="btn custom-btn custom-btn-bg custom-btn-link">Add Comment</button>
              </fieldset>

          </form>
          @error('body')
          <strong>{{ $message }}</strong>
          @enderror
        </div>
    </div>
    <hr width="85%">

    <div class="row justify-content-center">

        <div class="col-md-10">
            @foreach ($post->comments as $comment)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-2">
                      @if ($comment->user_id == 0)
                        <img src="{{ $comment->avatar }}" class="card-img rounded-circle p-3" alt="...">
                      @else
                        <img src="{{ $comment->user->profile->avatar }}" class="card-img rounded-circle p-3" alt="...">
                      @endif
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                          @if ($comment->user_id == 0)
                            <h5 class="card-title">{{ $comment->name }}</h5>
                          @else
                            <h5 class="card-title">{{ $comment->user->username }}</h5>
                          @endif
                            <p class="card-text text-justify pr-4">{{ $comment->body }}</p>
                            <p class="card-text"><small class="text-muted">Last updated {{ Carbon\Carbon::parse($comment->updated_at)->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
