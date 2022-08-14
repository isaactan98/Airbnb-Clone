<template>
    <div class="min-h-screen">
        <div v-if="this.data == null" class="pt-9">
        </div>
        <div class="pt-9 container mx-auto" v-else>
            <div class="py-3 px-6">
                <div class="mb-4">
                    <img :src="this.data.profile_photo_url" class="rounded-full" alt="">
                </div>
                <div>
                    <h1>{{ this.data.name }}</h1>
                </div>
            </div>
            <div class="px-6">
                <div class="mt-4">
                    <div class="border-b pb-4">
                        <router-link to="/account/personal">
                            <div class="flex justify-between">
                                <div>Personal Info</div>
                                <div>
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        role="presentation" focusable="false"
                                        style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 4; overflow: visible;">
                                        <g fill="none">
                                            <path
                                                d="m12 4 11.2928932 11.2928932c.3905243.3905243.3905243 1.0236893 0 1.4142136l-11.2928932 11.2928932">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 mt-4 block md:hidden">
            <form @submit.prevent="logout" method="post">
                <button class="btn btn-outline w-full" type="submit">Log Out</button>
            </form>
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
            data: null,
        }
    },
    methods: {
        logout() {
            localStorage.removeItem('user_token')
            window.location.href = '/'
        }
    },
    mounted() {
        let token = localStorage.getItem('user_token') ?? null
        if (token != null) {
            this.$axios.$post('/api/user_token', {
                user_token: token
            }).then((result) => {
                this.data = result
            }).catch((error) => {
                console.log(error);
            })
        } else {
            window.location.href = '/'
        }
    }

}
</script>

<style>
</style>