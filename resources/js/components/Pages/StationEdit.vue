<template>
    <layout>
        <div class="edit-form">
            <form @submit.prevent="onSubmit($event)">
                <text-input v-model="form.name" class="" label="Name"/>
                <select-input v-model="form.branch_id" class="" label="Branch">
                    <option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
                </select-input>
                <input type="file" @change="processLogo($event)" name="logo">
                <input type="submit">
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import TextInput from '@/Shared/TextInput'
    import SelectInput from '@/Shared/SelectInput'

    export default {
        name: "StationEdit",
        components: {
            SelectInput,
            TextInput,
            Layout,
        },
        props: {
            station: Object,
            branches: Array
        },
        data() {
            return {
                sending: false,
                form: {
                    name: this.station.name,
                    branch_id: this.station.branch_id,
                    logo: null
                }
            }
        },
        methods: {
            onSubmit(event) {
                this.sending = true;
                this.$inertia.put(this.route('station.update', this.station.id), this.form,{}, {headers: {'Content-Type': 'multipart/form-data'}})
            },
            processLogo(event) {
                this.form.logo = event.target.files[0]
            }

        },
        mounted() {
        }
    }
</script>

<style scoped>

</style>
