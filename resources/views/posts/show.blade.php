@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Show a Post </h3>
    <div class="row">
      <div class="col-8">
        <div class="row">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="row">

                <div> # claps</div>

                    by <strong class="pl-2"><a href="/{{ $post->user->username }}">{{ $post->user->username }}</a></strong>
                    <img src="" alt=""> avatar



                          </div>
                          <div class="row">
                            {{ $post->caption }}
                          </div>
                            <hr>
                <div class="row">
                  calender icon {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                </div>
                <div class="row">
                  Category: <span class="pl-2">i have to add category of the image</span>
                </div>


      </div>
    </div>
</div>

@endsection
