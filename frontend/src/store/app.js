import { defineStore } from "pinia";

export const useAppStore = defineStore("app", {
  state: () => ({
    count: 0,
    selectedNav: "",
    languages: [
      { icon: "flag-germany", name: "Deutsch", short: "DE" },
      { icon: "flag-usa", name: "English", short: "EN" },
      { icon: "flag-netherlands", name: "Netherlands", short: "NL" },
      { icon: "flag-france", name: "Français", short: "FR" },
    ],
    navItems: [
      {
        icon: "fal fa-cloud-question",
        title: "Why Leaseweb",
        link: "/#somethere",
      },
      { icon: "fal fa-server", title: "Products", link: "/#somethere" },
      {
        icon: "fal fa-object-exclude",
        title: "Solutions",
        link: "/#somethere",
      },
      {
        icon: "fal fa-cubes-stacked",
        title: "Resources",
        link: "/#somethere",
      },
      { icon: "fal fa-people-group", title: "About us", link: "/#somethere" },
      { icon: "fal fa-envelope", title: "Contact", link: "/#somethere" },
    ],
  }),
  getters: {
    doubleCount: (state) => state.count * 2,
  },
  actions: {
    increment() {
      this.count++;
    },
  },
});
