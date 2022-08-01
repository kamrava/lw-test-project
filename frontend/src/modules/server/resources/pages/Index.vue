<template>
  <div>
    <div class="q-mt-xl flex flex-center" style="height: 250px">
      <div class="text-center">
        <h2 class="section-title text-grey-7">Dedicated Servers Pricing</h2>
        <q-btn-toggle
          v-if="serverStore.availableFilters.length && serverStore.availableFilters[3].values.length"
          class="q-mt-xl gt-sm"
          unelevated
          no-caps
          rounded
          v-model="serverStore.filters.locations"
          text-color="dark"
          color="grey-3"
          :options="serverStore.availableFilters[3].values"
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
import { ref, computed } from "vue";
import ServersFilter from "../components/ServersFilter.vue";
import ServersList from "../components/List.vue";
import { useServerStore } from "../../store";

const serverStore = useServerStore();
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
