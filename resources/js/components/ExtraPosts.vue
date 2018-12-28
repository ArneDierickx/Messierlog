<template>
    <div v-html="display()">{{receive()}}</div>
</template>

<script type="module">
    import * as factory from "../../../public/js/classes";
    import {filter} from "../../../public/js/script"

    export default {
        data: function () {
            return {
                extraposts: [],
                hasEventListener: false
            }
        },
        methods: {
            display: function () {
                let html = "";
                this.extraposts.forEach(post => {
                    html += post.formatToHTML();
                });
                return html;
            },
            receive: function () {
                if (!this.hasEventListener) {
                    window.socket.addEventListener("message", message => {
                        const json = JSON.parse(message.data);
                        let messierlog = factory.createMessierlog(json.messier_object, json.telescope_type, json.aperture,
                            json.focal_length, json.camera, json.no_of_images, json.exposure_time, json.location, json.date, json.image);
                        this.extraposts.unshift(messierlog);
                    });
                    this.hasEventListener = true;
                }
            },
            filterNewPosts: function () {
                filter();
            }
        },
    }
</script>

<style scoped>

</style>