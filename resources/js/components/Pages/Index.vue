<template>
    <layout>
        <h1>Welcome</h1>
        <p>Welcome to my first Inertia.js app!</p>
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
            'event':null
        }
    }
</script>
