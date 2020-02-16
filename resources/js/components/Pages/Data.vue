<template>
    <layout>
        <div class="data-content">
            <div class="data-column">
                <p class="data-column-header">
                    Branches
                </p>
                <ul id="example-2">
                    <li v-for="(item) in this.branches" v-bind:key="item.id">
                        <inertia-link v-bind:href="'branch/'+item.id+'/edit'">{{item.name}}</inertia-link>
                    </li>
                </ul>
            </div>
            <div class="data-column">
                <p class="data-column-header">
                    Stations
                </p>
                <ul id="example-1">
                    <li v-for="(item) in this.stations" v-bind:key="item.id">
                        <inertia-link v-bind:href="'station/'+item.id+'/edit'">{{item.name}}</inertia-link>
                    </li>
                </ul>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'

    export default {
        name: "Data",
        components: {
            Layout,
        },
        props: {
            'branches': null,
            'stations': null
        }
    }
</script>

<style scoped>

</style>
