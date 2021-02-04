<template>
  <div>
    <!--Address Modal-->
    <address-management-modal-component
      @changeAddress="changeAddress($event)"
    ></address-management-modal-component>

    <!--Payment Method Modal-->
    <payment-method-management-modal-component
      :paymentmethodid="payment_method.id"
      @changePaymentMethod="changePaymentMethod"
    ></payment-method-management-modal-component>

    <div class="container py-3">
      <div class="row">
        <div class="col-md-9">
          <div class="border bg-light p-3">
            <h5>Shipping</h5>
            <p class="text-muted">
              {{ address.address }}<br />
              {{ address.city }}, {{ address.province }} {{ address.postal_code
              }}<br />
              {{ address.country }}<br />
              Phone: {{ address.phone }}
            </p>
            <a
              class="btn btn-warning"
              data-toggle="modal"
              data-target="#addressManagementModal"
              href="#"
              >Change</a
            >
          </div>
          <div class="mt-3 border bg-light p-3">
            <h5>Payment Method</h5>
            <p class="text-muted">
              {{ payment_method.card.brand.toUpperCase() }} **** **** ****
              {{ payment_method.card.last4 }}
            </p>
            <a
              class="btn btn-warning"
              data-toggle="modal"
              data-target="#paymentMethodManagementModal"
              href="#"
              >Change</a
            >
          </div>
          <div class="mt-3 border bg-light p-3">
            <h5>Order Review</h5>
            <div class="row">
              <img :src="product.image_path" class="col-md-3" />
              <div class="col-md-9">
                <p>
                  {{ product.name }}<br />
                  <b>{{ product.price }}</b
                  ><br />
                  <span class="text-success">Free Shipping</span><br />
                </p>
                <div class="form-group">
                  <label>Quantity:</label>
                  <select
                    class="form-control d-inline-block w-auto"
                    v-model="product.quantity"
                    @change="calculateSubtotal()"
                  >
                    <option v-for="n in 100" :key="n" :value="n">
                      {{ n }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3 border bg-light" style="height: 400px">
            <h5>Summary:</h5>
            <table class="w-100">
              <tr>
                <td>Items:</td>
                <td class="text-right">
                  CAD$ {{ formatMoney(product.price * product.quantity) }}
                </td>
              </tr>
              <tr>
                <td>Shipping:</td>
                <td class="text-right">CAD$ 0.00</td>
              </tr>
              <tr>
                <td>Subtotal:</td>
                <td class="text-right">CAD$ {{ formatMoney(subtotal) }}</td>
              </tr>
              <tr>
                <td>GST/HST:</td>
                <td class="text-right">CAD$ 0.00</td>
              </tr>
            </table>
            <h5 class="mt-3">Total:</h5>
            <p>CAD$ {{ formatMoney(total) }}</p>
            <a
              class="btn btn-success d-block"
              href="javascript:void(0)"
              @click="placeOrder()"
              >Place Order</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["productParam"],
  data() {
    return {
      cart_items: [],
      product: {},
      message: "",
      //quantity: 0,
      subtotal: 0.0,
      total: 0.0,
      payment_method: {},
      address: {},
    };
  },
  created() {
    this.product = JSON.parse(this.productParam);
    this.getDefaultPaymentMethod();
    this.getDefaultAddress();
    this.calculateSubtotal();
    this.calculateTotal();
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    changeAddress: function (a) {
      //alert(JSON.stringify(a, null, 2));
      this.address = a;
    },
    getDefaultAddress: function () {
      fetch("api/addresses/default")
        .then((res) => res.json())
        .then((data) => (this.address = data));
    },
    changePaymentMethod: function (payment_method) {
      this.payment_method = JSON.parse(payment_method);
    },
    placeOrder: function () {
      fetch("api/buynow/placeorder", {
        method: "POST",
        headers: {
          "content-type": "application/json",
          "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
        },
        body: JSON.stringify(this.product),
      })
        .then((res) => res.json())
        .then((data) =>
          console.log("sentsentsent" + JSON.stringify(data, null, 2))
        );
      //create invoice
      //add items to invoice
      //finalize invoice
      //pay invoice
      //check if customer received invoice
    },
    getDefaultPaymentMethod: function () {
      fetch("api/stripe/defaultpm")
        .then((res) => res.json())
        .then((data) => {
          this.payment_method = data;
          //alert(JSON.stringify(this.payment_method, null, 2));
        });
    },
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
      this.subtotal =
        Math.round(
          (parseFloat(this.product.price) * parseInt(this.product.quantity) +
            Number.EPSILON) *
            100
        ) / 100;
    },
    calculateTotal: function () {
      this.total =
        Math.round((this.subtotal * 1.15 + Number.EPSILON) * 100) / 100;
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
