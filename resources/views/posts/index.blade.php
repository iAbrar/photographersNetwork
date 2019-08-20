@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Time Line </h3>
    <div class="row">

      <div id="justify-gallery" class="col-10 mx-auto">
        @foreach ($posts as $post)

            <a href="/posts/{{$post->id}}"> <img src="/storage/{{$post->image }}" alt="">
            </a>

        @endforeach

    </div>
</div>
</div>

@endsection
