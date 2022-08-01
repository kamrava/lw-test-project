<template>
  <q-expansion-item dense-toggle>
    <template v-slot:header>
      <div class="q-item__section column q-item__section--main justify-center">
        <div class="q-item__label">
          <span class="text-bold q-mr-sm">{{ filter.name }}</span>
        </div>
      </div>
    </template>
    <q-card class="q-pa-sm bg-transparent">
      <q-card-section>
        <q-select
          filled
          v-model="serverStore.filters.locations"
          label="Select Location"
          :options="filter.values"
        />
      </q-card-section>
    </q-card>
  </q-expansion-item>
</template>

<script setup>
import { ref, computed, watch, onMounted } from "vue";
import { useServerStore } from "../../../store";

const serverStore = useServerStore();
const props = defineProps({
  filter: Object,
});

</script>
