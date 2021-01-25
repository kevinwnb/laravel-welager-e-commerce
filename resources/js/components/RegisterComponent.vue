<template>
  <div class="container text-center">
    <form
      @submit.prevent="handleRegister"
      class="border p-2 my-5 bg-light rounded"
      style="text-align: initial; min-width: 18rem; display: inline-block"
    >
      <h4 class="text-center mb-3">Create Account</h4>
      <div class="form-group">
        <label for="name">First Name: </label>
        <input
          class="form-control"
          id="first_name"
          name="first_name"
          v-model="register_data.first_name"
        />
        <div class="invalid-feedback">Please enter your first name.</div>
      </div>
      <div class="form-group">
        <label for="name">Last Name: </label>
        <input
          class="form-control"
          id="last_name"
          name="last_name"
          v-model="register_data.last_name"
        />
        <div class="invalid-feedback">Please enter your last name.</div>
      </div>
      <div class="form-group">
        <label for="email">Email: </label>
        <input
          class="form-control"
          id="email"
          name="email"
          v-model="register_data.email"
        />
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>
      <div class="form-group">
        <label for="password">Password: </label>
        <input
          class="form-control"
          id="password"
          name="password"
          type="password"
          v-model="register_data.password"
        />
        <div class="invalid-feedback" id="isEmptyError">
          Please enter a password.
        </div>
        <div class="invalid-feedback" id="isLessThan8Error">
          6 characters minimum
        </div>
      </div>
      <div class="form-group">
        <label for="password">Repeat Password: </label>
        <input
          class="form-control"
          id="repeatpassword"
          name="repeatpassword"
          type="password"
          v-model="register_data.repeatpassword"
        />
        <div class="invalid-feedback">Passwords do not match.</div>
      </div>
      <input type="submit" class="btn btn-info w-100 mt-3" value="Create" />
      <a href="/login" class="text-center p-3 d-block">Sign In</a>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      is_authenticated: false,
      is_registered: false,
      register_data: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        repeatpassword: "",
      },
    };
  },
  created() {
    document.getElementById("body").style.backgroundColor = "#17a2b8";
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    validateEmail: function (email) {
      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    },
    handleRegister: function () {
      //first name
      if (this.register_data.first_name.length == 0) {
        document.getElementById("first_name").classList.add("is-invalid");
      } else {
        document.getElementById("first_name").classList.remove("is-invalid");
      }
      //last name
      if (this.register_data.last_name.length == 0) {
        document.getElementById("last_name").classList.add("is-invalid");
      } else {
        document.getElementById("last_name").classList.remove("is-invalid");
      }
      //email
      if (
        !this.validateEmail(this.register_data.email) ||
        this.register_data.email.length == 0
      ) {
        document.getElementById("email").classList.add("is-invalid");
      } else {
        document.getElementById("email").classList.remove("is-invalid");
      }
      //passwords
      if (
        this.register_data.password.length < 6 &&
        this.register_data.password.length > 0
      ) {
        document.getElementById("password").classList.add("is-invalid");
        document.getElementById("isLessThan8Error").classList.remove("d-none");
      } else {
        document.getElementById("isLessThan8Error").classList.add("d-none");
      }
      if (this.register_data.password.length == 0) {
        document.getElementById("password").classList.add("is-invalid");
        document.getElementById("isEmptyError").classList.remove("d-none");
      } else {
        document.getElementById("isEmptyError").classList.add("d-none");
      }
      if (this.register_data.password.length >= 6) {
        document.getElementById("password").classList.remove("is-invalid");
      }
      //repeat password
      if (this.register_data.password != this.register_data.repeatpassword) {
        document.getElementById("repeatpassword").classList.add("is-invalid");
      } else {
        document
          .getElementById("repeatpassword")
          .classList.remove("is-invalid");
      }

      var data = new FormData();
      data.append("first_name", this.register_data.first_name);
      data.append("last_name", this.register_data.last_name);
      data.append("email", this.register_data.email);
      data.append("password", this.register_data.password);
      data.append("password_confirmation", this.register_data.repeatpassword);
      fetch("/api/register", {
        method: "POST",
        body: data,
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          Accept: "application/json",
        },
      })
        .then((res) => {
          if (res.status == 200) {
            this.is_registered = true;
          }

          return res.json();
        })
        .then((data) => {
          alert(data.customer.id);
        });
    },
  },
};
</script>
