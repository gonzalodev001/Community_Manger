import { api } from "boot/axios"

export const doLoginAction = async ({ commit, dispatch }, payload) => {

  await api.post('api/login_check', payload).then(responde => {
    console.log(payload)
    console.log(responde.data)
    const token = responde.data.token
    commit('setToken', token)
    console.log('antesss-----------')
    api.defaults.headers.common['Authorization'] = 'Bearer ' + token
    console.log('pasoooo------------')
    console.log(api.defaults.headers.common)
    dispatch('getMeActions', token)
  })
}

export const getMeAction = async ({ commit }, token) => {
  console.log(token)
}

export const init = async ({ commit, dispatch}) => {
  const token = localStorage.getItem('token')
  console.log(token)
  if (token) {
    await commit('setToken', token)
    api.defaults.headers.common['Authorization'] = 'Bearer ' + token
  } else {
    commit('removeToken')
  }
}
