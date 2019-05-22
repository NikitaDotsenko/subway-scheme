<template>
    <layout>
        <div>
            <p>{{name}}</p>
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
            name: '',
            branch: null
        }
    }
</script>

<style scoped>

</style>
