
export const setToken = (state, token) => {
  state.token = token
  state.isAuthenticated = true
  window.localStorage.setItem('token', token)
}

export const removeToken = (state) => {
  state.token = ''
  state.isAuthenticated = false
}

export const setMe = (state, me) => {
  state.me = me
}
