import { createStore } from 'vuex';
import axios from "axios";
import { BACKEND_URL } from './services/dataservice';
const store = createStore({
    state() {
        return {
            isLoggedIn: false,
            peopleData: [],
            modal: false,
        }
    },
    getters: {
        getLoggedIn(state) {
            return state.isLoggedIn;
        },
        getPeopleData(state) {
            return state.peopleData;
        },
        getModal(state) {
            return state.modal;
        }
    },
    actions: {
        changeLoginStatus(state, isLoggedIn) {
            state.commit("loginStatus", isLoggedIn)
        },
        getPeopleData(state) {
            axios.post(BACKEND_URL + "peoplelist.php")
                .then(res => {
                    state.commit("getPeopleData", res.data);
                })
                .catch(err => {
                    return Promise.reject(err);
                });

        },
        getModal(state, modal) {
            state.commit("getModal", modal);
        }

    },
    mutations: {
        loginStatus(state, isLoggedIn) {
            state.isLoggedIn = isLoggedIn;
        },
        getPeopleData(state, data) {
            state.peopleData = data;
        },
        getModal(state, modal) {
            state.modal = modal;
        }
    }
});
export default store;