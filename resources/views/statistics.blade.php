@extends('master')

@section('content')
    @include('sidebar')
    <section id="canvas" class="col-lg-9">
    <canvas data-json="{{\App\Logs::all("messier_object")}}"></canvas>
    </section>
@endsection