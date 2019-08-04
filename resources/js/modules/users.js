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
    }
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
}

export default {
    state,
    mutations,
    actions,
    getters
}