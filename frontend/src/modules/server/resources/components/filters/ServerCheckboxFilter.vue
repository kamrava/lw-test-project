<template>
  <q-expansion-item dense-toggle>
    <template v-slot:header>
      <div class="q-item__section column q-item__section--main justify-center">
        <div class="q-item__label">
          <span class="text-bold">{{ filter.name }}</span>
        </div>
      </div>
    </template>
    <q-card class="bg-transparent">
      <q-card-section class="q-gutter-md flex flex-center">
        <q-option-group
          inline
          :options="options"
          type="checkbox"
          v-model="checkboxModel"
        />
      </q-card-section>
    </q-card>
  </q-expansion-item>
</template>

<script setup>
import { computed } from "vue";
import { useServerStore } from "../../../store";

const serverStore = useServerStore();
const props = defineProps({
  filter: Object,
});

// Computed
const options = computed(() =>
  props.filter.values.map((item) => {
    return { label: item, value: item };
  })
);

const checkboxModel = computed({
  get() {
    if (props.filter.name === "Ram") {
      return serverStore.filters.ram;
    } else {
      return serverStore.filters.diskType;
    }
  },
  set(value) {
    if (props.filter.name === "Ram") {
      serverStore.filters.ram = value;
    } else {
      serverStore.filters.diskType = value;
    }
  },
});
</script>
