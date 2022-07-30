<template>
  <div class="q-ma-none">
    <q-list class="q-gutter-md" style="">
      <q-spinner-dots v-if="serverStore.loading" color="primary" size="2em" />
      <q-item-label v-else header>
        {{ serverStore.servers.length }} results
      </q-item-label>
      <ServerBox
        v-for="server in serverStore.servers"
        :server="server"
        :key="server.model"
      />
    </q-list>
  </div>
</template>
<script setup>
import { ref } from "vue";
import ServerBox from "./ServerBox.vue";
import ServerModel from "../../models/Server";
import { useServerStore } from "../../store";
import { getCurrentInstance } from "vue";

const serverStore = useServerStore();
serverStore.getServers();

const app = getCurrentInstance();

console.log(
  app.appContext.config.globalProperties.$helpers._isEqual(
    { id: 1, name: "HAMED", items: {key:"item"}, children: [1,2]},
    { id: 1, name: "HAMED", children: [1,2], items: {key:"item"}},
  )
);
</script>

<style lang="sass">
.main-section
  background-image: none!important
.q-list
  .q-item__section
    margin-left: 0!important
</style>
