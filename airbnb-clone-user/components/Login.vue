<template>
    <div>
        <input type="checkbox" :id="id" class="modal-toggle" />
        <label :for="id" class="modal modal-bottom sm:modal-middle cursor-pointer">
            <label class="modal-box relative" for="">
                <h3 class="text-lg font-bold">Login</h3>
                <form @submit.prevent="login" method="post">
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="email" name="email" v-model="email" class="input input-bordered"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input type="password" name="password" v-model="password" class="input input-bordered"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="form-control">
                            <button type="submit" class="btn bg-pink-600 border-0">Continue</button>
                        </div>
                    </div>
                </form>
            </label>
        </label>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        async login() {
            try {
                await this.$auth.loginWith('local', {
                    data: {
                        email: this.email,
                        password: this.password,
                    }
                }).then((result) => {
                    this.$auth.setUser(result.data.user)
                    // console.log(this.$auth.user);
                    const login_modal = document.querySelector('#login_modal');
                    login_modal.click();
                })
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
        this.$axios.$get('/sanctum/csrf-cookie');
    }
}
</script>

<style>
</style>