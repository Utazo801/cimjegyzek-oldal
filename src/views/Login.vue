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
            name="password"
            v-model="password"
          />
        </div>
        <button type="submit" class="btn btn-primary mt-2" @click="login">
          Submit
        </button>
      </form>
    </div>

    <p>
      Felhasználónév: admin <br />
      Jelszó: admin
    </p>
  </div>
</template>

<script>
import Dataservice from "../services/dataservice";
export default {
  name: "login",
  data() {
    return {
      userid: "",
      password: "",
    };
  },
  methods: {
    login() {
      Dataservice.login({
        userid: this.userid,
        password: this.password,
      }).then((resp) => {
        console.log(resp);
      });
    },
  },
};
</script>

<style scoped>
input {
  margin: auto;
  width: 20%;
}
</style>
