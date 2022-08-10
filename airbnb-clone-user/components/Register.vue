<template>
    <div>
        <input type="checkbox" :id="id" class="modal-toggle" />
        <label :for="id" class="modal modal-bottom sm:modal-middle cursor-pointer">
            <label class="modal-box relative" for="">
                <h3 class="text-lg font-bold">Register</h3>
                <form action="" method="post">
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input type="text" class="input input-bordered" placeholder="Your Name">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="email" class="input input-bordered" placeholder="Email Address">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input type="password" class="input input-bordered" placeholder="Password">
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Confirm Password</span>
                            </label>
                            <input type="password" class="input input-bordered" placeholder="Password Confirmation">
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
}
</script>

<style>
</style>