<template>
  <div class="q-ma-none">
    <div class="row flex flex-center" style="height: 100px" v-if="serverStore.loading">
      <q-spinner-dots class="q-mt-lg" color="primary" size="2em" />
    </div>
    <q-list class="q-gutter-md" v-else>
      <q-item-label header>
        {{ serverStore.servers.length }} results
      </q-item-label>
      <ServerBox
        v-for="server in serverStore.servers"
        :server="server"
        :key="server.model"
      />
    </q-list>
    <div v-if="serverStore.servers.length" class="flex flex-center q-ma-xl">
      <q-pagination
        v-model="current"
        color="black"
        :max="10"
        :max-pages="6"
        :boundary-numbers="false"
      />
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import ServerBox from "./ServerBox.vue";
import { useServerStore } from "../../store";

const serverStore = useServerStore();
serverStore.getServers();

const current = ref(1);

</script>

<style lang="sass">
.main-section
  background-image: none!important
.q-list
  .q-item__section
    margin-left: 0!important
</style>
