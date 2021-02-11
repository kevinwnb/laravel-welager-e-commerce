<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="signInModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div
          v-if="loading"
          class="position-absolute w-100 h-100"
          style="
            border-radius: 0.3rem;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.7);
          "
        >
          <div class="d-flex h-100 justify-content-center align-items-center">
            <div class="spinner-border text-info" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Sign In</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="signIn()">
            <input
              type="text"
              v-model="email"
              placeholder="Email"
              class="form-control"
            />
            <input
              type="password"
              v-model="password"
              placeholder="Password"
              class="form-control mt-2"
            />
            <button type="submit" class="btn btn-info w-100 mt-2">
              Sign In
            </button>
            <a href="javascript:void(0)" class="mt-2 d-inline-block"
              >Forgot password?</a
            >
          </form>
          <div class="text-center mt-3">
            <a
              href="register"
              class="btn btn-outline-info d-block"
              @click="emit()"
              >Create Account</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      authenticated: false,
      email: "",
      password: "",
    };
  },
  created() {
    //
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    signIn: function () {
      this.loading = true;
      var data = new FormData();
      data.append("emailphone", this.email);
      data.append("password", this.password);
      fetch("api/login", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: data,
      })
        .then((res) => res.json())
        .then((data) => {
          this.authenticated = data.is_authenticated;
          if (this.authenticated == true) {
            this.$root.$emit("checkLogin");
            $("#signInModal").modal("hide");
            $("#signInModal").on("hidden.bs.modal", () => {
              this.loading = false;
              this.$emit("success");
            });
          } else {
            this.loading = false;
          }
        });
    },
  },
};
</script>
