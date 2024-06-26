import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "../stores/auth";

import LoginView from "../views/LoginView.vue";
import DashboardView from "../views/DashboardView.vue";
import FormRegisterOwner from "../components/FormRegisterOwner.vue";
import HealthCheck from "../views/HealthCheck.vue";
import CommunityTypes from "../components/CommunityTypes.vue";
import Community from "../components/CommunityComponent.vue"

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
        meta: { requiresAuth: true },
        children: [
            {
                path: "owner",
                component: FormRegisterOwner
            },
            {
                path: "community_type",
                component: CommunityTypes
            },
            {
                path: "community",
                component: Community
            }
        ]
    },
    {
        path: "/health",
        name: "health",
        component: HealthCheck
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    const authStore = useAuthStore();
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if(!authStore.isAuthenticated) {console.log(authStore.isAuthenticated);
            await authStore.fetchUser();
        }
        if(!authStore.isAuthenticated) {
            next({ name: "Login" });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;