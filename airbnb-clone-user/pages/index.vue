<template>
  <div class="container mx-auto">
    <div class="min-h-screen bg-white">
      <div class="bg-white mt-5 p-5 grid gap-6 md:grid-cols-4">
        <!-- loop listing -->
        <div class="grid relative" v-for="x in 5" :key="x">
          <a href="" class="block absolute h-full w-full top-0"></a>
          <div class="mb-3">
            <div class="rounded-box relative overflow-clip aspect-square">
              <div class="grid grid-flow-col auto-cols-fr h-full justify-start ">
                <div class="grid h-full relative">
                  <a href="">
                    <div class="inline-block h-full w-full align-bottom min-h-[100px] bg-no-repeat bg-cover"
                      style="background-position:50% 50%">
                      <picture>
                        <img src="https://a0.muscache.com/im/pictures/373443ec-b377-4181-b753-3a2f3508c2b3.jpg?im_w=720"
                          alt="" class=" absolute h-full w-full object-cover align-bottom">
                      </picture>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="grid gap-x-2 gap-1 grid-cols-2 grid-rows-1 text-sm ">
            <div class="font-bold">MV, Maldive</div>
            <div class="col-span-full">3,146 kilometers away</div>
            <div class="col-span-full">Sep 13-18</div>
            <div class="col-span-full font-bold">RM 2,767 night</div>
            <span class="flex items-center col-[-2/-1] row-start-1 justify-end">🔥 New </span>
          </div>
        </div>
        <!-- end loop -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  head() {
    return {
      title: 'Vacation Homes & Condo Rentals in the Bay Area',
    }
  },
  mounted() {
    console.log('mounted')

    const options = {
      method: 'GET',
      headers: {
        'X-RapidAPI-Key': '35ed769778mshd7e22d4df7a7cb4p11366djsnd5401691041a',
        'X-RapidAPI-Host': 'hotels4.p.rapidapi.com'
      }
    };

    // fetch('https://hotels4.p.rapidapi.com/properties/list?destinationId=1506246&pageNumber=1&pageSize=25&checkIn=2020-01-08&checkOut=2020-01-15&adults1=1&sortOrder=PRICE&locale=en_US&currency=USD', options)
    //   .then(response => response.json())
    //   .then(response => console.log(response))
    //   .catch(err => console.error(err));
  },
}
</script>
