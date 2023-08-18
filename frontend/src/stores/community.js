import { defineStore } from "pinia";
import { useAuthStore } from "./auth";

export const useCommunityStore = defineStore({
    id: "community",
    state: () => ({
        rawItems: []
    }),

    getters: {
        items: (state) => {
            return state.rawItems;
        }
    },

    actions: {
        register(id, name) {
            console.log(id)
            console.log(name)
            const token = localStorage.getItem("token");
            console.log(token)
            fetch("http://localhost:8000/api/community_types",{
                method: "POST",
                mode: "cors",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json",
                    Authorization: `Bearer ${token}`
                },
                body: JSON.stringify({ id: id, name: name})
            })
              .then(response => response.json())
              .then(data => {
                console.log(data);
            });
        },

        searchAllItems() {
            const auth = useAuthStore();
            const token = localStorage.getItem("token");
            fetch(`${auth.baseURL}/api/community_types`, {
                method: "GET",
                mode: "cors",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json",
                    Authorization: `Bearer ${token}`
                }
            })
              .then(res => res.json())
              .then(response => {
                //console.log(response[0]);
                this.rawItems = response;
                //console.log(this.rawItems[1].name)
            });
        }
    }
});
`Bearer token`