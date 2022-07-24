<template>
    <div class="sticky top-20 w-full pt-5 z-10 bg-white">
        <div class="contents">
            <div class="grid px-5 md:px-12 lg:px-16 xl:px-20">
                <div class="flex h-[78px] items-center overflow-x-auto overflow-y-hidden">
                    <div class="relative grid gap-8 grid-flow-col justify-start">
                        <div class="grid grid-cols-[100%]" v-for="x in 10" :key="x">
                            <div class="">
                                <button aria-hidden="false" class="text-center pt-1 pb-3" role="radio"
                                    aria-checked="true" type="button">
                                    <span class="flex flex-col items-center">
                                        <img class=""
                                            src="https://a0.muscache.com/pictures/8e507f16-4943-4be9-b707-59bd38d56309.jpg"
                                            alt="" width="24" height="24">
                                        <div class="whitespace-nowrap relative">
                                            <span class="inline-block text-xs">
                                                Islands
                                            </span>
                                        </div>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>
</style>