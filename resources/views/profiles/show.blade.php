@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="text-center">
        <img src="/storage/{{ $user->profile->avatar}}" class="rounded-circle" width="100px;" alt="">
        <!--profile image-->
        <div class="">
            {{ $user->name }}
        </div>
        <div class="">
            {{ $user->profile->bio }}
        </div>
        <div class="">
            {{ $user->posts->count() }} posts # claps # photoviews
        </div>
        <div class="">
            <a href="{{ $user->profile->url}}"> {{ $user->profile->url}}</a>
        </div>
        <div class="row">
            <div class="col-4">
                <h5>Availabilities</h5>
                {{ $user->profile->avaliableToHire }}
            </div>
            <div class="col-4">
                <h5>Cameras</h5>
            </div>
            <div class="col-4">
                <h5>Specialties</h5>
            </div>
        </div>
    </div>

    <div class="row">

      <div id="justify-gallery" class="col-10 mx-auto">
        @foreach ($user->posts as $post)

            <a href="/posts/{{ $post->id }}"><img src="/storage/{{ $post-> image}}" alt=""></a>

        @endforeach
      </div>

    </div>
</div>
@endsection
