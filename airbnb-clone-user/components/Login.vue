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
                        <span id="login_err"></span>
                    </div>
                    <div class="mt-2">
                        <div class="form-control">
                            <button type="submit" id="submit_btn" class="btn bg-pink-600 border-0">Continue</button>
                        </div>
                    </div>
                </form>
                <div class="mt-2 block md:hidden">
                    <label for="register_modal" id="small_register_link">
                        <span>Haven't Register?</span>
                    </label>
                </div>
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
            token: '',
        }
    },
    methods: {
        async login() {
            const submit_btn = document.getElementById('submit_btn');
            submit_btn.classList.add('loading');
            try {
                await this.$auth.loginWith('laravelSanctum', {
                    data: {
                        email: this.email,
                        password: this.password,
                    }
                }).then((result) => {
                    // this.$auth.setUser(result.data.user)
                    this.$store.commit('user/add', result.data.user)
                    console.log(this.$store.state.user.user);
                    submit_btn.classList.remove('loading');
                    const login_modal = document.querySelector('#login_modal');
                    login_modal.click();
                }).catch((e) => {
                    console.log(e);
                })
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
        // this.$axios.$get('/api/token/csrf').then((result) => {
        //     this.token = result
        // });
        const small_register = document.querySelector('#small_register_link');
        small_register.addEventListener('click', (e) => {
            const login_modal = document.querySelector('#login_modal');
            login_modal.click();
        });
    }
}
</script>

<style>
</style>