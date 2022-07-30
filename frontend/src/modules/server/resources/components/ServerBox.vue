<template>
  <q-item class="bg-grey-2 q-mt-none q-mb-md">
    <div class="row full-width">
      <q-item-section side class="col-xs-12 col-md-3">
        <q-badge class="server-top-badge" transparent color="accent">
          Now 38% Off 1st Month
        </q-badge>
        <q-item-label class="text-h4 text-dark text-bold"
          ><q-icon :name="'fas fa-' + server.price.currency_name + '-sign'" />{{ server.price.price }}</q-item-label
        >
        <q-item-label class="q-ml-sm text-h6 text-strike text-bold"
          >{{ server.price.currency }} {{ server.price.price }}</q-item-label
        >
      </q-item-section>

      <q-item-section side class="col-xs-6 col-md-1 q-my-xl">
        <q-item-label class="text-bold">Model</q-item-label>
        <q-item-label class="text-bold">RAM</q-item-label>
        <q-item-label class="text-bold">Disk Drive</q-item-label>
      </q-item-section>

      <q-item-section side class="col-xs-6 col-md-6">
        <q-item-label>{{ server.model }}</q-item-label>
        <q-item-label>{{ server.ram.ram }}</q-item-label>
        <q-item-label>{{ server.disk.disk }}</q-item-label>
      </q-item-section>

      <q-item-section class="col-xs-12 col-md-2" top>
        <q-btn color="primary" no-caps label="Get Started" />
        <q-btn
          :to="{ name: 'servers.compare' }"
          class="q-mt-md"
          no-caps
          flat
          icon="fas fa-circle-half-stroke"
          color="primary"
        >
          <q-tooltip>Compare</q-tooltip>
        </q-btn>
      </q-item-section>
    </div>
  </q-item>
</template>

<script setup>
const props = defineProps({
  server: Object,
});
</script>


<style lang="sass" scoped>
.q-item
  border: 1px solid var(--q-secondary)
  border-left: 5px solid var(--q-secondary)
  border-radius: 8px
.server-top-badge
  position: absolute
  top: -8px
</style>
