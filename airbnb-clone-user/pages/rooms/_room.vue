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
          <div class="relative w-full md:w-[58.33%]">
            <div class="border-b">
              <div class="pb-3">
                <section>
                  <div class="hidden md:block">
                    <div class="flex">
                      <div class=" flex-[0_1_100%]">
                        <div class="text-2xl mb-2">
                          <h2 class="text-inherit" v-html="room_data.tagline[0]">
                          </h2>
                        </div>
                        <ol>
                          <li class="inline-block" v-for="free, keys in room_data.freebies" :key="keys">
                            <span>{{ free }}</span>
                          </li>
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
            <div class="border-b">
              <div class="pb-3">
                <div class="py-6">
                  <div class="text-2xl leading-7 font-semibold pb-6">
                    <section>
                      <h2 tabindex="-1">Where you'll sleep</h2>
                    </section>
                  </div>
                  <div class="relative">
                    <div class="-mx-2 overflow-hidden">
                      <div style="margin-top: 0px; margin-bottom: 0px;">
                        <div class="carousel carousel-center">

                          <!-- rooms -->
                          <div
                            class="inline-block w-2/3 md:w-1/3 align-top whitespace-normal flex-[0_0_auto] carousel-item"
                            :id="`room` + rk" v-for="room, rk in rooms" :key="rk">
                            <div class="px-[6px] w-full h-full md:px-2">
                              <div class="p-6 border rounded-lg w-full h-full">
                                <div class="mb-4" aria-hidden="true">
                                  <span class="inline-block mr-2">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                      role="presentation" focusable="false"
                                      style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                                      <path
                                        d="M24 4a2 2 0 0 1 1.995 1.85L26 6v7.839l1.846 5.537a3 3 0 0 1 .115.468l.03.24.009.24V30h-2v-2H6v2H4v-9.675a3 3 0 0 1 .087-.717l.067-.232L6 13.836V6a2 2 0 0 1 1.697-1.977l.154-.018L8 4zm2 18H6v4h20zm-1.388-6H7.387l-1.333 4h19.891zM24 6H8v8h3v-4a2 2 0 0 1 1.85-1.995L13 8h6a2 2 0 0 1 1.995 1.85L21 10v4h3zm-5 4h-6v4h6z">
                                      </path>
                                    </svg>
                                  </span>
                                </div>
                                <div class="mb-2 text-sm font-semibold">{{ room.name }}</div>
                                <div class="text-xs text-zinc-600">{{ room.bedChoices.mainOptions[0] }}</div>
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
            <div class="border-b">
              <div class="pb-3">
                <section class="py-6">
                  <div class="text-2xl leading-7 font-semibold pb-6">
                    <section>
                      <h2 tabindex="-1">What this place offers
                      </h2>
                    </section>
                  </div>


                  <div class="" v-for="am, ak in amenities[1].listItems" :key="ak">
                    <div class="mb-2 font-semibold">{{ am.heading }}</div>
                    <div class="grid md:grid-cols-2">
                      <div v-for="a, k in am.listItems" :key="k">
                        <div class="flex pb-4 justify-end flex-row-reverse items-center">
                          <div>{{ a }}</div>
                          <div class="mr-4">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                              role="presentation" focusable="false"
                              style="display: block; height: 24px; width: 24px; fill: currentcolor;">
                              <path
                                d="M28 2a2 2 0 0 1 2 2v24a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 2H4v15.499l.187-.007c.371-.033.72-.161 1.005-.372l.137-.111A3.975 3.975 0 0 1 8 18c.988 0 1.945.352 2.671 1.009.35.316.826.49 1.33.491.502 0 .979-.175 1.328-.492A3.974 3.974 0 0 1 16 18c.988 0 1.945.351 2.671 1.009.35.316.826.49 1.33.491.502 0 .979-.175 1.328-.491A3.975 3.975 0 0 1 23.999 18c.989 0 1.946.351 2.672 1.009.35.316.827.49 1.33.491l-.001 2-.228-.006a3.96 3.96 0 0 1-2.443-1.003A1.978 1.978 0 0 0 24 20c-.502 0-.978.175-1.328.491a3.977 3.977 0 0 1-2.67 1.009 3.977 3.977 0 0 1-2.672-1.009A1.978 1.978 0 0 0 16 20c-.503 0-.98.175-1.329.491a3.978 3.978 0 0 1-2.67 1.009 3.978 3.978 0 0 1-2.672-1.008A1.978 1.978 0 0 0 8 20c-.503 0-.98.175-1.33.491A3.976 3.976 0 0 1 4 21.5v2.999l.187-.007c.371-.033.72-.161 1.005-.372l.137-.111A3.975 3.975 0 0 1 8 23c.988 0 1.945.352 2.671 1.009.35.316.826.49 1.33.491.502 0 .979-.175 1.328-.492A3.974 3.974 0 0 1 16 23c.988 0 1.945.351 2.671 1.009.35.316.826.49 1.33.491.502 0 .979-.175 1.328-.491A3.975 3.975 0 0 1 23.999 23c.989 0 1.946.351 2.672 1.009.35.316.827.49 1.33.491l-.001 2-.228-.006a3.96 3.96 0 0 1-2.443-1.003A1.978 1.978 0 0 0 24 25c-.502 0-.978.175-1.328.491a3.977 3.977 0 0 1-2.67 1.009 3.977 3.977 0 0 1-2.672-1.009A1.978 1.978 0 0 0 16 25c-.503 0-.98.175-1.329.491a3.978 3.978 0 0 1-2.67 1.009 3.978 3.978 0 0 1-2.672-1.008A1.978 1.978 0 0 0 8 25c-.503 0-.98.175-1.33.491A3.976 3.976 0 0 1 4 26.5V28h24zm-6 3a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm0 2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                              </path>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </section>
              </div>
            </div>
          </div>
          <div class="relative w-full md:w-[33.33%] ml-[8.33%]"></div>
        </div>
      </div>
    </div>
    <div class="py-3">
      <div>Footer</div>
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
      loading: true,
      rooms: null,
      amenities: null
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
        this.rooms = json.data.body.roomsAndRates.rooms
        this.amenities = json.data.body.amenities
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