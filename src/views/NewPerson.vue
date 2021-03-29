<template>
  <div class="m-auto container">
    <h1 class="border-bottom">Új Személy felvétele</h1>
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
        @click="dataSending"
        class="btn btn-outline-success mt-2"
      >
        Mentés
      </button>
    </form>
  </div>
</template>

<script>
import dataservice from "../services/dataservice";
export default {
  name: "NewPerson",
  data() {
    return {
      personData: {
        Name: "",
        Address: "",
        Workplace: "",
        Email: "",
        EmailLabel: "",
        PhoneNumber: "",
        Label: "",
      },
    };
  },
  methods: {
    dataSending() {
      if (
        this.personData.Name != "" ||
        this.personData.Address != "" ||
        this.personData.Workplace != "" ||
        this.personData.Email != "" ||
        this.personData.EmailLabel != "" ||
        this.personData.PhoneNumber != "" ||
        this.personData.Label != ""
      ) {
        dataservice.newPersonInsert({
          Name: this.personData.Name,
          Address: this.personData.Address,
          Workplace: this.personData.Workplace,
          Email: this.personData.Email,
          EmailLabel: this.personData.EmailLabel,
          PhoneNumber: this.personData.PhoneNumber,
          Label: this.personData.Label,
        });
      } else {
        alert("Üres mezők!");
      }
    },
  },
};
</script>

<style></style>
