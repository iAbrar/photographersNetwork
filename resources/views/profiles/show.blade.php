@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="w-50 m-auto text-center py-5">
        <img src="{{ $user->profile->avatar}}" class="rounded-circle" width="150px;" alt="">
        <!--profile image-->
        <h4 class="pt-4">
            {{ $user->name }}
        </h4>
        <p class="text-muted ">
            {{ $user->profile->bio }}
        </p>
        <p class="d-flex w-50 justify-content-between m-auto">
            <span><strong>{{ $user->posts->count() }}</strong> posts</span> <span><strong>#</strong> claps</span>
            @if ($user->profile->is_available)
            <span>Available for Hire</span>
            @endif

        </p>
        <p class="">
            <a href="{{ $user->profile->url}}"> {{ $user->profile->url}}</a>
        </p>

    </div>

    <div class="row bg-white">

        <div id="justify-gallery" class="col-10 mx-auto">
            @foreach ($user->posts as $post)

            <a href="/posts/{{ $post->id }}"><img src="/storage/{{ $post-> image}}" alt=""></a>

            @endforeach
        </div>

    </div>
</div>
@endsection
