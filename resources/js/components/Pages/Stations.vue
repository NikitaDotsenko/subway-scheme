<template>
    <layout>
        <Canvas :stations="{redBranch:this.redBranch,blueBranch:this.blueBranch,greenBranch:this.greenBranch}"
                class="canvas"></Canvas>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import Canvas from "@/Pages/Stations/Canvas";

    export default {
        components: {
            Canvas,
            Layout,
        },
        props: {
            'blueBranch': null,
            'redBranch': null,
            'greenBranch': null
        },
    }
</script>
