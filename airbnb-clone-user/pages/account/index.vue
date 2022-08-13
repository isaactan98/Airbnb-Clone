<template>
    <div class="min-h-screen">
        <div class="pt-9">
            <div class="py-3 px-6">
                <div class="mb-4">
                    <img :src="this.$auth.user.profile_photo_url" class="rounded-full" alt="">
                </div>
                <div>
                    <h1>{{ this.$auth.user.name }}</h1>
                </div>
            </div>
            <div class="px-6">
                <div class="mt-4">
                    <div class="border-b pb-4">
                        <router-link to="/account/personal">
                            <div class="flex justify-between">
                                <div>Personal Info</div>
                                <div>></div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 mt-4">
            <form @submit="logout" method="post">
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
    methods: {
        async logout() {
            await this.$auth.logout().then(() => {
                window.location.href = "/";
            });
        }
    },

}
</script>

<style>
</style>