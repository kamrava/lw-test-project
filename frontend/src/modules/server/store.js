import { defineStore } from "pinia";
import ServerModel from "./models/Server";

export const useServerStore = defineStore("server", {
  state: () => ({
    servers: [],
    availableFilters: [],
    filters: {
      diskType: [],
      price: { min: 0, max: 500 },
      storage: { min: 0, max: 500 },
      ram: [],
      locations: [],
    },
    filtersTemplate: {
      diskType: [],
      price: { min: 0, max: 500 },
      storage: { min: 0, max: 500 },
      ram: [],
      locations: [],
    },
    loading: false,
  }),
  actions: {
    getServers() {
      this.servers = [];
      this.loading = true;
      ServerModel.all("", ({ data, meta }) => {
        this.servers = data;
        this.loading = false;
      });
    },
    getFilters() {
      this.availableFilters = [];
      this.loading = true;
      ServerModel.filters(({ data, meta }) => {
        this.availableFilters = data;
        this.loading = false;
      });
    },
    clearFilters() {
      this.filters = JSON.parse(JSON.stringify(this.filtersTemplate));
    },
  },
});
