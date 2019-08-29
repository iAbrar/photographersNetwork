@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">Edit profile</div>
                <div class="card-body">
                    <form action="{{ route('profile.update',['user'=> Auth::user()->id]) }}" enctype="multipart/form-data" method="post">
                        @csrf <!-- need to remove -->
                        @method('PATCH')


                        <div class="form-group col-md-10 mx-auto">
                            <label for="bio" class="col-form-label ">Biography</label>

                            <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->profile->bio }}" required autocomplete="bio" autofocus>

                            @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group col-md-10 mx-auto">
                            <label for="url" class="col-form-label ">Website</label>

                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>

                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-10 offset-md-1">
                            <div class="form-check">
                                <input type="checkbox" name="is_available" value="1" class="form-check-input" id="is_available">
                                <label class="form-check-label" for="is_available">Availabe to hire </label>
                            </div>
                        </div>
                        <div class="form-group col-md-10 pt-3 m-auto">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="file">Upload</span>
                                </div>
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="avatar" id="avatar" aria-describedby="file">
                                    <label class="custom-file-label" for="avatar">Choose avatar</label>
                                </div>

                            </div>
                            @error('avatar')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5 custom-btn-group mt-4">
                                <button class="btn custom-btn custom-btn-bg custom-btn-link">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
