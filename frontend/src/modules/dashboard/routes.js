const dashboard_routes = [
  {
    path: '/',
    meta: {
        isPublicRoute: true
    },
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", name: "index", component: () => import("src/modules/dashboard/resources/pages/Index.vue") },
    ],
  }
];

export default dashboard_routes;
