import Axios from 'axios';
export const BACKEND_URL = 'http://localhost/13A/cimjegyzek-backend/';
export default {
    peoplelist() {
        return Axios.get(BACKEND_URL + 'peoplelist.php')
            .then(res => {
                //console.log(res);
                return res;
            })
            .catch(err => {
                return Promise.reject(err);
            });
    },
    peoplesearch(data) {
        return Axios.post(BACKEND_URL + "peoplesearch.php", data, { headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
            .then(res => {
                return res;
            })
            .catch(err => {
                return Promise.reject(err);
            });
    },
    login(data) {

        return Axios.post(BACKEND_URL + "login.php", data, { headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
            .then(res => {
                console.log(res.data[0]);
                return res;
            })
            .catch(err => {
                return Promise.reject(err);
            });
    },
    logout() {

    }
}