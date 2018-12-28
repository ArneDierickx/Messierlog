let filter;
(function () {

    "use strict";

    document.addEventListener("DOMContentLoaded", init);

    function init() {
        enableFilter();
        notifyUpload();
        setCanvasSize();
    }

    function setCanvasSize() {
        if (location.pathname === "/statistics") {
            resizeCanvas();
            window.addEventListener("resize", resizeCanvas);
        }
    }

    function resizeCanvas() {
        document.querySelector("canvas").height = document.querySelector("#canvas").clientHeight;
        document.querySelector("canvas").width = document.querySelector("#canvas").clientWidth;
        drawPieChart();
    }

    function notifyUpload() {
        if (document.location.pathname === "/personal" && document.querySelector("#upload").value === "true") {
            window.socket.onopen = function () {
                window.socket.send("upload");
            };
        }

    }

    function enableFilter() {
        if (window.location.pathname === "/personal" || window.location.pathname === "/public") {
            document.querySelector("#filter").style.visibility = "visible";
            document.querySelectorAll("select").forEach(elem => elem.addEventListener("change", filter));
            document.querySelector("input").addEventListener("change", filter);
        }
    }

    filter = function () {
        let allPosts = Array.from(document.querySelectorAll("#posts article"));
        allPosts.forEach(elem => elem.style.display = "flex");
        let typeOfTelescope = document.querySelector("#typeOfTelescope").value;
        let messierObject = document.querySelector("#messierObject").value;
        let date = document.querySelector("#date").value;
        if (messierObject !== "Messier object") {
            let postsToHide = allPosts.filter(elem => messierObject !== elem.querySelector("h2").innerHTML);
            postsToHide.forEach(elem => elem.style.display = "none");
        }
        if (typeOfTelescope !== "Type of telescope") {
            let postsToHide = allPosts.filter(elem => typeOfTelescope !== (elem.querySelector("div div p").innerHTML).split(" ")[1]);
            postsToHide.forEach(elem => elem.style.display = "none");
        }
        if (date !== "") {
            let postsToHide = allPosts.filter(elem => date !== elem.querySelector("div div:nth-child(9) p:nth-child(2)").innerHTML);
            postsToHide.forEach(elem => elem.style.display = "none");
        }
    };

    function drawPieChart() {
        if (location.pathname === "/statistics") {
            let canvas = document.querySelector("canvas");
            let ctx = canvas.getContext("2d");
            ctx.strokeStyle = "black";
            let data = JSON.parse(canvas.getAttribute("data-json"));
            let map = mapData(data);
            let totalAmount = 0;
            let startPoint = 0;
            for (let messierObject in map) {
                totalAmount += map[messierObject];
            }
            for (let messierObject in map) {
                ctx.fillStyle = "#00CBFF";
                ctx.beginPath();
                ctx.moveTo(canvas.clientWidth / 2, canvas.clientHeight / 2);
                ctx.arc(canvas.clientWidth / 2, canvas.clientHeight / 2, canvas.clientHeight / 2.5, startPoint, startPoint + (Math.PI * 2 * (map[messierObject] / totalAmount)), false);
                ctx.lineTo(canvas.clientWidth / 2, canvas.clientHeight / 2);
                ctx.fill();
                ctx.stroke();
                ctx.fillStyle = "black";
                ctx.font = "15px Arial";
                ctx.fillText(messierObject,
                    canvas.clientWidth / 2 + (canvas.clientHeight / 2.5 / 2) * Math.cos(startPoint + (Math.PI * 2 * (map[messierObject] / totalAmount)) / 2),
                    canvas.clientHeight / 2 + (canvas.clientHeight / 2.5 / 2) * Math.sin(startPoint + (Math.PI * 2 * (map[messierObject] / totalAmount)) / 2));
                ctx.closePath();
                startPoint += Math.PI * 2 * (map[messierObject] / totalAmount);
            }
        }
    }

    function mapData(data) {
        let map = {};
        data.forEach(function (elem) {
            let messierObject = elem.messier_object;
            if (map.hasOwnProperty(messierObject)) {
                map[messierObject] += 1
            } else {
                map[messierObject] = 1;
            }
        });
        return map;
    }
}());
export {filter};