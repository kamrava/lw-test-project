<template>
  <q-header height-hint="64">
    <q-toolbar class="GNL__toolbar">
      <q-btn
        v-if="$q.screen.lt.md"
        flat
        dense
        round
        @click="$emit('toggle')"
        aria-label="Menu"
        icon="menu"
        class="q-mx-md"
      />
      <q-toolbar-title shrink class="row no-wrap">
        <q-item :to="{ name: 'index' }" class="q-pl-none">
          <q-item-section>
            <img class="q-pl-md" src="statics/images/lw-logo.svg" />
          </q-item-section>
        </q-item>
      </q-toolbar-title>

      <q-space />

      <q-tabs
        v-if="$q.screen.gt.sm"
        v-model="appStore.selectedNav"
        indicator-color="transparent"
        active-bg-color="deep-purple-9"
        active-color="white"
        content-class="tab-class"
        class="text-white"
        dense
      >
        <q-tab
          v-for="nav in appStore.navItems"
          :key="nav.title"
          :name="nav.title"
          no-caps
          :label="nav.title"
        />
      </q-tabs>

      <q-space />
      <label v-if="$q.screen.gt.md">+31 20 316 2880</label>
      <q-space />

      <div class="q-gutter-sm row items-center no-wrap">
        <q-btn round dense flat color="text-grey-7" icon="fal fa-search">
          <q-tooltip>Search</q-tooltip>
        </q-btn>
        <LanguageSelector />
        <q-btn
          round
          dense
          flat
          color="text-grey-7"
          icon="fal fa-cart-arrow-down"
        >
          <q-tooltip>Cart</q-tooltip>
        </q-btn>
      </div>
    </q-toolbar>
  </q-header>
</template>

<script setup>
import { ref } from "vue";
import { useAppStore } from "src/store/app";
import LanguageSelector from "./LanguageSelector.vue";

const appStore = useAppStore();
</script>
