<template>
  <div>
    <div>
      <h3>Személy keresése:</h3>
      <div class="input-group justify-content-center mb-3 mt-4">
        <form>
          <input type="text" class="form-control" v-model="name" />
          <input
            type="button"
            class="btn btn-outline-primary mx-2 mt-1"
            @click="search"
            value="Search"
          />
        </form>
      </div>
    </div>
    <div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Név</th>
            <th scope="col">Lakcím</th>
            <th scope="col">Munkahely</th>
            <th scope="col">Telefonszám</th>
            <th scope="col">Tel. típus</th>
            <th scope="col">E-mail cím</th>
            <th scope="col">E-mail típus</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="p in peopleList" :key="p.PeopleId">
            <td>{{ p.Name }}</td>
            <td>{{ p.Address }}</td>
            <td>{{ p.Workplace }}</td>
            <td>{{ p.PhoneNumber }}</td>
            <td>{{ p.Label }}</td>
            <td>{{ p.Email }}</td>
            <td>{{ p.EmailLabel }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Dataservice from "../services/dataservice";

export default {
  name: "Table",
  components: {},
  data() {
    return {
      name: "",
      peopleList: [],
    };
  },
  mounted() {
    Dataservice.peoplelist().then((resp) => {
      this.peopleList = resp.data;
    });
  },
  methods: {
    search() {
      Dataservice.peoplesearch({ name: this.name }).then((resp) => {
        this.peopleList = resp.data;
      });
    },
  },
};
</script>

<style></style>
