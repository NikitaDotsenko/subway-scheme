<template>
    <layout>
        <div class="edit-form">
            <form @submit.prevent="onSubmit()">
                <text-input v-model="form.name" class="" label="Name"/>
                <select-input v-model="form.branch_id" class="" label="Branch">
                    <option v-for="branch in branches" :key="branch.id" :value="branch.id">{{ branch.name }}</option>
                </select-input>
                <input type="file" id="file" @change="processLogo" name="logo">
                <loading-button type="submit">отправить</loading-button>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import TextInput from '@/Shared/TextInput'
    import SelectInput from '@/Shared/SelectInput'
    import LoadingButton from '@/Shared/LoadingButton'

    export default {
        name: "StationEdit",
        components: {
            SelectInput,
            TextInput,
            Layout,
            LoadingButton,
        },
        props: {
            station: Object,
            branches: Array
        },
        data() {
            return {
                form: {
                    name: this.station.name,
                    branch_id: this.station.branch_id,
                    logo: File,
                    _method:'put'
                },
                sending: window.loading,

            }
        },
        methods: {
            onSubmit() {
                let formData = new FormData();

                for (let elem in this.form) {
                    formData.append(elem, this.form[elem])
                }

                this.$inertia.post(this.route('station.update', this.station.id), formData, {}, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.getElementsByName('csrf-token'),
                        'Accept': 'application/json'
                    }
                })

            },

            processLogo(event) {
                this.form.logo = event.target.files[0]
            },

        }
    }
</script>

