<template>
  <div>
    <h1>Login</h1>
    <div class="mx-auto">
      <form>
        <div class="form-group" id="formdiv">
          <label for="username">Felhasználónév</label>
          <input
            type="text"
            class="form-control"
            name="userid"
            id="userid"
            v-model="userid"
          />
        </div>
        <div class="form-group ">
          <label for="password">Jelszó</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="pwd"
            v-model="pwd"
          />
        </div>
        <button
          type="button"
          class="btn btn-outline-primary mt-2"
          @click="login"
        >
          Submit
        </button>
      </form>
    </div>

    <p>
      Felhasználónév: admin <br />
      Jelszó: admin
    </p>
    <Logout />
  </div>
</template>

<script>
import { mapGetters } from "vuex";

import Dataservice from "../services/dataservice";
import Logout from "../components/logout";
export default {
  name: "Login",
  components: {
    Logout,
  },
  data() {
    return {
      userid: "",
      pwd: "",
    };
  },
  methods: {
    login() {
      if (this.userid != "" && this.password != "") {
        Dataservice.login({
          userid: this.userid,
          pwd: this.pwd,
        }).then((res) => {
          this.$store.dispatch("changeLoginStatus", res.data[0].status);
          this.$router.push("/");
        });

        if (this.isLoggedIn == false) {
          alert("hibás felhasználónév vagy jelszó");
        }
      } else {
        alert("Üres mezők");
      }
    },
  },
  computed: {
    ...mapGetters(["getLoggedIn"]),
  },
};
</script>

<style scoped>
input {
  margin: auto;
  width: 20%;
}
</style>
