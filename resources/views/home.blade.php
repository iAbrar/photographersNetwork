@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="text-center">

        @if ($user->posts->count() == 0 )

            <img src="{{ asset('images/placeholder.png') }}" class="" alt="">
            <p>You haven't uploaded any photos yet.</p>
            <span>Get the most out of Lens• by uploading your photos and be seen by our global community.</span>

        <div class="form-group">
            <div class="custom-btn-group mt-4">
                <a href="{{ url('/posts/create')}}" class="btn custom-btn custom-btn-bg custom-btn-link">New Post</a>
            </div>
        </div>
        @else
          <h4 class="py-5">Your photos</h4>
        <div id="justify-gallery" class="w-75 m-auto">
            @foreach ($user->posts as $post)

            <a href="/posts/{{ $post->id }}"><img src="/storage/{{ $post-> image}}" alt=""></a>

            @endforeach
        </div>
        @endif

    </div>
</div>
@endsection
