<template>
  <div>
    <div class="border-top">
      <button
        type="button"
        @click="showModal"
        class="btn btn-success mx-2 mt-1"
      >
        Új felvétele
      </button>
      <button
        type="button"
        @click="showModal"
        class="btn btn-warning mx-2 mt-1"
      >
        Módosítás
      </button>
      <button type="button" @click="showModal" class="btn btn-danger mx-2 mt-1">
        Törlés
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "data-manipulators",
  components: {},
  data() {
    return {
      modal: false,
    };
  },
  methods: {
    showModal() {
      this.modal = true;
      this.$store.dispatch("getModal", this.modal);
    },
  },
};
</script>

<style></style>
