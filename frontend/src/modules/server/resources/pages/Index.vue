<template>
  <div>
    <div class="q-mt-xl flex flex-center" style="height: 250px">
      <div class="text-center">
        <h2 class="section-title text-grey-7">Dedicated Servers Pricing</h2>
        <q-btn-toggle
          class="q-mt-xl gt-sm"
          unelevated
          no-caps
          rounded
          v-model="location"
          text-color="dark"
          color="grey-3"
          :options="locations"
        />
      </div>
    </div>
    <div>
      <div class="row justify-center">
        <div class="col-2 q-gutter-sm q-mx-md bg-grey-2 gt-sm">
          <ServersFilter />
        </div>
        <div class="col-8 q-gutter-sm q-mx-md">
          <ServersList />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import ServersFilter from "../components/ServersFilter.vue";
import ServersList from "../components/List.vue";

const location = ref();

const locations = ref([
  {
    label: "Amsterdam",
    value: 1,
  },
  {
    label: "Washington D.C.",
    value: 2,
  },
  {
    label: "San Francisco",
    value: 3,
  },
  {
    label: "Singapore",
    value: 4,
  },
  {
    label: "Dallas",
    value: 5,
  },
  {
    label: "Frankfurt",
    value: 6,
  },
  {
    label: "Hong Kong",
    value: 7,
  },
]);

const items = ref([
  {
    id: 1,
    model: "Dell R210",
    cpu: "Intel Xeon E5-2650V4",
    hdd: "8x2TBSATA2",
    ram: "64GBDDR3",
    bandwidth: "100 TB/mo Bandwidth",
    price: "$35.99",
    icon: "server1.png",
  },
  {
    id: 2,
    model: "HP DL180",
    cpu: "Intel Xeon E5-2670v3",
    hdd: "2x120GBSSD",
    ram: "32GBDDR3",
    bandwidth: "100 TB/mo Bandwidth",
    price: "$46.99",
    icon: "server2.png",
  },
  {
    id: 3,
    model: "IBM X36302x",
    cpu: "Intel G530",
    hdd: "2x1TBSATA2",
    ram: "64GBDDR4",
    bandwidth: "100 TB/mo Bandwidth",
    price: "$58.99",
    icon: "server3.png",
  },
]);
</script>
<style lang="sass" scoped>
.section-title,
.section-caption
  font-weight: 400
  color: var(--q-secondary)

.section-title
  margin-bottom: 10px
  body.screen--xs &,
  body.screen--sm &
      font-size: 36px
.section-caption
  body.screen--xs &,
  body.screen--sm &
      font-size: 20px
</style>
