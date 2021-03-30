import { createStore } from 'vuex';
import axios from "axios";
import { BACKEND_URL } from './services/dataservice';
const store = createStore({
    state() {
        return {
            isLoggedIn: false,
            peopleData: [],
        }
    },
    getters: {
        getLoggedIn(state) {
            return state.isLoggedIn;
        },
        getPeopleData(state) {
            return state.peopleData;
        },
        getPerson: (state) => (id) => {
            return state.peopleData.find(peopleData => peopleData.PeopleId === id)
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


    },
    mutations: {
        loginStatus(state, isLoggedIn) {
            state.isLoggedIn = isLoggedIn;
        },
        getPeopleData(state, data) {
            state.peopleData = data;
        },

    }
});
export default store;