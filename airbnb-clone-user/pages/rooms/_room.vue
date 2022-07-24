<template>
  <main>
    <div class="relative">
      <div class="flex px-5 container mx-auto items-stretch w-full">
        <h1 v-if="loading == true"></h1>
        <section v-else>
          <h1 class="break-words text-2xl font-bold">{{ room_data.name }}, {{ room_data.address.cityName }}</h1>
          <div class="flex justify-between items-end">
            <span class="mt-1">
              <a href="" class="text-sm underline">{{ room_data.address.countryName }}</a>
            </span>
          </div>
        </section>
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