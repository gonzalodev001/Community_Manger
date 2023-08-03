import { defineStore } from "pinia";

export const useAuthStore = defineStore('user',{

    state: () => ({
        user: {},
        token: "",
        isAuthenticated: false,
        error: null,
        baseURL: "http://127.0.0.1:8000"
    }),
    getters: {
        getUser(state) {
            return state.user;
        }
    },
    actions: {
        async doLoginAction(payload) {
            console.log(JSON.stringify(payload));
            //rawResponse = await fetch(`${this.baseURL}/api/login_check`, {
            rawResponse = await fetch('/login_check', {
                method: 'POST',
                body: payload,
                mode: 'no-cors',
                headers: {
                    'Accept': 'application/json, text/plain',
                    'Content-Type': 'application/json',
                },
            });
            
            const response = await rawResponse.json();
            console.log(response);
            if(response.status == false) {
                this.token = "";
                return false;
            } else {
                console.log(response.data);
                this.token = response.data.token;
                this.isAuthenticated = true;
                this.initUser(this.toke);
                return true;
            }
        },

        logOut() {
            this.token = "";
            localStorage.removeItem("token");
        },

        initUser(token){
            const base64Url = token.split(".")[1];
            const base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
            const jsonPayload = decodeURIComponent(
              window
            .atob(base64)
              .split("")
              .map(function (c) {
                return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
              })
              .join("")
            );
            this.user = JSON.parse(jsonPayload);
        }
    }
});
//`string text`