@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Post</h3>
    <form action="/posts/{{$post->id}}" enctype="multipart/form-data" method="post">
      {{ method_field('PATCH') }}
        @csrf <!-- need to remove -->

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-form-label ">Post Caption</label>

                    <textarea id="caption" class="form-control" name="caption">{{ $post->caption }}</textarea>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="row pt-3">
                    <button class="btn btn-primary">Edit Post</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
