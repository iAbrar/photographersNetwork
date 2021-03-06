@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('general.post.editPost') }}</div>
                <div class="card-body">
                    <form action="{{ route('post.update',['post' => $post]) }}" enctype="multipart/form-data" method="post">
                        @method('PATCH')
                        @csrf <!-- need to remove -->

                        <div class="row">
                            <div class="col-8 offset-2  mx-auto">
                                <div class="form-group row">
                                    <label for="caption" class="col-form-label ">{{ __('general.post.PostCaption') }}</label>

                                    <textarea rows="4" id="caption" class="form-control" name="caption">{{ $post->caption }}</textarea>

                                    @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5 custom-btn-group mt-4 ">
                                <button class="btn custom-btn custom-btn-bg custom-btn-link">{{ __('general.post.editPost') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
