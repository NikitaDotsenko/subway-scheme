<template>
    <layout>
        <div class="edit-form">
            <form method="post" v-on:submit.prevent="onSubmit($event)">
                <text-input v-model="form.name" class="" label="Name" />
                <input type="submit">
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import TextInput from '@/Shared/TextInput'

    export default {
        name: "StationEdit",
        components: {
            TextInput,
            Layout,
        },
        props: {
            station: null
        },
        data(){
            return {
                form:{
                    name:this.station.name
                }
            }
        },
        methods:{
            onSubmit(event){

            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
