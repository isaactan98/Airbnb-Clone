<template>
  <main class="mt-6">
    <div class="relative px-5 lg:px-20">
      <div v-if="loading == true" class="flex max-w-[1120px] mx-auto items-stretch w-full">
        <section>
          <h1 class="h-8 bg-gray-200 animate-pulse"></h1>
          <div class="flex justify-between items-end">
            <span class="mt-1">
              <a href="" class="text-sm underline"></a>
            </span>
          </div>
        </section>
      </div>
      <div v-else>
        <div class="flex max-w-[1120px] mx-auto items-stretch w-full">
          <section>
            <h1 class="break-words text-2xl font-bold">{{ room_data.name }}, {{ room_data.address.cityName }}</h1>
            <div class="flex justify-between items-end">
              <span class="mt-1">
                <a href="" class="text-sm underline text-black">{{ room_data.address.countryName }}</a>
              </span>
            </div>
          </section>
        </div>
        <div class="pt-6 max-w-[1120px] mx-auto">
          <div class="block">
            <div class="rounded-3xl overflow-y-hidden">
              <div class=" cal60_64px relative overflow-y-hidden">
                <div class="h-0 min-h-full min-w-full relative pt-[50%]">
                  <div class="absolute top-0 left-0 w-full h-full">
                    <!-- 1st Col -->
                    <div class="h-full w-1/2 absolute top-0 left-0">
                      <div class=" cal60_64px h-full w-full min-h-[300px]">
                        <div class="relative h-full w-full">
                          <button class="h-full w-full relative text-left block">
                            <div class="inline-block align-bottom h-full w-ful bg_50_50 bg-no-repeat ">
                              <picture>
                                <img
                                  src="https://a0.muscache.com/im/pictures/373443ec-b377-4181-b753-3a2f3508c2b3.jpg?im_w=960"
                                  alt="" class=" h-full w-full absolute object-cover align-bottom">
                              </picture>
                            </div>
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- 2nd Col -->
                    <div class="flex h-full w-1/4 pl-2 left-1/2 top-0 absolute flex-col">
                      <div class="cal60_64px h-full w-full">
                        <div class="h-full sm:h-1/2">
                          <div class="relative h-full w-full">
                            <button class=" h-full w-full relative text-left">
                              <div class="inline-block align-bottom h-full w-ful bg_50_50 bg-no-repeat ">
                                <picture>
                                  <img
                                    src="https://a0.muscache.com/im/pictures/7c586cfa-6a5c-4ec1-8fcd-5890b6a50769.jpg?im_w=720"
                                    alt="" class=" object-cover align-bottom absolute h-full w-full">
                                </picture>
                              </div>
                            </button>
                          </div>
                        </div>
                        <div class="h-full sm:h-1/2 mt-2">
                          <div class="relative h-full w-full">
                            <button class=" h-full w-full relative text-left">
                              <div class="inline-block align-bottom h-full w-ful bg_50_50 bg-no-repeat ">
                                <picture>
                                  <img
                                    src="https://a0.muscache.com/im/pictures/7c586cfa-6a5c-4ec1-8fcd-5890b6a50769.jpg?im_w=720"
                                    alt="" class=" object-cover align-bottom absolute h-full w-full">
                                </picture>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 3rd Col -->
                    <div class="flex h-full w-1/4 pl-2 right-0 top-0 absolute flex-col">
                      <div class="cal60_64px h-full w-full">
                        <div class="h-full sm:h-1/2">
                          <div class="relative h-full w-full">
                            <button class=" h-full w-full relative text-left">
                              <div class="inline-block align-bottom h-full w-ful bg_50_50 bg-no-repeat ">
                                <picture>
                                  <img
                                    src="https://a0.muscache.com/im/pictures/7c586cfa-6a5c-4ec1-8fcd-5890b6a50769.jpg?im_w=720"
                                    alt="" class=" object-cover align-bottom absolute h-full w-full">
                                </picture>
                              </div>
                            </button>
                          </div>
                        </div>
                        <div class="h-full sm:h-1/2 mt-2">
                          <div class="relative h-full w-full">
                            <button class=" h-full w-full relative text-left">
                              <div class="inline-block align-bottom h-full w-ful bg_50_50 bg-no-repeat ">
                                <picture>
                                  <img
                                    src="https://a0.muscache.com/im/pictures/7c586cfa-6a5c-4ec1-8fcd-5890b6a50769.jpg?im_w=720"
                                    alt="" class=" object-cover align-bottom absolute h-full w-full">
                                </picture>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  head() {
    return {
      title: this.loading == false ? this.room_data.name : 'Vacation Homes & Condo Rentals in the Bay Area',
    }
  },
  data() {
    return {
      roomId: this.$route.params.room,
      room_data: null,
      loading: true
    }
  },
  mounted() {
    const url = 'https://' + process.env.RAPID_API_URL + '/properties/get-details?id=' + this.roomId + '&checkIn=2020-01-08&checkOut=2020-01-15&adults1=1&currency=USD&locale=en_US';

    const options = {
      method: 'GET',
      headers: {
        'X-RapidAPI-Key': process.env.RAPID_API_KEY,
        'X-RapidAPI-Host': process.env.RAPID_API_URL
      }
    };

    fetch(url, options)
      .then(res => res.json())
      .then(json => {
        console.log(json)
        this.loading = false
        this.room_data = json.data.body.propertyDescription
      })
      .catch(err => console.error('error:' + err));
  },
}
</script>

<style>
</style>