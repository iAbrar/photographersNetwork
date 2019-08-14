@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add new Post</h3>
    <form action="/post" enctype="multipart/form-data" method="post">
        @csrf <!-- need to remove -->
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-form-label ">Post Caption</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="row">

                    <label for="image" class="col-form-label ">Post Image</label>

                    <input type="file" class="form-control-file" name="image" id="image">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-5">
                    <button class="btn btn-primary">New Post</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
