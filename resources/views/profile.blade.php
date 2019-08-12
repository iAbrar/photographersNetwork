@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <img src="" alt="">
        <!--profile image-->
        <div class="">
            {{ $user->name }}
        </div>
        <div class="">
            {{ $user->profile->bio }}
        </div>
        <div class="">
            # posts # claps # photoviews
        </div>
        <div class="">
            <a href="">  {{ $user->profile->url}}</a>
        </div>
        <div class="row">
            <div class="col-4">
                <h5>Availabilities</h5>
                  {{ $user->profile->avaliableToHire }}
            </div>
            <div class="col-4">
                <h5>Cameras</h5>
            </div>
            <div class="col-4">
                <h5>Specialties</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-image_large.png?v=1530129081" class="w-100" alt="">
                </div>
                <div class="col-4">
                    <img src="https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-image_large.png?v=1530129081" class="w-100" alt="">
                </div>
                <div class="col-4">
                    <img src="https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images-image_large.png?v=1530129081" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
