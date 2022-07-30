<template>
  <q-card class="my-card">
    <q-card-section>
      <div class="row items-center no-wrap">
        <div class="col">
          <div class="text-subtitle2">{{ server.model }}</div>
        </div>

        <div class="col-auto">
          <q-btn
            @click="$emit('remove', server.id)"
            color="grey-7"
            round
            flat
            icon="fas fa-circle-xmark"
          ></q-btn>
        </div>
      </div>
    </q-card-section>

    <q-markup-table class="table-specs-column">
      <thead>
        <tr>
          <th class="text-left text-bold">Specs</th>
          <th class="text-right"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-left">RAM</td>
          <td class="text-right">{{ server.ram }}</td>
        </tr>
        <tr>
          <td class="text-left">Disk Type</td>
          <td class="text-right">{{ server.hdd }}</td>
        </tr>
        <tr>
          <td class="text-left">Storage</td>
          <td class="text-right">2TB</td>
        </tr>
        <tr>
          <td class="text-left">Location</td>
          <td class="text-right">{{ server.location }}</td>
        </tr>
      </tbody>
    </q-markup-table>
  </q-card>
</template>

<script setup>
import { ref, toRefs } from "vue";

const emit = defineEmits(["remove"]);

const props = defineProps({
  server: Object,
});

// const { item } = toRefs(props);
</script>

<style lang="sass" scoped>
.table-specs-column
  td:first-child
    background-color: #ede7f6
</style>
