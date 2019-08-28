@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-6 m-auto text-center py-5">
        <img src="{{ $user->profile->avatar}}" class="rounded-circle" width="150px;" alt="">
        <!--profile image-->
      <div class="my-4">
        <h4 class="pt-4 d-inline pr-3">
            {{ $user->name }}
        </h4>
        <follow-button user-id="{{ $user->id }}" @click='followUser' v-text="buttonText"><follow-button>
      </div>

        <p class="text-muted ">
            {{ $user->profile->bio }}
        </p>
        <p class="d-flex col-lg-6 justify-content-between m-auto">
            <span><strong>{{ $user->posts->count() }}</strong> posts</span> <span><strong>#</strong> claps</span>
            @if ($user->profile->is_available)
            <span><span class="icon-work"></span> Available to Hire</span>
            @endif

        </p>
        <p class="">
            <a href="{{ $user->profile->url}}"> {{ $user->profile->url}}</a>
        </p>

    </div>
    @if(Session::has('success'))
    <div class="alert alert-success col-md-8 mx-auto" role="alert">
        <strong>Success</strong>{{ Session::pull('success') }}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger col-md-8 mx-auto" role="alert">
        <strong>Eroor</strong>{{ Session::pull('error') }}
    </div>
    @endif
    <div class="row bg-white">

        <div id="justify-gallery" class="col-10 mx-auto">
            @foreach ($user->posts as $post)

            <a href="/posts/{{ $post->id }}"><img src="/storage/{{ $post-> image}}" alt=""></a>

            @endforeach
        </div>

    </div>
</div>
@endsection
