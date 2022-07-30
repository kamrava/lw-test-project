<template>
  <q-btn-dropdown flat color="bg-transparent" label="EN">
    <template v-slot:label>
      <q-tooltip> Language </q-tooltip>
    </template>
    <q-list>
      <q-item
        v-for="language in appStore.languages"
        :key="language.name"
        clickable
        v-close-popup
      >
        <q-item-section avatar>
          <q-icon :name="language.icon" />
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ language.name }}</q-item-label>
        </q-item-section>
        <q-item-section side>{{ language.short }}</q-item-section>
      </q-item>
    </q-list>
  </q-btn-dropdown>
</template>

<script setup>
import { ref } from "vue";
import { useAppStore } from "src/store/app";

const appStore = useAppStore();
</script>
