@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Time Line </h3>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-4 pt-3">
            <a href="/posts/{{$post->id}}"> <img src="/storage/{{$post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach

    </div>

</div>

@endsection
