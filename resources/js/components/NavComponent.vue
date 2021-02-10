<template>
  <div>
    <!--NAVBAR SHORT-->
    <div id="short">
      <!--upper bar-->
      <nav class="navbar navbar-dark bg-dark">
        <!--sidenav and logo-->
        <div class="d-flex align-items-center">
          <li class="nav-item">
            <a href="javascript:void(0)" onclick="openNav()" class="nav-link"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand ml-2" href="/">Wetech</a>
          </li>
        </div>

        <div class="d-flex align-items-center">
          <!--account-->
          <li class="nav-item">
            <a href="/login" class="nav-link"
              ><i class="fas fa-user"></i>
              <span style="font-size: 1rem; font-weight: bold">Account</span></a
            >
          </li>

          <!--cart-->
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link"
              ><i class="fas fa-shopping-cart"></i>
              <span style="font-size: 1rem; font-weight: bold">Cart</span></a
            >
          </li>
        </div>
      </nav>

      <!--lower bar-->
      <nav class="navbar navbar-dark bg-dark justify-content-center">
        <!--search box-->
        <form @submit.prevent="searchShort()" class="form-inline w-100">
          <div class="input-group w-100 mx-auto" style="max-width: 600px">
            <input
              v-model="mutable_search_string"
              class="form-control"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />

            <div class="input-group-append">
              <button class="btn btn-info" type="submit">
                <i class="fas fa-search"></i> Search
              </button>
            </div>
          </div>
        </form>
      </nav>
    </div>

    <!--NAVBAR WIDE-->
    <nav id="wide" class="navbar navbar-dark bg-dark">
      <div class="d-flex align-items-center">
        <li class="nav-item">
          <a href="javascript:void(0)" onclick="openNav()" class="nav-link"
            ><i class="fas fa-bars"></i
          ></a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand ml-2" href="/">Wetech</a>
        </li>
      </div>

      <form
        id="searchArea"
        @submit.prevent="search()"
        action="/search"
        class="form-inline justify-content-center"
        style="flex-grow: 1"
      >
        <div class="input-group w-100" style="max-width: 600px">
          <div class="input-group-prepend">
            <select
              v-model="mutable_category_id"
              class="custom-select"
              style="
                max-width: 150px;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
              "
              id="inputGroupSelect02"
              name="category"
            >
              <option
                v-if="
                  mutable_category_id &&
                  mutable_category_id != 0 &&
                  categories.filter(
                    (c) => c.parent_id == null && c.id == mutable_category_id
                  ).length == 0
                "
                :value="mutable_category_id"
              >
                {{
                  categories.filter((c) => c.id == mutable_category_id)[0].name
                }}
              </option>

              <option
                value="0"
                :selected="!mutable_category_id || mutable_category_id == 0"
              >
                All
              </option>

              <option
                v-for="c in categories.filter((c) => c.parent_id == null)"
                :key="c.id"
                :value="c.id"
                :selected="mutable_category_id == c.id"
              >
                {{ c.name }}
              </option>
            </select>
          </div>

          <div class="position-relative" style="flex-grow: 1">
            <input
              id="searchString"
              class="form-control w-100"
              style="border-radius: 0"
              type="search"
              placeholder="Search"
              autocomplete="off"
              aria-label="Search"
              v-model="mutable_search_string"
              @keyup="autocomplete()"
              @blur="clearAutocompleteBox()"
            />
            <div
              v-if="
                autocomplete_data !== undefined && autocomplete_data.length > 0
              "
              class="w-100 p-3 position-absolute border shadow"
              style="background-color: white; top: 100%; z-index: 11"
            >
              <a
                v-for="(item, index) in autocomplete_data"
                v-bind:key="index"
                :href="
                  'search/' + item.toLowerCase() + '/' + mutable_category_id
                "
                class="text-dark d-block my-1"
                style="font-size: 1rem"
                >{{ item.toLowerCase() }}</a
              >
            </div>
          </div>

          <div class="input-group-append">
            <button class="btn btn-info" type="submit">
              <i class="fas fa-search"></i> Search
            </button>
          </div>
        </div>
      </form>

      <!--account-->
      <li class="nav-item" style="position: relative">
        <a href="javascript:void(0)" class="nav-link"
          ><i class="fas fa-user"></i>
          <span style="font-size: 1rem; font-weight: bold"
            >Account <i class="fas fa-angle-down"></i></span
        ></a>
        <div class="dropdown-nav shadow">
          <div v-if="!is_authenticated">
            <li id="loginBtn"><a href="/login">Sign In</a></li>
            <p
              style="
                width: 100%;
                text-align: center;
                font-size: 14px;
                margin: 0;
              "
              class="text-muted"
            >
              or
            </p>
            <li><a href="/register">Create Account</a></li>
          </div>
          <li v-if="is_authenticated">
            <h5>Hello, {{ user["0"].first_name }}</h5>
            <a href="/logout" style="color: red">Sign Out</a>
          </li>
        </div>
      </li>

      <!--cart-->
      <li class="nav-item">
        <a href="cart" class="nav-link"
          ><i class="fas fa-shopping-cart"></i>
          <span
            style="
              font-size: 1rem;
              font-weight: bold;
              background-color: #17a2b8;
              border-radius: 100px;
              padding: 2px;
            "
            >{{ cart_item_quantity }}</span
          ></a
        >
      </li>
    </nav>

    <div class="subnav">
      <a
        class="d-inline-block m-1 p-1 rounded"
        v-for="c in categories.filter((c) => c.parent_id == null)"
        :key="'subnav' + c.id"
        :href="'browse/' + c.id"
        >{{ c.name }}</a
      >
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
        >&times;</a
      >
      <!--<h2>Categories</h2>-->
      <div id="menus" style="position: relative; white-space: nowrap">
        <div>
          <h5 style="color: white; margin: 8px 8px 16px 24px">Categories</h5>
          <a
            v-for="c in categories.filter((c) => c.parent_id == null)"
            :key="c.id"
            :id="c.id"
            v-on:click="sidenavNextMenu($event)"
            href="javascript:void(0)"
            class="d-flex align-items-center"
            >{{ c.name }}<i class="fas fa-chevron-right ml-auto mr-2"></i
          ></a>
          <div class="mt-3">
            <a
              v-if="!is_authenticated"
              href="/login"
              class="d-flex justify-content-center p-2 rounded ml-3 mt-3 mr-3 bg-info text-white"
              style="border: 2px solid #117a8b"
              >Sign In</a
            >
            <a
              v-if="is_authenticated"
              href="/logout"
              class="d-flex justify-content-center p-2 ml-3 mt-3 mr-3 bg-danger text-white"
              style="border: 2px solid rgba(0, 0, 0, 0.3)"
              >Sign Out</a
            >
            <p class="text-muted text-center my-3">or</p>
            <a
              v-if="!is_authenticated"
              href="register"
              class="d-flex justify-content-center p-2 ml-3 mt-2 mr-3"
              style="border: 2px solid black"
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
  props: ["search_string", "category_id"],
  data: function () {
    return {
      cart_item_quantity: 0,
      categories: [],
      is_authenticated: false,
      user: "",
      mutable_category_id: 0,
      search_string_short: "",
      mutable_search_string: this.search_string,
      autocomplete_data: [],
      pos: {},
    };
  },
  created() {
    this.checkLogin();
    this.$root.$on("checkLogin", this.checkLogin);

    this.mutable_category_id = this.category_id || 0;
    this.search_string_short = this.search_string || "";

    fetch("/api/categories")
      .then((res) => res.json())
      .then((res) => {
        this.categories = res.data;
        console.log(JSON.stringify(this.categories));
      })
      .catch(function (error) {
        console.log(error);
      });

    this.getCartItems();

    window.addEventListener("mouseup", (e) => {
      if (!document.querySelector("#searchArea").contains(e.target))
        this.autocomplete_data = [];
    });
  },
  mounted() {
    this.$root.$on("addQuantityToCart", (data) => {
      this.cart_item_quantity += data.quantity;
      //alert(JSON.stringify(data));
    });
    this.$root.$on("updateCart", () => {
      this.getCartItems();
    });
    // if (
    //   this.categories
    //     .filter((c) => c.parent_id == null)
    //     .filter((c) => c.id == this.mutable_category_id)[0] !=
    //   this.mutable_category_id
    // ) {
    //   var option = document.createElement("option");
    //   alert(this.categories);
    //   alert(this.categories.filter((c) => c.id == mutable_category_id)[0].name);
    //   option.textContent("aa");
    //   option.setAttribute("selected", "true");
    //   option.setAttribute("value", mutable_category_id);
    //   document.getElementsByName("category")[0].prepend(option);
    // }
  },
  methods: {
    clearAutocompleteBox() {},
    autocomplete() {
      fetch(
        "api/autocomplete/" +
          this.mutable_search_string +
          "/" +
          this.mutable_category_id
      )
        .then((res) => res.json())
        .then((data) => {
          var keywords = "";
          data.items.forEach((item) => {
            keywords += ", " + item.keywords;
          });
          this.autocomplete_data = keywords
            .split(", ")
            .filter((k) =>
              k.startsWith(this.mutable_search_string.toLowerCase())
            )
            .map((k) => k.trim())
            .slice(0, 10);
          this.toggleBodyOverflow();
          //alert(JSON.stringify(this.autocomplete_data, null, 2));
        });
    },
    checkLogin() {
      fetch("/api/login/check")
        .then((res) => res.json())
        .then((data) => {
          this.is_authenticated = data.is_authenticated;
          this.user = data.user;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getCartItems() {
      fetch("/api/cart/items")
        .then((res) => res.json())
        .then((data) => {
          let quantity = 0;
          if (data.length > 0) {
            data.forEach((item) => {
              quantity += parseInt(item.quantity);
            });
          }
          this.cart_item_quantity = quantity;
        });
    },
    search() {
      var url = this.mutable_search_string
        ? "/search/" +
          this.mutable_search_string +
          "/" +
          this.mutable_category_id
        : "/";
      window.location.href = url;
    },
    searchShort() {
      var url = this.mutable_search_string
        ? "/search/" + this.mutable_search_string + "/0"
        : "/";
      window.location.href = url;
    },
    goBack(e) {
      var menusLeftPosition = Number(
        document.querySelector("#menus").style.left.slice(0, -2)
      );
      $("#menus").animate(
        { left: menusLeftPosition + 300 + "px" },
        200,
        function () {
          e.target.parentElement.remove();
          var menusWidth = Number(document.querySelector("#menus").style.width);
          document.querySelector("#menus").style.width =
            menusWidth - 300 + "px";
        }
      );
    },
    sidenavNextMenu(e) {
      var newMenu = document.createElement("div");
      var goBack = document.createElement("a");
      goBack.setAttribute("href", "javascript:void(0)");
      goBack.style.color = "#ffffff";
      var goBackArrow = document.createElement("i");
      goBackArrow.classList.add("fas");
      goBackArrow.classList.add("fa-arrow-left");
      goBack.prepend(goBackArrow, " Go Back");
      goBack.addEventListener("click", (e) => {
        this.goBack(e);
      });
      newMenu.appendChild(goBack);

      var newMenuItem;
      var newMenuItemArrowRight;
      this.categories
        .filter((c) => c.parent_id == e.target.id)
        .forEach((c) => {
          //   newMenuItem = document.createElement("a");
          //   newMenuItem.setAttribute("href", "/browse/" + c.id);
          //   newMenuItem.classList.add("d-flex");
          //   newMenuItem.classList.add("align-items-center");
          //   newMenuItem.id = c.id;
          //   //   newMenuItemArrowRight = document.createElement("i");
          //   //   newMenuItemArrowRight.classList.add("fas");
          //   //   newMenuItemArrowRight.classList.add("fa-chevron-right");
          //   //   newMenuItemArrowRight.classList.add("ml-auto");
          //   //The single line of code below will write the category name into the anchor tag
          //   //newMenuItem.prepend(c.name);
          //   newMenuItem.prepend("All");
          //   newMenu.appendChild(newMenuItem);
        });

      newMenuItem = document.createElement("a");
      newMenuItem.setAttribute("href", "/browse/" + e.target.id);
      newMenuItem.classList.add("d-flex");
      newMenuItem.classList.add("align-items-center");
      newMenuItem.id = e.target.id;
      newMenuItem.prepend("All");
      newMenu.appendChild(newMenuItem);
      e.target.parentElement.parentElement.appendChild(newMenu);

      //calculations
      var menusLeftPosition = Number(
        document.querySelector("#menus").style.left.slice(0, -2)
      );
      $("#menus").animate({ left: menusLeftPosition - 300 + "px" }, 200);
      var menusWidth = Number(document.querySelector("#menus").style.width);
      document.querySelector("#menus").style.width = menusWidth + 300 + "px";
    },
  },
};
</script>
