<template>
    <layout>
        <Canvas class="canvas"></Canvas>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import Canvas from "./Index/Canvas";

    export default {
        components: {
            Canvas,
            Layout,
        },
        props:{
            'blueBranch':null,
            'redBranch':null,
            'greenBranch':null
        },
    }
</script>
