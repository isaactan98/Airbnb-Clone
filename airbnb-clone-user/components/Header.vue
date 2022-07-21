<template>
  <div class="sticky top-0 w-full h-20 z-20 bg-white shadow-sm">
    <header class="relative w-full h-20">
      <div
        class="
          flex
          justify-between
          items-center
          relative
          w-full
          h-full
          md:px-20
        "
      >
        <div class="hidden md:flex flex-[1_0_140px]">
          <router-link to="/">
            <Logo></Logo>
          </router-link>
        </div>
        <div class="text-center px-6 flex-[0_1_auto]">
          <div
            class="
              inline-flex
              items-center
              rounded-full
              bg-white
              shadow-md
              border
            "
          >
            <button class="h-12 px-4">
              <span class="text-black text-sm">Anywhere</span>
            </button>
            <button class="h-12 px-4 border-x">
              <span class="text-black text-sm">Anyweek</span>
            </button>
            <button class="h-12 flex items-center">
              <span class="text-sm px-4">Add Guest</span>
              <div class="bg-red-500 p-2 m-2 rounded-full">
                <svg
                  class="
                    block
                    w-4
                    h-4
                    text-white
                    fill-inherit
                    stroke-current stroke-[5.3]
                  "
                  viewBox="0 0 32 32"
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true"
                  role="presentation"
                  focusable="false"
                >
                  <g fill="none">
                    <path
                      d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9"
                    ></path>
                  </g>
                </svg>
              </div>
            </button>
          </div>
        </div>
        <div class="hidden md:block flex-[1_0_140px]">
          <div class="flex justify-end items-center relative">
            <div class="flex justify-end mr-2">
              <a href="" class="text-black p-3">Become a Host</a>
            </div>
            <div>
              <div class="inline-block relative">
                <button
                  class="
                    border
                    rounded-3xl
                    inline-flex
                    items-center
                    p-1
                    pl-3
                    text-black
                    stroke-black
                  "
                >
                  <div>
                    <svg
                      class="block w-4 h-4 fill-inherit text-black"
                      viewBox="0 0 32 32"
                      xmlns="http://www.w3.org/2000/svg"
                      aria-hidden="true"
                      role="presentation"
                      focusable="false"
                    >
                      <g fill="none" fill-rule="nonzero">
                        <path d="m2 16h28"></path>
                        <path d="m2 24h28"></path>
                        <path d="m2 8h28"></path>
                      </g>
                    </svg>
                  </div>
                  <div class="h-8 w-8 ml-3 relative">
                    <img
                      class="rounded-full"
                      src="https://a0.muscache.com/im/pictures/user/0507f9c4-fb25-4e53-9dc9-4ff17a0b2a45.jpg?aki_policy=profile_medium"
                      alt=""
                    />
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
import Logo from './Logo.vue'
export default { components: { Logo } }
</script>

<style>
</style>