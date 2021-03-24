<template>
  <div v-if="this.$store.state.isLoggedIn">
    <button class="btn btn-outline-primary" @click="handleLogout">
      Logout
    </button>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "logout",
  data() {
    return {};
  },
  methods: {
    handleLogout() {
      this.$store.dispatch(
        "changeLoginStatus",
        !this.$store.getters.getLoggedIn
      );
    },
  },
  computed: {
    ...mapGetters(["getLoggedIn"]),
  },
};
</script>

<style></style>
