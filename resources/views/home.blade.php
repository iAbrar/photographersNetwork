@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="text-center">

        @if ($user->posts->count() == 0 )

            <img src="{{ asset('images/placeholder.png') }}" class="" alt="">
            <p>{{ __('general.youHaventUploaded') }}</p>
            <span>{{ __('general.getMost') }}</span>

        <div class="form-group">
            <div class="custom-btn-group mt-4">
                <a href="{{route('post.create')}}" class="btn custom-btn custom-btn-bg custom-btn-link">{{ __('general.newPost') }}</a>
            </div>
        </div>
        @else
          <h4 class="py-5">{{ __('general.YourPhotos')}}</h4>
        <div id="justify-gallery" class="w-75 m-auto">
            @foreach ($user->posts as $post)

            <a href="{{ route('post.show', ['post' => $post]) }}"><img src="/storage/{{ $post-> image}}" alt=""></a>

            @endforeach
        </div>
        @endif

    </div>
</div>
@endsection
