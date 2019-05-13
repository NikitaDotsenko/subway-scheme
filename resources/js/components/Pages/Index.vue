<template>
    <layout>
        <Canvas></Canvas>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import Canvas from "./Canvas";

    export default {
        components: {
            Canvas,
            Layout,
        },
        props:{
            'blueBranch':null
        },
    }
</script>
