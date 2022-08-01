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
import { ref, computed, watch, onMounted } from "vue";
import { useServerStore } from "../../../store";

const serverStore = useServerStore();
const props = defineProps({
  filter: Object,
});

const checkboxModel = ref([]);

// Computed
const options = computed(() =>
  props.filter.values.map( (item) => {
    return {label: item, value: item}
  })
);

// Watch
watch( () => checkboxModel.value, (val) => {
    if(props.filter.name === 'Harddisk type') {
      serverStore.filters.diskType = val;
    } else if(props.filter.name === 'Ram') {
      serverStore.filters.ram = val;
    }
  }
)

// Mounted
onMounted(() => {
  if(props.filter.name === 'Harddisk type') {
    checkboxModel.value = serverStore.filters.diskType
    } else if(props.filter.name === 'Ram') {
      checkboxModel.value = serverStore.filters.ram
    }
});
</script>

