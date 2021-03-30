<template>
  <div class="home container">
    <h1>Címjegyzék</h1>
    <Logout />
    <Table />
  </div>
</template>

<script>
import { mapGetters } from "vuex";

import Table from "../components/table";
import Logout from "../components/logout";

export default {
  name: "Home",
  components: {
    Table,
    Logout,
  },
  computed: {
    ...mapGetters(["getLoggedIn"]),
  },
};
</script>
