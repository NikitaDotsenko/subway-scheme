<template>
    <transition name="modal">
        <div class="modal-container" v-bind:style="styleObject">

            <div class="modal-header">
                <slot name="header">
                    <p>{{this.station.name}}</p>
                </slot>
            </div>

            <div class="modal-body">
                <slot name="body">
                    <p>{{this.station.description}}</p>
                </slot>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "StationDataModal",
        props: {
            station: {},
            coords: null
        },
        data() {
            return {
                styleObject: {
                    top: this.coords[1]+15 + 'px',
                    left: this.coords[0]-100 + 'px'
                }
            }
        }
    }
</script>

<style scoped>

</style>
