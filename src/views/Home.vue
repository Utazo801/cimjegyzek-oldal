<template>
  <div class="home">
    <h1>Címjegyzék</h1>
    <Table />
  </div>
</template>

<script>
import Dataservice from "../services/dataservice";
import Table from "../components/table";
export default {
  name: "Home",
  components: {
    Table,
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
};
</script>
