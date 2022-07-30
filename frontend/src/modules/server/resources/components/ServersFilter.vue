<template>
  <div class="q-ma-none">
    <q-list separator>
      <q-item-label class="bg-grey-1" header>Filters</q-item-label>
      <q-item>
        <q-item-section class="col-2">
          <label class="text-bold">Price</label>
        </q-item-section>
        <q-item-section>
          <q-input v-model="filters.price.min" dense outlined>
            <template v-slot:prepend>
              <q-icon size="12px" name="far fa-euro-sign" />
            </template>
          </q-input>
        </q-item-section>
        <q-item-section class="col-1">
          <q-separator spaced />
        </q-item-section>
        <q-item-section>
          <q-input v-model="filters.price.max" dense outlined>
            <template v-slot:prepend>
              <q-icon size="12px" name="far fa-euro-sign" />
            </template>
          </q-input>
        </q-item-section>
      </q-item>

      <q-item class="q-px-sm" style="border-top: none">
        <q-item-section>
          <q-card flat class="bg-transparent">
            <q-card-section class="q-py-none">
              <q-range
                v-model="filters.price"
                :min="0"
                :max="100"
                :step="10"
                track-size="8px"
                thumb-size="28px"
                color="accent"
              />
            </q-card-section>
          </q-card>
        </q-item-section>
      </q-item>
      <q-expansion-item dense-toggle>
        <template v-slot:header>
          <div
            class="q-item__section column q-item__section--main justify-center"
          >
            <div class="q-item__label">
              <span class="text-bold">RAM</span>
            </div>
          </div>
        </template>
        <q-card class="bg-transparent">
          <q-card-section class="q-gutter-md flex flex-center">
            <q-option-group
              :options="availableFilters.ram"
              type="checkbox"
              size="42px"
              v-model="filters.ram"
              inline
            />
          </q-card-section>
        </q-card>
      </q-expansion-item>
      <q-expansion-item dense-toggle>
        <template v-slot:header>
          <div
            class="q-item__section column q-item__section--main justify-center"
          >
            <div class="q-item__label">
              <span class="text-bold">Disk Drive</span>
            </div>
          </div>
        </template>
        <q-card class="bg-transparent">
          <q-card-section class="q-gutter-md flex flex-center">
            <q-checkbox dense v-model="filters.disk.types.sas" label="SAS" />
            <q-checkbox dense v-model="filters.disk.types.sata" label="SATA" />
            <q-checkbox dense v-model="filters.disk.types.ssd" label="SSD" />
          </q-card-section>
        </q-card>
      </q-expansion-item>
      <q-expansion-item @update:model-value="toggleStorage" dense-toggle>
        <template v-slot:header>
          <div
            class="q-item__section column q-item__section--main justify-center"
          >
            <div class="q-item__label">
              <span class="text-bold q-mr-sm">Storage</span>
              {{ storageFilterText }}
            </div>
          </div>
        </template>
        <q-card class="q-pa-sm bg-transparent">
          <q-card-section>
            <q-range
              v-model="filters.storage"
              :min="0"
              :max="100"
              :step="10"
              track-size="8px"
              thumb-size="28px"
              color="accent"
            />
          </q-card-section>
        </q-card>
      </q-expansion-item>
      <q-expansion-item dense-toggle>
        <template v-slot:header>
          <div
            class="q-item__section column q-item__section--main justify-center"
          >
            <div class="q-item__label">
              <span class="text-bold q-mr-sm">Location</span>
            </div>
          </div>
        </template>
        <q-card class="q-pa-sm bg-transparent">
          <q-card-section>
            <q-select
              filled
              v-model="filters.location"
              label="Select Location"
              :options="locations"
            />
          </q-card-section>
        </q-card>
      </q-expansion-item>
    </q-list>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";

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
const originalFilters = ref(false);
const storageFilterOpen = ref(false);
const availableFilters = ref({
  price: {
    min: 0,
    max: 100,
  },
  ram: [
    { label: "2GB", value: "2" },
    { label: "4GB", value: "4" },
    { label: "8GB", value: "8" },
    { label: "12GB", value: "12" },
    { label: "16GB", value: "16" },
    { label: "24GB", value: "24" },
    { label: "32GB", value: "32" },
    { label: "48GB", value: "48" },
    { label: "64GB", value: "64" },
    { label: "96GB", value: "96" },
    { label: "128GB", value: "128" },
  ],
  storage: {
    min: 0,
    max: 100,
  },
  disk: {
    types: {
      sas: false,
      sata: false,
      ssd: false,
    },
  },
  locations: [],
});
const filters = ref({
  price: {
    min: 0,
    max: 100,
  },
  ram: [],
  storage: {
    min: 0,
    max: 100,
  },
  disk: {
    types: {
      sas: false,
      sata: false,
      ssd: false,
    },
  },
  locations: [],
});
const priceFilter = ref({
  min: 0,
  max: 100,
});
const ramFilter = ref({
  min: 0,
  max: 100,
});
const options = ref(locations);

function toggleStorage(val) {
  storageFilterOpen.value = val;
}

// Computed
const storageFilterText = computed(() =>
  storageFilterOpen.value
    ? filters.value.storage.min + " - " + filters.value.storage.max + " GB"
    : ""
);
// Mounted
onMounted(() => {
  originalFilters.value = filters;
});
</script>
