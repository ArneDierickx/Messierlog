@extends('master')

@section('content')
    @include('sidebar')
    <section id="posts">
        @foreach($logs->reverse() as $log)
            <article>
                <div>
                    <h2>{{ $log->messier_object }}</h2>
                    <h3>Telescope</h3>
                    <div>
                        <p>Type: {{ $log->telescope_type }}</p>
                        <p>Aperture (mm): {{ $log->aperture }}</p>
                        <p>Focal length (mm): {{ $log->focal_length }}</p>
                    </div>
                    <h3>Camera</h3>
                    <div>
                        <p>{{ $log->camera }}</p>
                    </div>
                    <h3>Image</h3>
                    <div>
                        <p>No. of images: {{ $log->no_of_images }}</p>
                        <p>Exposure time (s): {{ $log->exposure_time }}</p>
                    </div>
                    <h3>Date and location</h3>
                    <div>
                        <p>{{ $log->location }}</p>
                        <p>{{ $log->date }}</p>
                    </div>
                </div>
                <figure><img src="{{ asset('images/'.$log->image) }}"/></figure>
            </article>
        @endforeach
    </section>
@endsection