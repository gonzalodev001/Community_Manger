const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/Index.vue") },
      { path: "community_types", name: "community_types", component: () => import("pages/CommunityType.vue") },
      { path: "user", name: "register_owner", component: () => import("pages/RegisterOwner.vue") },
      { path: "community", name: "community", component: () => import("pages/Community.vue") }
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    name: 'Login',
    path: "/login",
    component: () => import("pages/Login.vue"),
  },
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/Error404.vue"),
  },
];

export default routes;
