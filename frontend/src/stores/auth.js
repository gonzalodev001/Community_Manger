import { defineStore } from "pinia";

export const useAuthStore = defineStore('user',{

    state: () => ({
        user: {},
        token: null,
        isAuthenticated: false,
        error: null,
        baseURL: "http://localhost:8000"
    }),
    getters: {
        getUser(state) {
            return state.user;
        }
    },
    actions: {
        doLoginAction(payload) {

            fetch("http://localhost:8000/api/login_check", {
                method: "POST",
                body: JSON.stringify(payload),
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(async response => {
                const data = await response.json();
                
                if(response.ok == false) {
                    this.token = null;
                    const error = (data && data.message) || response.statusText;
                    return false;
                } else {
                    this.token = data.token;
                    this.isAuthenticated = true;

                    window.localStorage.setItem("token", data.token);
                    this.initUser(this.token);
                    //this.getUserPersonData(this.user.UserId);
                    return true;
                }
            }).catch(error => {
                console.error("There was an error! ", error);
            });
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
        },

        getUserPersonData(userId) {
            fetch("",{
                method: "GET",
                body: JSON.stringify({ id: `${userId}`}),
                headers: {
                  "Content-Type": "·application/json",
                  "Authorization": `Bearer ${useAuthStore.token}`
                }
            })
                .then(response => response.json())
                .then(data => {
                  if(data) {
                    this.user.personalInformation = data.name;
                  }
            });
        }
    }
});
//`string text`