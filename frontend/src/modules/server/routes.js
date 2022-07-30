const server_routes = [
  {
    path: '/servers',
    meta: {
        isPublicRoute: true
    },
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", name: "servers.index", component: () => import("src/modules/server/resources/pages/Index.vue") },
      {
        path: "/compare",
        name: "servers.compare",
        component: () => import("src/modules/server/resources/pages/Compare.vue"),
      },
    ],
  }
];

export default server_routes;
