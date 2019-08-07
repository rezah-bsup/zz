import Vue from 'vue'
import Vuex from 'vuex'
import Users from './modules/users'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {Users},
    state: {},
    getters: {},
    mutations: {
        setErrors(state, error) {
            state.errors = error
        }
    },
    actions: {}
});
