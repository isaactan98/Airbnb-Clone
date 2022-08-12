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
                                <input type="email" name="email" v-model="email" class="input input-bordered">
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-control">
                                <button type="submit" id="submit_btn" class="btn bg-pink-600 border-0">Continue</button>
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
            title: "Account",
        };
    },
    data() {
        return {
            info: [
                {
                    name: "Name",
                    value: "Isaac Tan",
                    id: "name_modal"
                },
                {
                    name: "Email",
                    value: "",
                    id: "email_modal"
                },
                {
                    name: "Phone",
                    value: "",
                    id: "phone_modal"
                },
                {
                    name: "Address",
                    value: "",
                    id: "address_modal"
                },
                {
                    name: "City",
                    value: "",
                    id: "city_modal"
                },
                {
                    name: "State",
                    value: "",
                    id: "state_modal"
                },
                {
                    name: "Zip",
                    value: "",
                    id: "zip_modal"
                },
                {
                    name: "Country",
                    value: "",
                    id: "country_modal"
                },
            ]
        }
    }
}
</script>

<style>
</style>