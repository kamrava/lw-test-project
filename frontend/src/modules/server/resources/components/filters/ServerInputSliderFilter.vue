<template>
  <div>
    <q-item>
      <q-item-section class="col-2">
        <label class="text-bold">Price</label>
      </q-item-section>
      <q-item-section>
        <q-input v-model="serverStore.filters.price.min" dense outlined>
          <template v-slot:prepend>
            <q-icon size="12px" name="far fa-euro-sign" />
          </template>
        </q-input>
      </q-item-section>
      <q-item-section class="col-1">
        <q-separator spaced />
      </q-item-section>
      <q-item-section>
        <q-input v-model="serverStore.filters.price.max" dense outlined>
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
              v-model="serverStore.filters.price"
              :min="0"
              :max="500"
              :step="10"
              track-size="8px"
              thumb-size="28px"
              color="accent"
            />
          </q-card-section>
        </q-card>
      </q-item-section>
    </q-item>
  </div>
</template>

<script setup>
import { ref, computed, watch, onMounted } from "vue";
import { useServerStore } from "../../../store";

const serverStore = useServerStore();

</script>
