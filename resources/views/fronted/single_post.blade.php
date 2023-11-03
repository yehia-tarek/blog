@extends('fronted.layout')

@section('content')
<div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">{{$post->title}}</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col-12 col-md-12 md-pb col-lg-6 image-wrapper">
                <img src="/images/{{$post->image}}" alt="photo"  width="300px" height="300px">
            </div>
            <div class="counter-container m-auto col-12 col-md-12 col-lg-6">

                <h2 class="mbr-section-title align-left mbr-fonts-style mb-3 display-2"><strong>{{$post->title}}</strong></h2>
                <p class="mbr-text align-left mbr-fonts-style mb-4 display-7">{!! html_entity_decode($post->body) !!}</p>
            </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-end">
        <div class="col-12 col-md-12 md-pb col-lg-6 image-wrapper">
            <img src="assets/images/features2.jpg" alt="Mobirise">
        </div>
        <div class="counter-container m-auto col-12 col-md-12 col-lg-6">

            <h2 class="mbr-section-title align-left mbr-fonts-style mb-3 display-2"><strong>{{$post->title}}</strong></h2>
            <p class="mbr-text align-left mbr-fonts-style mb-4 display-7">{!! html_entity_decode($post->body) !!}</p>
        </div>
    </div>
</div> --}}
@endsection
