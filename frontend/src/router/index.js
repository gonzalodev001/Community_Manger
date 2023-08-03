import { createRouter, createWebHistory } from "vue-router";

import LoginView from "../views/LoginView.vue";
import DashboardView from "../views/DashboardView.vue";
import FormRegisterOwner from "../components/FormRegisterOwner.vue";

const routes = [
    {
        path: "/login",
        name: "Login",
        component: LoginView
        //component: () => import("../views/LoginView.vue"),
    },
    {
        path: "/",
        name: "Dashboard",
        component: DashboardView,
        children: [
            {
                path: "owner",
                component: FormRegisterOwner
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;