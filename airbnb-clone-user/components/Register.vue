<template>
    <div>
        <input type="checkbox" :id="id" class="modal-toggle" />
        <label :for="id" class="modal modal-bottom sm:modal-middle cursor-pointer">
            <label class="modal-box relative" for="">
                <h3 class="text-lg font-bold">Register</h3>
                <form @submit.prevent="register" method="post">
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input type="text" class="input input-bordered" v-model="name" placeholder="Your Name">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="email" class="input input-bordered" v-model="email"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input type="password" class="input input-bordered" v-model="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Confirm Password</span>
                            </label>
                            <input type="password" class="input input-bordered" v-model="password_confirmation"
                                placeholder="Password Confirmation">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="form-control">
                            <button type="submit" id="register_btn" class="btn bg-pink-600 border-0">Continue</button>
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
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },
    methods: {
        async register() {
            const register_btn = document.getElementById('register_btn');
            register_btn.classList.add('loading');
            try {
                this.$axios.$post('/api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                }).then((result) => {
                    const register_modal = document.querySelector('#register_modal');
                    register_modal.click();
                    const login_modal = document.querySelector('#login_modal');
                    login_modal.click();
                    console.log(result);
                })
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>

<style>
</style>