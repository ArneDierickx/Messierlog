"use strict";

document.addEventListener("DOMContentLoaded", init);

function init() {
    hideFilter();
}

function hideFilter() {
    if (window.location.pathname === "/" || window.location.pathname === "/public") {
        document.querySelector("#filter").style.visibility = "visible";
    }
}