<template>
  <div>
    <TopFilter></TopFilter>
    <div class="px-5 md:px-12 lg:px-16 xl:px-20">
      <div class="min-h-screen bg-white">
        <div class="bg-white p-5 grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5"
          v-if="show_list == false">
          <div class="grid relative" v-for="x, index in 10" :key="index">
            <a href="" class="block absolute h-full w-full top-0"></a>
            <div class="mb-3">
              <div class="rounded-box relative overflow-clip aspect-square">
                <div class="grid grid-flow-col auto-cols-fr h-full justify-start ">
                  <div class="grid h-full relative">
                    <a href="">
                      <div class="inline-block h-full w-full align-bottom min-h-[100px] bg-no-repeat bg-cover"
                        style="background-position:50% 50%">
                        <picture>
                          <span class="absolute h-full w-full object-cover align-bottom bg-gray-100"></span>
                        </picture>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="grid gap-x-2 gap-1 grid-cols-2 grid-rows-1 text-sm ">
              <div class="font-bold overflow-clip break-all line-clamp-1"></div>
              <div class="col-span-full"></div>
              <div class="col-span-full"></div>
              <div class="col-span-full font-bold"></div>
              <span class="flex items-center col-[-2/-1] row-start-1 justify-end"></span>
            </div>
          </div>
        </div>
        <div class="bg-white mt-5 p-5 grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5" v-else>
          <!-- loop listing -->
          <div class="grid relative" v-for="x, index in land" :key="index">
            <a :href="'/rooms/' + x.id" class="block absolute h-full w-full top-0" target="_blank"></a>
            <div class="mb-3">
              <div class="rounded-box relative overflow-clip aspect-square">
                <div class="grid grid-flow-col auto-cols-fr h-full justify-start ">
                  <div class="grid h-full relative">
                    <a :href="'/rooms/' + x.id" target="_blank">
                      <div class="inline-block h-full w-full align-bottom min-h-[100px] bg-no-repeat bg-cover"
                        style="background-position:50% 50%">
                        <picture>
                          <img :src="x.optimizedThumbUrls.srpDesktop" alt=""
                            class=" absolute h-full w-full object-cover align-bottom">
                        </picture>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="grid gap-x-2 gap-1 grid-cols-2 grid-rows-1 text-sm ">
              <div class="font-bold overflow-clip break-all line-clamp-1">{{ x.name }}</div>
              <div class="col-span-full">3,146 kilometers away</div>
              <div class="col-span-full">Sep 13-18</div>
              <div class="col-span-full font-bold">{{ x.ratePlan.price.current }} night</div>
              <span class="flex items-center col-[-2/-1] row-start-1 justify-end">🔥 {{ x.guestReviews.rating ?? 0 }}
              </span>
            </div>
          </div>
          <!-- end loop -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TopFilter from '~/components/TopFilter.vue';
export default {
  head() {
    return {
      title: "Vacation Homes & Condo Rentals in the Bay Area",
    };
  },
  data() {
    return {
      land: null,
      show_list: false
    };
  },
  mounted() {

    const today = new Date();
    const next_3_day = new Date(today.getTime() + (3 * 24 * 60 * 60 * 1000));

    const options = {
      method: "GET",
      headers: {
        "X-RapidAPI-Key": process.env.RAPID_API_KEY,
        "X-RapidAPI-Host": process.env.RAPID_API_URL
      }
    };
    fetch("https://" + process.env.RAPID_API_URL + "/properties/list?destinationId=1506246&pageNumber=1&pageSize=30&checkIn=" + today.toISOString().split('T')[0] + "&checkOut=" + next_3_day.toISOString().split('T')[0] + "&adults1=1&sortOrder=PRICE&locale=en_US&currency=USD", options)
      .then(response => response.json())
      .then((response) => {
        this.show_list = true;
        console.log(response);
        this.land = response.data.body.searchResults.results;
      })
      .catch(err => console.error(err));
  },
  components: { TopFilter }
}
</script>
