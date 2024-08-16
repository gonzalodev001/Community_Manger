import { defineStore } from "pinia";

export const useAuthStore = defineStore('user',{

    state: () => ({
        user: {},
        token: null,
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
            try {
                const response = await fetch("http://localhost:8000/api/login_check", {
                    method: "POST",
                    body: JSON.stringify(payload),
                    headers: {
                        "Content-Type": "application/json"
                    },
                    credentials: 'include',
                });
            
                const data = await response.json();
                if(data.success) {
                    this.isAuthenticated = true;
                    await this.fetchUser();
                    //this.getUserPersonData(this.user.UserId); password: 123A567b9
                    return true;
                } else {
                    this.token = null;
                    const error = (data && data.message) || response.statusText;
                    return false;
                }
            } catch(error) {
                console.error("There was an error! ", error);
                this.isAuthenticated = false;
                this.user = null;
                return false;
            }
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
                this.user = data.data.user;console.log(this.user, data.data);
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