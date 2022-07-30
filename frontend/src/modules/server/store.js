import { defineStore } from "pinia";
import ServerModel from './models/Server'

export const useServerStore = defineStore("server", {
  state: () => ({
    servers: [],
    loading: false,
  }),
  actions: {
    getServers() {
      this.loading = true
      ServerModel.all('', ({data, meta}) => {
        this.servers = data
        this.loading = false
      })
    },
  },
});
