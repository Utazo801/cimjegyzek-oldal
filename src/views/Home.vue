<template>
  <div class="home container">
    <h1>Címjegyzék</h1>
    <Logout />
    <Table />
  </div>
</template>

<script>
import { mapGetters } from "vuex";

import Dataservice from "../services/dataservice";

import Table from "../components/table";
import Logout from "../components/logout";

export default {
  name: "Home",
  components: {
    Table,
    Logout,
  },
  data() {
    return {
      peopleList: [],
    };
  },
  mounted() {
    Dataservice.peoplelist().then((resp) => {
      this.peopleList = resp.data;
    });
  },
  computed: {
    ...mapGetters(["getLoggedIn"]),
  },
};
</script>
