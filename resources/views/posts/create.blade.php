@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">New Post</div>
                <div class="card-body">
                    <form action="/posts" enctype="multipart/form-data" method="post">
                        @csrf <!-- need to remove -->
                        <div class="form-group col-md-10 mx-auto">
                            <label for="caption" class=" col-form-label text-md-right">Post Caption</label>


                                <textarea id="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" required autocomplete="caption" autofocus></textarea>
                                @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                        </div>


                      <div class="form-group col-md-10 m-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="file">Upload</span>
                            </div>
                            <div class="custom-file ">
                                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="file">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>

                        </div>
                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                      </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 custom-btn-group mt-4">
                                <button class="btn custom-btn custom-btn-bg custom-btn-link">New Post</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>

@endsection
