<template>
  <div class="sticky top-0 w-full h-20 z-20 bg-white shadow-sm">
    <header class="relative w-full h-20">
      <div class="flex justify-between items-center relative w-full h-full md:px-20">
        <div class="hidden md:flex flex-[1_0_140px]">
          <router-link to="/">
            <Logo></Logo>
          </router-link>
        </div>
        <div class="text-center px-6 flex-[0_1_auto]">
          <div class="inline-flex items-center rounded-full bg-white shadow-sm border hover:shadow-md">
            <button class="h-12 px-4 pl-6">
              <span class="text-black text-sm">Anywhere</span>
            </button>
            <button class="h-12 px-4 border-x">
              <span class="text-black text-sm">Anyweek</span>
            </button>
            <button class="h-12 flex items-center">
              <span class="text-sm px-4">Add Guest</span>
              <div class="bg-red-500 p-2 m-2 rounded-full">
                <svg class="block w-4 h-4 text-white fill-inherit stroke-current stroke-[5.3]" viewBox="0 0 32 32"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false">
                  <g fill="none">
                    <path
                      d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9">
                    </path>
                  </g>
                </svg>
              </div>
            </button>
          </div>
        </div>
        <div class="hidden md:block flex-[1_0_140px]">
          <div class="flex justify-end items-center relative">
            <div class="flex justify-end mr-2">
              <a href="" class="text-black p-3 text-sm md:text-base rounded-full hover:bg-gray-100">Become a Host</a>
            </div>
            <div>
              <div class="inline-block relative dropdown dropdown-end">
                <button
                  class="border rounded-3xl inline-flex items-center p-1 pl-3 text-black stroke-black hover:shadow-md"
                  tabindex="0">
                  <div>
                    <svg class="block w-4 h-4 fill-inherit text-black" viewBox="0 0 32 32"
                      xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false">
                      <g fill="none" fill-rule="nonzero">
                        <path d="m2 16h28"></path>
                        <path d="m2 24h28"></path>
                        <path d="m2 8h28"></path>
                      </g>
                    </svg>
                  </div>
                  <div class="h-8 w-8 ml-3 relative">
                    <img class="rounded-full" v-if="user" :src="user.profile_photo_url" alt="" />
                    <div class="text-zinc-400" v-else>
                      <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation"
                        focusable="false" style="display: block; height: 100%; width: 100%; fill: currentcolor;">
                        <path
                          d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z">
                        </path>
                      </svg>
                    </div>
                  </div>
                </button>
                <div tabindex="0" class="dropdown-content menu bg-white p-2 shadow-xl rounded-box w-52 mt-3">
                  <div v-if="user">
                    <a href="" class="px-4 py-3 flex items-center text-black hover:bg-gray-100">
                      Message
                    </a>
                    <a href="" class="px-4 py-3 flex items-center text-black hover:bg-gray-100">
                      Trips
                    </a>
                    <router-link to="/account" class="px-4 py-3 flex items-center text-black hover:bg-gray-100">
                      Account
                    </router-link>
                  </div>
                  <div v-else>
                    <label for="login_modal"
                      class="modal-button px-4 py-3 w-full flex items-center text-black hover:bg-gray-100">
                      Login
                    </label>
                    <label for="register_modal" class="px-4 py-3 w-full flex items-center text-black hover:bg-gray-100">
                      Register
                    </label>
                  </div>
                  <div class="border-t">
                    <a href="" class="px-4 py-3 flex items-center hover:bg-gray-100">
                      Help
                    </a>
                    <form @submit.prevent="logout" method="post" v-if="user">
                      <button type="submit" class="px-4 py-3 flex items-center hover:bg-gray-100 w-full">
                        Log out
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <Login :id="'login_modal'"></Login>

    <Register :id="'register_modal'"></Register>

  </div>
</template>

<script>
import Logo from './Logo.vue'
import Login from './Login.vue'
import Register from './Register.vue'
export default {
  components: { Logo, Login, Register },
  props: ['user'],
  data() {
    return {
      data: null
    }
  },
  methods: {
    logout() {
      localStorage.removeItem('user_token')
      window.location.href = '/'
    }
  },
  mounted() {

  }
}
</script>

<style>
</style>
