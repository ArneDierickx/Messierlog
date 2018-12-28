class messierlog {
    constructor(messierObject, telescopeType, aperture, focalLength, camera, noOfImages, exposureTime, location, date, img) {
        this.messierObject = messierObject;
        this.telescopeType = telescopeType;
        this.aperture = aperture;
        this.focalLength = focalLength;
        this.camera = camera;
        this.noOfImages = noOfImages;
        this.exposureTime = exposureTime;
        this.location = location;
        this.date = date;
        this.img = img;
    }

    formatToHTML() {
        return `<article class="offset-1 col-lg-11 row mb-2 mt-2">
                <div class="col-lg-5 row">
                    <h2 class="col-lg-12">${this.messierObject}</h2>
                    <h3 class="col-lg-12">Telescope</h3>
                    <div class="col-lg-12">
                        <p>Type: ${this.telescopeType}</p>
                        <p>Aperture (mm): ${this.aperture}</p>
                        <p>Focal length (mm): ${this.focalLength}</p>
                    </div>
                    <h3 class="col-lg-12">Camera</h3>
                    <div class="col-lg-12">
                        <p>${this.camera}</p>
                    </div>
                    <h3 class="col-lg-12">Image</h3>
                    <div class="col-lg-12">
                        <p>No. of images: ${this.noOfImages}</p>
                        <p>Exposure time (s): ${this.exposureTime}</p>
                    </div>
                    <h3 class="col-lg-12">Date and location</h3>
                    <div class="col-lg-12">
                        <p>${this.location}</p>
                        <p>${this.date}</p>
                    </div>
                </div>
                <figure class="col-lg-7 figure text-center align-middle"><img class="img-fluid figure-img align-middle" src="images/${this.img}"/></figure>
            </article>`
    }
}

export function createMessierlog(messierObject, telescopeType, aperture, focalLength, camera, noOfImages, exposureTime, location, date, img) {
    return new messierlog(messierObject, telescopeType, aperture, focalLength, camera, noOfImages, exposureTime, location, date, img);
}