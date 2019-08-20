@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <h3 class="col-10 mx-auto p-5">Timeline </h3>

        <div id="justify-gallery" class="col-10 mx-auto">
            @foreach ($posts as $post)
            <a href="/posts/{{$post->id}}"> <img src="/storage/{{$post->image }}" alt="">
            </a>
            @endforeach

        </div>
    </div>
</div>
@endsection
