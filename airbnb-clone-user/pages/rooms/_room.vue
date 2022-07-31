<template>
  <main class="mt-6">
    <div class="relative px-5 lg:px-20">
      <div v-if="loading == true" class="max-w-[1120px] mx-auto items-stretch w-full">
        <section>
          <h1 class="h-8 min-w-[200px] bg-gray-200 animate-pulse"></h1>
          <div class="flex justify-between items-end">
            <span class="mt-1">
              <a href="" class="py-1 px-14 bg-gray-200 animate-pulse"></a>
            </span>
          </div>
        </section>
        <div class="pt-6 max-w-[1120px] mx-auto w-full">
          <div class="rounded-3xl overflow-y-hidden">
            <div class="cal60_64px relative overflow-y-hidden">
              <div class="h-0 min-h-full min-w-full relative pt-[50%]">
                <div class="absolute top-0 left-0 w-full h-full">
                  <!-- 1st Col -->
                  <div class="h-full w-1/2 absolute top-0 left-0">
                    <div class="cal60_64px h-full w-full min-h-[300px]">
                      <div class="relative h-full w-full bg-gray-200 animate-pulse"></div>
                    </div>
                  </div>
                  <!-- 2nd Col -->
                  <div class="flex h-full w-1/4 pl-2 left-1/2 top-0 absolute flex-col">
                    <div class="cal60_64px h-full w-full">
                      <div class="h-full sm:h-1/2">
                        <div class="relative h-full w-full bg-gray-200 animate-pulse"></div>
                      </div>
                      <div class="h-full sm:h-1/2 mt-2">
                        <div class="relative h-full w-full bg-gray-200 animate-pulse"></div>
                      </div>
                    </div>
                  </div>
                  <!-- 3rd Col -->
                  <div class="flex h-full w-1/4 pl-2 right-0 top-0 absolute flex-col">
                    <div class="cal60_64px h-full w-full">
                      <div class="h-full sm:h-1/2">
                        <div class="relative h-full w-full bg-gray-200 animate-pulse"></div>
                      </div>
                      <div class="h-full sm:h-1/2 mt-2">
                        <div class="relative h-full w-full bg-gray-200 animate-pulse"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
              <div class="cal60_64px relative overflow-y-hidden">
                <div class="h-0 min-h-full min-w-full relative pt-[50%]">
                  <div class="absolute top-0 left-0 w-full h-full">
                    <!-- 1st Col -->
                    <div class="h-full w-1/2 absolute top-0 left-0">
                      <div class="cal60_64px h-full w-full min-h-[300px]">
                        <div class="relative h-full w-full">
                          <button class="h-full w-full relative text-left block">
                            <div class="inline-block align-bottom h-full w-ful bg_50_50 bg-no-repeat ">
                              <picture>
                                <img :src="this.hero_images[0]" alt=""
                                  class=" h-full w-full absolute object-cover align-bottom">
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
                                  <img :src="this.hero_images[1]" alt=""
                                    class=" object-cover align-bottom absolute h-full w-full">
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
                                  <img :src="this.hero_images[2]" alt=""
                                    class=" object-cover align-bottom absolute h-full w-full">
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
                                  <img :src="this.hero_images[3]" alt=""
                                    class=" object-cover align-bottom absolute h-full w-full">
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
                                  <img :src="this.hero_images[4]" alt=""
                                    class=" object-cover align-bottom absolute h-full w-full">
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
        <div class="pt-6 max-w-[1120px] mx-auto flex items-stretch">
          <div class="relative w-[58.33%]">
            <div>
              <div class="pb-3">
                <section>
                  <div class="hidden md:block">
                    <div class="flex">
                      <div class=" flex-[0_1_100%]">
                        <div class="text-2xl mb-2">
                          <h2 class="text-inherit">Private room in island hosted by The Isla Experience</h2>
                        </div>
                        <ol>
                          <li class="inline-block"><span>2 Guest</span></li>
                          <li class="inline-block"><span>2 Guest</span></li>
                          <li class="inline-block"><span>2 Guest</span></li>
                          <li class="inline-block"><span>2 Guest</span></li>
                        </ol>
                      </div>
                      <div class="ml-4">
                        <div class="text-2xl">
                          <div class=" block relative w-14 h-14">
                            <button class="rounded-full w-full h-full block relative">
                              <div class="w-14 h-14 rounded-full relative overflow-hidden">
                                <div class="bg_50_50 bg-no-repeat w-full h-full">
                                  <img
                                    src="https://a0.muscache.com/im/pictures/user/d80a13e7-a564-41cf-843d-5932d3cd2ac5.jpg?im_w=240"
                                    alt="" key="" class="object-cover align-bottom w-full h-full static">
                                </div>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
          <div class="relative w-[33.33%] ml-[8.33%]"></div>
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
      images: null,
      hero_images: [],
      loading: true
    }
  },
  mounted() {
    const today = new Date();
    const next_3_day = new Date(today.getTime() + (3 * 24 * 60 * 60 * 1000));

    const url = 'https://' + process.env.RAPID_API_URL + '/properties/get-details?id=' + this.roomId + '&checkIn=' + today.toISOString().split('T')[0] + '&checkOut=' + next_3_day.toISOString().split('T')[0] + '&adults1=1&currency=USD&locale=en_US';
    const imges_url = 'https://hotels4.p.rapidapi.com/properties/get-hotel-photos?id=' + this.roomId;

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

    fetch(imges_url, options)
      .then(res => res.json())
      .then(json => {
        this.images = json.hotelImages
        this.hero_images[0] = this.images[0].baseUrl.replace('{size}', this.images[0].sizes[0].suffix)
        this.hero_images[1] = this.images[1].baseUrl.replace('{size}', this.images[1].sizes[1].suffix)
        this.hero_images[2] = this.images[2].baseUrl.replace('{size}', this.images[2].sizes[2].suffix)
        this.hero_images[3] = this.images[3].baseUrl.replace('{size}', this.images[3].sizes[3].suffix)
        this.hero_images[4] = this.images[4].baseUrl.replace('{size}', this.images[4].sizes[4].suffix)
      })
      .catch(err => console.error('error:' + err));
  },
}
</script>

<style>
</style>