<template>
  <div class="q-ma-none">
    <q-list separator>
      <q-item-label class="bg-grey-1" header>Filters
        <q-btn v-if="hasFilters" @click="serverStore.clearFilters" size="sm" color="red" flat label="Clear Filters" icon="fal fa-close" />
      </q-item-label>
      <ServerInputSliderFilter v-if="serverStore.availableFilters.length" />
      <ServerCheckboxFilter v-if="serverStore.availableFilters.length" :filter="serverStore.availableFilters[1]" />
      <ServerCheckboxFilter v-if="serverStore.availableFilters.length" :filter="serverStore.availableFilters[2]" />
      <ServerRangeSliderFilter v-if="serverStore.availableFilters.length" :filter="serverStore.availableFilters[0]" />
      <ServerDropdownFilter v-if="serverStore.availableFilters.length" :filter="serverStore.availableFilters[3]" />
    </q-list>
  </div>
</template>

<script setup>
import { ref, watch, getCurrentInstance } from "vue";
import { useServerStore } from "../../store";
import ServerCheckboxFilter from "./filters/ServerCheckboxFilter.vue";
import ServerRangeSliderFilter from "./filters/ServerRangeSliderFilter.vue";
import ServerDropdownFilter from "./filters/ServerDropdownFilter.vue";
import ServerInputSliderFilter from "./filters/ServerInputSliderFilter.vue";

const serverStore = useServerStore();
serverStore.getFilters();

const app = getCurrentInstance();

const hasFilters = ref(false);

watch( () => serverStore.filters, (val) => {
  hasFilters.value = !app.appContext.config.globalProperties.$helpers._isEqual(
    serverStore.filtersTemplate,
    serverStore.filters
  )
},
{ deep: true })


</script>
