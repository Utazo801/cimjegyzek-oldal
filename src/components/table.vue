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
            <th></th>
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

            <td v-if="this.$store.state.isLoggedIn">
              <router-link
                class="btn btn-warning"
                :to="'/person/update/' + p.PeopleId"
              >
                Módosítás
              </router-link>
              <button
                type="button"
                @click="YeetUser(p.PeopleId)"
                class="btn btn-danger mx-2 mt-1"
              >
                Törlés
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="this.$store.state.isLoggedIn" class="border-top">
      <router-link to="/person/new" class="btn btn-success mx-2 mt-1">
        Új felvétele
      </router-link>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Dataservice from "../services/dataservice";

export default {
  name: "Table",
  components: {},
  data() {
    return {
      name: "",
      peopleList: this.$store.getters.getPeopleData,
    };
  },
  created() {
    Dataservice.peoplelist().then((resp) => {
      this.peopleList = resp.data;
    });
    this.$store.dispatch("getPeopleData");
  },
  methods: {
    search() {
      Dataservice.peoplesearch({ name: this.name }).then((resp) => {
        this.peopleList = resp.data;
      });
    },
    YeetUser(id) {
      Dataservice.deleteUser({ PeopleId: id });
      this.$store.dispatch("getPeopleData");
    },
  },
  computed: {
    ...mapGetters(["getPeopleData"]),
  },
};
</script>

<style></style>
