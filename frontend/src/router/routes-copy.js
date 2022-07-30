const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", name: "index", component: () => import("pages/Index.vue") },
    ],
  },
  {
    path: "/servers",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        name: "servers.index",
        component: () => import("pages/servers/Index.vue"),
      },
      {
        path: "/compare",
        name: "servers.compare",
        component: () => import("pages/servers/Compare.vue"),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/Error404.vue"),
  },
];

export default routes;
