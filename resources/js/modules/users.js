import axios from 'axios';

const getters = {
    isAdmin(state) {
        return state.user.role === state.roles.admin;
    },
    isUser(state) {
        return state.user.role === state.roles.user;
    }
}

const state = {
    user: {},
    roles: {
        admin: 'admin',
        user: 'user'
    },
    errors: {}
}


const mutations = {
    setUser(state, user) {
        state.user = user;
    },
}

const actions = {
    getUser({commit}) {
        return new Promise((resolve, reject) => {
            axios.get('/user')
                .then(result => {
                    commit('setUser', result.data.data);
                    resolve();
                })
                .catch(error => {
                    reject(error.response && error.response.data.message || 'Error.');
                });
        });
    },
    getUsers({commit}) {
        return new Promise((resolve, reject) => {
            axios.get('/users')
                .then(result => {
                    resolve(result);
                })
                .catch(error => {
                    reject(error.response && error.response.data.message || 'Error.');
                });
        });
    },
    addUser({commit}, user) {
        return new Promise((resolve, reject) => {
            axios.post('/users/store', user)
                .then(result => {
                    resolve(result);
                })
                .catch(error => {
                    commit('setErrors', error.response.data.errors);
                    reject(error.response && error.response.data.message || 'Error.');
                });
        });
    },
    getUserWithId({commit}, user_id) {
        return new Promise((resolve, reject) => {
            axios.get('/users/' + user_id)
                .then(result => {
                    resolve(result);
                })
                .catch(error => {
                    reject(error.response && error.response.data.message || 'Error.');
                });
        });
    },
    updateUser({commit}, user) {
        return new Promise((resolve, reject) => {
            axios.patch('/users/' + user.id, user)
                .then(result => {
                    resolve(result);
                })
                .catch(error => {
                    commit('setErrors', error.response.data.errors);
                    reject(error.response && error.response.data.message || 'Error.');
                });
        });
    },
    deleteUser({commit},user){
        return new Promise((resolve, reject) => {
            axios.delete('/users/' + user.id, user)
                .then(result => {
                    resolve(result);
                })
                .catch(error => {
                    commit('setErrors', error.response.data.errors);
                    reject(error.response && error.response.data.message || 'Error.');
                });
        });
    }
}

export default {
    state,
    mutations,
    actions,
    getters
}