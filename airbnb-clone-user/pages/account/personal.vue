<template>
    <div class="px-5 md:px-12 lg:px-16 xl:px-20">
        <div class="min-h-screen bg-white">
            <div class="my-10">
                <span class="text-xl md:text-3xl font-extrabold text-zinc-600">Personal Info</span>
            </div>
            <div class="relative my-2">

                <div class="border-b" v-for="x, key in info" :key="key">
                    <div class="py-6 flex">
                        <div class="flex flex-col flex-1 w-full">
                            <div>{{ x.name }}</div>
                            <div class="text-zinc-500 text-sm">{{ x.value }}</div>
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
                    <form method="post">
                        <div>
                            <div class="form-control">
                                <label for="" class="label">
                                    <span class="label-text">{{ y.name }}</span>
                                </label>
                                <input type="email" name="email" class="input input-bordered">
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
            user: null,
            info: [
                {
                    name: "Name",
                    value: 'John Doe',
                    id: "name_modal",
                    submit: "name_submit",
                },
                {
                    name: "Email",
                    value: '',
                    id: "email_modal",
                    submit: "email_submit",
                },
                {
                    name: "Phone",
                    value: "",
                    id: "phone_modal",
                    submit: "phone_submit",
                },
                {
                    name: "Address",
                    value: "",
                    id: "address_modal",
                    submit: "address_submit",
                },
                {
                    name: "City",
                    value: "",
                    id: "city_modal",
                    submit: "city_submit",
                },
                {
                    name: "State",
                    value: "",
                    id: "state_modal",
                    submit: "state_submit",
                },
                {
                    name: "Zip",
                    value: "",
                    id: "zip_modal",
                    submit: "zip_submit",
                },
                {
                    name: "Country",
                    value: "",
                    id: "country_modal",
                    submit: "country_submit",
                },
            ]
        }
    },
    mounted() {
        this.user = this.$store.state.user.user.length > 0 ? this.$store.state.user.user[0].data : null;
        console.log(this.user);
    },
}
</script>

<style>
</style>