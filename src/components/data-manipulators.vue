<template>
  <div>
    <div class="border-top">
      <button
        type="button"
        @click="newWorker"
        class="btn btn-success mx-2 mt-1"
      >
        Új felvétele
      </button>
      <button
        type="button"
        @click="(modal = !modal), modifyWorker"
        class="btn btn-warning mx-2 mt-1"
      >
        Módosítás
      </button>
      <button
        type="button"
        @click="(modal = !modal), deleteWorker"
        class="btn btn-danger mx-2 mt-1"
      >
        Törlés
      </button>
    </div>
    <Manipulator :modal="modal" />
  </div>
</template>

<script>
import Manipulator from "./manipulator-window";
export default {
  name: "data-manipulators",
  components: {
    Manipulator,
  },
  data() {
    return {
      modal: false,
    };
  },
  methods: {
    newWorker() {
      this.modal = true;
    },
    modifyWorker() {
      this.modal = true;
    },
    deleteWorker() {
      this.modal = true;
    },
  },
};
</script>

<style></style>
