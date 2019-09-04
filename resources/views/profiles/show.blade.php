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
        <follow-button user-id="{{ $user->id }}"  follow=" {{ $follows }} "><follow-button> <!-- I need to check this and know how to change the value of $follows -->
      </div>

        <p class="text-muted ">
            {{ $user->profile->bio }}
        </p>
        <p class="d-flex col-lg-8 justify-content-between m-auto">
            <span><strong>{{ $user->posts->count() }}</strong> posts</span>
            <span><strong>{{ $user->profile->followers->count() }}</strong> {{ trans_choice('general.profile.followers',$user->profile->followers->count()) }}</span>
            <span><strong>{{ $user->following->count() }}</strong> {{ trans_choice('general.profile.following', $user->following->count()) }}</span>
            <span><strong>#</strong> {{ trans_choice('general.post.claps', 0) }}</span> <!-- add # of claps -->
        </p>
        <p class="pt-3">
          @if ($user->profile->is_available)
          <span><span class="icon-work"></span>{{ __('general.profile.AvailabeToHire') }}</span>
          @endif
        </p>
        <p class="">
            <a href="{{ $user->profile->url}}"> {{ $user->profile->url}}</a>
        </p>

    </div>
    @if(Session::has('success'))
    <div class="alert alert-success col-md-8 mx-auto" role="alert">
        <strong>{{ __('general.Success')}}</strong>{{ Session::pull('success') }}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger col-md-8 mx-auto" role="alert">
        <strong>{{ __('general.Error')}}</strong>{{ Session::pull('error') }}
    </div>
    @endif
    <div class="row bg-white">

        <div id="justify-gallery" class="col-10 mx-auto">
            @foreach ($user->posts as $post)

            <a href="{{ route('post.show',['post'=> $post ]) }}"><img src="/storage/{{ $post-> image}}" alt=""></a>

            @endforeach
        </div>

    </div>
</div>
@endsection
