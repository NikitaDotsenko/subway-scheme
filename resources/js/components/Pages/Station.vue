<template>
    <layout>
        <div class="station-data-block">
            <p>{{station.name}}</p>
            <p><span>Ветка: </span>{{branch.name}}</p>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'

    export default {
        name: "Station",
        components: {
            Layout,
        },
        props: {
            station: null,
            branch: null
        }
    }
</script>

<style scoped>

</style>
