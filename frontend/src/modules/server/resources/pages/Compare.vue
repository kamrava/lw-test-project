<template>
  <div class="q-pa-md q-mt-xl doc-container">
    <div class="row justify-center q-gutter-x-md">
      <div
        v-for="(server, index) in items"
        :key="server.model"
        :class="getCompareItemClass(index, items.length)"
      >
        <ServerCompareItem :server="server" />
      </div>
      <div class="col-xs-2 flex flex-center gt-sm">
        <q-btn flat label="Add More" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import ServersFilter from "../components/ServersFilter.vue";
import ServerCompareItem from "../components/ServerCompareItem.vue";

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

function getCompareItemClass(index, items_length) {
  switch (index) {
    case 0:
    case 1:
      return "col-xs-5 col-sm-3";
      break;
    case 2:
      return "col-xs-3 gt-xs";
      break;
    case 3:
      return "col-xs-2 flex flex-center gt-sm";
      break;

    default:
      break;
  }
}
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
