<template>
  <div class="container my-3">
    <div class="row">
      <div class="col-md-9">
        <div
          class="p-3 mb-3 d-flex align-items-center flex-wrap"
          style="border: 1px solid black; flex-direction: row"
          v-for="item in cart_items"
          :key="item.id"
        >
          <img style="width: auto; height: 150px" :src="item.image.path" />
          <div class="align-self-start" style="flex-grow: 1">
            <h5 class="m-0">{{ item.name }}</h5>
            <p class="m-0">
              {{ item.price }}
            </p>
            <select
              v-model="item.quantity"
              @change="
                changeItemQuantity(item.id, item.product_id, item.quantity)
              "
            >
              <option v-for="n in 100" :key="n">
                {{ n }}
              </option>
            </select>
          </div>
          <div>
            <a
              class="d-block"
              @click="deleteItemFromCart(item.id, item.product_id)"
              href="javascript:void(0)"
              ><i class="fas fa-trash-alt"></i> Remove</a
            >
          </div>
        </div>
        <div
          class="alert alert-secondary"
          v-if="message != '' && quantity == 0"
        >
          {{ message }}
        </div>
      </div>
      <div class="col-md-3">
        <div class="p-3 border" style="height: 400px">
          <h5>Subtotal:</h5>
          <p>${{ formatMoney(subtotal) }}</p>
          <h5>Total:</h5>
          <p>${{ formatMoney(total) }}</p>
          <p class="text-success">3 day shipping</p>
          <a class="btn btn-info d-block">Continue to Checkout</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cart_items: [],
      message: "",
      quantity: 0,
      subtotal: 0.0,
      total: 0.0,
    };
  },
  created() {
    this.getCartItems();
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    formatMoney: function (number, decPlaces, decSep, thouSep) {
      decPlaces = isNaN((decPlaces = Math.abs(decPlaces))) ? 2 : decPlaces;
      decSep = typeof decSep === "undefined" ? "." : decSep;
      thouSep = typeof thouSep === "undefined" ? "," : thouSep;
      var sign = number < 0 ? "-" : "";
      var i = String(
        parseInt((number = Math.abs(Number(number) || 0).toFixed(decPlaces)))
      );
      var j = (j = i.length) > 3 ? j % 3 : 0;

      return (
        sign +
        (j ? i.substr(0, j) + thouSep : "") +
        i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
        (decPlaces
          ? decSep +
            Math.abs(number - i)
              .toFixed(decPlaces)
              .slice(2)
          : "")
      );
    },
    calculateSubtotal: function () {
      this.cart_items.forEach((item) => {
        this.subtotal += parseFloat(item.price);
      });
      this.subtotal = Math.round((this.subtotal + Number.EPSILON) * 100) / 100;
    },
    calculateTotal: function () {
      this.total =
        Math.round((this.subtotal * 1.15 + Number.EPSILON) * 100) / 100;
    },
    getCartItems: function () {
      this.quantity = 0;
      fetch("api/cart/items")
        .then((res) => res.json())
        .then((data) => {
          if (data.quantity == 0) {
            this.cart_items = [];
            this.message = data.message;
          } else {
            this.cart_items = data;
            this.cart_items.forEach((item) => {
              this.quantity += parseInt(item.quantity);
            });
          }
          this.calculateSubtotal();
          this.calculateTotal();
          //alert(JSON.stringify(this.cart_items));
        });
    },
    changeItemQuantity: function (id, product_id, quantity) {
      this.quantity = 0;
      this.cart_items.forEach((item) => {
        this.quantity += parseInt(item.quantity);
      });
      fetch("api/cart/item/update/quantity", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: JSON.stringify({
          id: id || null,
          product_id: product_id || null,
          quantity: quantity,
        }),
      })
        .then((res) => res.json())
        .then((data) => {
          //this.getCartItems();
          this.$root.$emit("updateCart");
        });
    },
    deleteItemFromCart: function (id, product_id) {
      this.quantity = 0;
      this.cart_items.forEach((item) => {
        this.quantity += parseInt(item.quantity);
      });
      fetch("api/cart/item/delete", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: JSON.stringify({
          id: id || null,
          product_id: product_id || null,
        }),
      })
        .then((res) => res.json())
        .then((data) => {
          this.getCartItems();
          this.$root.$emit("updateCart");
        });
    },
  },
};
</script>
