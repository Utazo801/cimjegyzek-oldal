<template>
  <div class="m-auto container">
    <h1 class="border-bottom">{{ personData.Name }} adatainak módisítása</h1>
    <form>
      <div
        class="form-group row mx-auto mb-2 mt-3 d-flex justify-content-center"
      >
        <label class="col-sm-1 col-form-label" for="">Név: </label>
        <div class="col-sm-11 col-md-6 col-lg-6 ">
          <input type="text" class="form-control" v-model="personData.Name" />
        </div>
      </div>
      <div class="form-group row mx-auto mb-2 d-flex justify-content-center">
        <label class="col-sm-1 col-form-label" for="">Lakcím: </label>
        <div class="col-sm-11 col-md-6 col-lg-6">
          <input
            type="text"
            class="form-control"
            v-model="personData.Address"
          />
        </div>
      </div>
      <div class="form-group row mx-auto mb-2 d-flex justify-content-center">
        <label class="col-sm-1 col-form-label" for="">Munkahely: </label>
        <div class="col-sm-11 col-md-6 col-lg-6">
          <input
            type="text"
            class="form-control"
            v-model="personData.Workplace"
          />
        </div>
      </div>
      <div class="form-group row mx-auto mb-2 d-flex justify-content-center">
        <label class="col-sm-1 col-form-label" for="">Email: </label>
        <div class="col-sm-11 col-md-6 col-lg-6">
          <input type="email" class="form-control" v-model="personData.Email" />
        </div>
      </div>
      <div class="form-group row mx-auto mb-2 d-flex justify-content-center">
        <label class="col-sm-1 col-form-label" for="">Email típusa: </label>
        <div class="col-sm-11 col-md-6 col-lg-6">
          <input
            type="text"
            class="form-control"
            v-model="personData.EmailLabel"
          />
        </div>
      </div>
      <div class="form-group row mx-auto mb-2 d-flex justify-content-center">
        <label class="col-sm-1 col-form-label" for="">Telefonszám: </label>
        <div class="col-sm-11 col-md-6 col-lg-6">
          <input
            type="text"
            class="form-control"
            v-model="personData.PhoneNumber"
          />
        </div>
      </div>
      <div class="form-group row mx-auto mb-2 d-flex justify-content-center">
        <label class="col-sm-1 col-form-label" for="">Szám típusa: </label>
        <div class="col-sm-11 col-md-6 col-lg-6">
          <input type="text" class="form-control" v-model="personData.Label" />
        </div>
      </div>
      <button
        type="button"
        @click="updateData"
        class="btn btn-outline-success mt-2"
      >
        Mentés
      </button>
      <button
        type="button"
        @click="backToTheMenu"
        class="btn btn-outline-danger mt-2 mx-3"
      >
        Vissza
      </button>
    </form>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import dataservice from "../services/dataservice";
export default {
  name: "UpdatePerson",
  data() {
    return {
      id: this.$route.params.id,
      personData: {},
    };
  },
  methods: {
    backToTheMenu() {
      this.$router.push("/");
    },
    updateData() {
      dataservice.updatePersonData({
        PeopleId: this.id,
        Name: this.personData.Name,
        Address: this.personData.Address,
        Workplace: this.personData.Workplace,
        Email: this.personData.Email,
        EmailLabel: this.personData.EmailLabel,
        PhoneNumber: this.personData.PhoneNumber,
        Label: this.personData.Label,
      });
    },
  },
  mounted() {
    this.personData = this.$store.getters.getPerson(this.id);
  },
  computed: {
    ...mapGetters(["getPerson"]),
  },
};
</script>

<style></style>
