@extends('master')

@section('content')
    @include('sidebar')
    <section class="col-lg-9 row" id="posts">
        @if(session("upload"))
            <input id="upload" type="hidden" value="{{ session("upload") }}"/>
        @else
            <input id="upload" type="hidden" value="false"/>
        @endif
        <extra-posts></extra-posts>
        @foreach($logs->reverse() as $log)
            @if($_SERVER["REMOTE_USER"] === $log->username || \Illuminate\Support\Facades\Request::path() === 'public')
                <article class="offset-1 col-lg-11 row mb-2 mt-2">
                    <div class="col-lg-5 row">
                        <h2 class="col-lg-12">{{ $log->messier_object }}</h2>
                        <h3 class="col-lg-12">Telescope</h3>
                        <div class="col-lg-12">
                            <p>Type: {{ $log->telescope_type }}</p>
                            <p>Aperture (mm): {{ $log->aperture }}</p>
                            <p>Focal length (mm): {{ $log->focal_length }}</p>
                        </div>
                        <h3 class="col-lg-12">Camera</h3>
                        <div class="col-lg-12">
                            <p>{{ $log->camera }}</p>
                        </div>
                        <h3 class="col-lg-12">Image</h3>
                        <div class="col-lg-12">
                            <p>No. of images: {{ $log->no_of_images }}</p>
                            <p>Exposure time (s): {{ $log->exposure_time }}</p>
                        </div>
                        <h3 class="col-lg-12">Date and location</h3>
                        <div class="col-lg-12">
                            <p>{{ $log->location }}</p>
                            <p>{{ $log->date }}</p>
                        </div>
                    </div>
                    <figure class="col-lg-7 figure text-center align-middle"><img
                                class="img-fluid figure-img align-middle" src="{{ asset('images/'.$log->image) }}"/>
                    </figure>
                </article>
            @endif
        @endforeach
    </section>
@endsection