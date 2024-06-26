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
                console.log(data);
                if(data.OK == false) {
                    this.token = null;
                    const error = (data && data.message) || response.statusText;
                    return false;
                } else {
                    this.isAuthenticated = true;
                    console.log(this.isAuthenticated);
                    //this.fetchUser();
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

        async fetchUser() {
            try {
                const response = await fetch('http://localhost:8000/api/users', {
                    method: 'GET',
                    headers: {
                        "Content-Type": "application/json"
                    },
                    credentials: 'include', // include cookies in requests
                });

                if (!response.ok) {
                    throw new Error('Failed to fetch user data');
                }

                const data = await response.json();
                this.user = data;
            } catch (error) {
                this.user = null;
                this.isAuthenticated = false;
            }
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