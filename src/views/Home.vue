<template>
  <div class="home container">
    <h1>Címjegyzék</h1>
    <Logout />
    <Table />
    <Modal v-if="modal" />
    <DataManipulators />
  </div>
</template>

<script>
import { mapGetters } from "vuex";

import Dataservice from "../services/dataservice";

import Table from "../components/table";
import Logout from "../components/logout";
import Modal from "../components/manipulator-window";
import DataManipulators from "../components/data-manipulators";

export default {
  name: "Home",
  components: {
    Table,
    Logout,
    DataManipulators,
    Modal,
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
