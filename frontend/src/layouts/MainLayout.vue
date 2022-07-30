<template>
  <!-- <q-layout view="hHh lpR fFf" class="main-section bg-grey-1"> -->
  <q-layout view="hHh lpR fFf" class="main-section bg-grey-1">
    <Nav @toggle="toggleLeftDrawer" />
    <q-drawer
      v-model="leftDrawerOpen"
      bordered
      behavior="mobile"
      @click="leftDrawerOpen = false"
    >
      <q-scroll-area class="fit">
        <q-toolbar class="GPL__toolbar">
          <q-toolbar-title class="row items-center text-grey-8">
            <img class="q-pl-md" src="statics/images/lw-logo.svg" />
          </q-toolbar-title>
        </q-toolbar>

        <q-list padding>
          <q-item
            v-for="nav in appStore.navItems"
            :key="nav.title"
            clickable
            class="GPL__drawer-item"
          >
            <q-item-section avatar>
              <q-icon :name="nav.icon" />
            </q-item-section>
            <q-item-section>
              <q-item-label>{{ nav.title }}</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from "vue";
import { useAppStore } from "src/store/app";
import Nav from "src/modules/dashboard/resources/components/Nav.vue";

const appStore = useAppStore();

const leftDrawerOpen = ref(false);

function toggleLeftDrawer() {
  leftDrawerOpen.value = !leftDrawerOpen.value;
}
</script>
<style lang="sass">
.q-page-container
  padding-top: 19px!important
.q-tab__label
  font-size: 16px!important
  margin: 0 10px
</style>
