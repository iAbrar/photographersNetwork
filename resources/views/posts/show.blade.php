@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Show a Post </h3>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </div>
            <div class="row d-flex justify-content-between">

                <div> # claps</div>
                <div>
                    calender icon {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                </div>
            </div>
            <div class="row">
                Category: <span class="pl-2">i have to add category of the image</span>
            </div>


            <hr>


            <div class="row d-flex align-items-baseline">
                <div class="pr-2">
                    <img src="/storage/{{ $post->user->profile->avatar}}" class="rounded-circle" width="50px;" alt="">
                </div>
                by <strong class="pl-2"><a href="/{{ $post->user->username }}">{{ $post->user->username }}</a></strong>

            </div>
            <div class="row pt-2">
                {{ $post->caption }}
            </div>

            <div class="row pt-2">
                <h3>Comments</h3>


                @foreach ($post->comments as $comment)
                <div class="col-12">
                    {{ $comment->body }}
                </div>
                <hr />
                @endforeach
            </div>
            <form action="/post/{{$post->id}}/comment" method="post">
                @csrf

                <fieldset class="form-group">

                    <textarea type="text" class="form-control" name="body" placeholder="write a comment"></textarea>
                </fieldset>
                <fieldset class="form-group">

                    <button class="btn btn-primary">Add Comment</button>
                </fieldset>

            </form>
        </div>
    </div>
</div>

@endsection
