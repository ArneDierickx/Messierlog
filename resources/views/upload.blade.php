@extends('master')

@section('content')
    @include('sidebar')
    <section class="col-lg-9 row mb-2" id="form">
        <form class="offset-lg-3 col-lg-6 col-md-11 offset-md-1" enctype="multipart/form-data" method="post" action="{{ route("personal.store") }}">
            @csrf
            <div>
                <label for="messier object">Messier Object:</label>
                <select name="messier_object" id="messier object">
                    @for($i = 1; $i <= 110; $i++)
                        <option value="M{{ $i }}">M{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <fieldset>
                <legend>Telescope</legend>
                <div>
                    <label for="type">Type:</label>
                    <select name="telescope_type" id="type" required>
                        <option value="refractor">Refractor</option>
                        <option value="reflector">Reflector</option>
                    </select>
                </div>
                <div>
                    <label for="aperture">Aperture (mm):</label>
                    <input type="number" name="aperture" id="aperture" min="1" required/>
                </div>
                <div>
                    <label for="focal length">Focal length (mm):</label>
                    <input type="number" name="focal_length" id="focal length" min="1" required/>
                </div>
            </fieldset>
            <fieldset>
                <legend>Camera</legend>
                <div>
                    <label for="camera">Camera:</label>
                    <input type="text" name="camera" id="camera" required/>
                </div>
            </fieldset>
            <fieldset>
                <legend>Image</legend>
                <div>
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" required/>
                </div>
                <div>
                    <label for="no of images">No. of images:</label>
                    <input type="number" name="no_of_images" id="no of images" min="1" required/>
                </div>
                <div>
                    <label for="exposure time">Exposure time (s):</label>
                    <input type="number" name="exposure_time" id="exposure time" min="0" step="0.1" required/>
                </div>
            </fieldset>
            <fieldset>
                <legend>Date and location</legend>
                <div>
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" required/>
                </div>
                <div>
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" max="{{ date("Y-m-d") }}" required/>
                </div>
            </fieldset>
            <div><input type="submit" name="upload" value="Upload"/></div>
        </form>
    </section>
@endsection