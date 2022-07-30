<template>
  <div class="index-page">
    <div class="q-mt-xl flex flex-center" style="height: 400px">
      <div class="text-center">
        <h2 class="section-title">Dedicated Server Hosting</h2>
        <h5 class="section-caption">Top-tier performance at a cheap price</h5>
        <q-btn
          :to="{ name: 'servers.index' }"
          color="accent"
          label="View All Servers"
          no-caps
          size="lg"
        />
      </div>
    </div>
    <div style="min-height: 1600px">
      <div class="row justify-center q-gutter-x-md">
        <div
          v-for="item in items"
          :key="item.key"
          class="col-xs-10 col-sm-6 col-md-2 q-ma-md"
        >
          <q-card class="server-card">
            <q-card-section class="bg-indigo-1" style="height: 100px">
              <div class="text-center">
                <img width="64" :src="'statics/images/' + item.icon" alt="" />
              </div>
            </q-card-section>
            <q-card-section>
              <div class="row column items-center text-center">
                <div class="col text-h6 ellipsis">{{ item.model }}</div>
                <div class="col ellipsis q-ma-md">
                  <span class="text-accent text-h6">{{ item.price }}</span>
                  <span class="text-grey">/ month</span>
                </div>
              </div>
            </q-card-section>
            <q-separator color="grey-3" inset />

            <q-card-section class="text-center">
              <q-list>
                <q-item>
                  <q-item-section>
                    <q-item-label overline>{{ item.cpu }}</q-item-label>
                  </q-item-section>
                </q-item>

                <q-item>
                  <q-item-section>
                    <q-item-label overline>{{ item.hdd }}</q-item-label>
                  </q-item-section>
                </q-item>

                <q-item>
                  <q-item-section>
                    <q-item-label overline>{{ item.ram }}</q-item-label>
                  </q-item-section>
                </q-item>
                <q-item>
                  <q-item-section>
                    <q-item-label overline>{{ item.bandwidth }}</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-card-section>

            <q-separator />

            <q-card-actions class="row column items-center text-center">
              <q-btn class="full-width" color="accent"> Get Started </q-btn>
            </q-card-actions>
          </q-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

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
.index-page
  background-image: url('/statics/images/bg.png')
  background-repeat: no-repeat!important
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
