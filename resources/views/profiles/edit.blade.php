@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit profile</h3>
    <form action="/profile/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
        @csrf <!-- need to remove -->
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="bio" class="col-form-label ">Biography</label>

                    <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->profile->bio }}" required autocomplete="bio" autofocus>

                    @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="url" class="col-form-label ">Website</label>

                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="row">

                    <label for="avatar" class="col-form-label ">Profile avatar</label>

                    <input type="file" class="form-control-file" name="avatar" id="avatar">

                    @error('avatar')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-5">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
