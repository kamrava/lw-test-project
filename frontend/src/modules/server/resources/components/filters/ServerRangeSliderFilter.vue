<template>
  <q-expansion-item @update:model-value="toggleStorage" dense-toggle>
    <template v-slot:header>
      <div class="q-item__section column q-item__section--main justify-center">
        <div class="q-item__label">
          <span class="text-bold q-mr-sm">{{ filter.name }}</span>
          {{ storageFilterText }}
        </div>
      </div>
    </template>
    <q-card class="q-pa-sm bg-transparent">
      <q-card-section>
        <q-range
          v-model="serverStore.filters.storage"
          :min="0"
          :max="200"
          :step="10"
          track-size="8px"
          thumb-size="28px"
          color="accent"
        />
      </q-card-section>
    </q-card>
  </q-expansion-item>
</template>

<script setup>
import { ref, computed } from "vue";
import { useServerStore } from "../../../store";

const serverStore = useServerStore();

const storageFilterOpen = ref(false);
const storageFilter = ref({min: 0, max: 200});

const props = defineProps({
  filter: Object,
});

// Methods
function toggleStorage(val) {
  storageFilterOpen.value = val;
}

// Computed
const storageFilterText = computed(() =>
  storageFilterOpen.value
    ? serverStore.filters.storage.min + " - " + serverStore.filters.storage.max + " GB"
    : ""
);
</script>
