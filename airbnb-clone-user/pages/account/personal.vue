<template>
    <div class="container mx-auto px-5 md:px-12 lg:px-16 xl:px-20">
        <div class="min-h-screen bg-white">
            <div class="my-10">
                <span class="text-xl md:text-3xl font-extrabold text-zinc-600">Personal Info</span>
            </div>
            <div class="relative my-2" v-if="this.user == null">
                <div class="bg-zinc-200 py-20 px-10 rounded-md animate-pulse"></div>
            </div>
            <div class="relative my-2" v-else>

                <div class="border-b" v-for="x, key in info" :key="key">
                    <div class="py-6 flex" v-if="user.hasOwnProperty(x.uuid)">
                        <div class="flex flex-col flex-1 w-full">
                            <div>{{ x.name }}</div>
                            <div class="text-zinc-500 text-sm">
                                {{ user[x.uuid] }}
                            </div>
                        </div>
                        <div class="ml-4 max-w-[30%] text-right">
                            <label :for="x.id" class="underline cursor-pointer">Edit</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="" v-for="y, key in info" :key="key">
            <input type="checkbox" :id="y.id" class="modal-toggle" />
            <label :for="y.id" class="modal modal-bottom sm:modal-middle cursor-pointer">
                <label class="modal-box relative" for="">
                    <h3 class="text-lg font-bold">{{ y.name }}</h3>
                    <form @submit.prevent="update(y)" method="post">
                        <div>
                            <div class="form-control">
                                <input :type="y.type" :name="y.uuid" class="input input-bordered"
                                    v-if="user.hasOwnProperty(y.uuid)" :value="user[y.uuid]" autocomplete="off"
                                    v-model="user[y.uuid]">
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-control">
                                <button type="submit" :id="y.submit" class="btn bg-pink-600 border-0">Save</button>
                            </div>
                        </div>
                    </form>
                </label>
            </label>
        </div>
    </div>
</template>

<script>
export default {
    head() {
        return {
            title: "Personal Info",
        };
    },
    data() {
        return {
            user: [],
            info: [
                {
                    name: "Name",
                    uuid: "name",
                    value: 'John Doe',
                    id: "name_modal",
                    submit: "name_submit",
                    type: "text",
                },
                {
                    name: "Phone",
                    value: "",
                    uuid: "phone",
                    id: "phone_modal",
                    submit: "phone_submit",
                    type: "tel",
                },
                {
                    name: "Address",
                    value: "",
                    uuid: "address",
                    id: "address_modal",
                    submit: "address_submit",
                    type: "text",
                },
                {
                    name: "City",
                    value: "",
                    uuid: "city",
                    id: "city_modal",
                    submit: "city_submit",
                    type: "text",
                },
                {
                    name: "State",
                    value: "",
                    uuid: "state",
                    id: "state_modal",
                    submit: "state_submit",
                    type: "text",
                },
                {
                    name: "Zip",
                    value: "",
                    uuid: "zip",
                    id: "zip_modal",
                    submit: "zip_submit",
                    type: "text",
                },
                {
                    name: "Country",
                    value: "",
                    uuid: "country",
                    id: "country_modal",
                    submit: "country_submit",
                    type: "text",
                },
            ]
        }
    },
    mounted() {
        let token = localStorage.getItem('user_token') ?? null
        if (token != null) {
            this.$axios.$post('/api/user_token', {
                user_token: token
            }).then((result) => {
                this.user = result
            }).catch((error) => {
                console.log(error);
            })
        }
    },
    methods: {
        update(info) {
            const submit = document.getElementById(info.submit)
            submit.classList.add('loading')
            this.$axios.$post('/api/update/user', {
                user_token: localStorage.getItem('user_token'),
                [info.uuid]: this.user[info.uuid]
            }).then((result) => {
                submit.classList.remove('loading')
                const modal = document.getElementById(info.id);
                modal.click();
                this.$toast.success(result.message)
            }).catch((error) => {
                submit.classList.remove('loading')
                console.log(error);
            })
        }
    }
}
</script>

<style>
</style>