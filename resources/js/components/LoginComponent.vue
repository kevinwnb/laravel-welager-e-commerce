<template>
  <div class="container text-center">
    <form
      @submit.prevent="handleLogin"
      class="border p-2 my-5 bg-light"
      style="text-align: initial; min-width: 18rem; display: inline-block"
    >
      <h4 class="text-center mb-3">Login</h4>
      <div class="form-group">
        <label for="emailphone">Email or phone: </label>
        <input
          class="form-control"
          id="emailphone"
          name="emailphone"
          v-model="credentials.emailphone"
        />
      </div>
      <div class="form-group">
        <label for="password">Password: </label>
        <input
          class="form-control"
          id="password"
          name="password"
          type="password"
          v-model="credentials.password"
        />
      </div>
      <input type="submit" class="btn btn-info w-100 mt-3" value="Continue" />
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      credentials: {
        emailphone: "",
        password: "",
      },
      is_authenticated: false,
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    handleLogin: function () {
      var data = new FormData();
      data.append("emailphone", this.credentials.emailphone);
      data.append("password", this.credentials.password);
      fetch("/api/login", {
        method: "POST",
        body: data,
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          Accept: "application/json",
        },
      }).then((res) => {
        if (res.status == 200) {
          location.reload();
          //return res.json();
        } else {
          alert("Your credentials do not match our records, try again");
        }
      });
      //.then((data) => console.log(data));
    },
  },
};
</script>
