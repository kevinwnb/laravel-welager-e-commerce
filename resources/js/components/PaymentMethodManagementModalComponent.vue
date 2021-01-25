<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="paymentMethodManagementModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
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
          <h5 class="modal-title" id="exampleModalLongTitle">
            Manage Payment Methods
          </h5>
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
          <div id="paymentMethods" v-if="!is_add_pm_form_visible">
            <div
              v-for="(item, index) in payment_methods.data"
              :key="'pm' + index"
              class="form-check form-check-inline px-2 border"
            >
              <input
                class="form-check-input"
                type="radio"
                name="rdoPaymentMethods"
                @change="changePaymentMethod()"
                v-model="rdo_payment_method"
                :id="'pm' + index"
                :value="item.id"
                :checked="item.id == paymentmethodid"
              />
              <label class="form-check-label py-2" :for="'pm' + index">
                {{ item.card.brand.toUpperCase() }} **** **** ****
                {{ item.card.last4 }}
              </label>
            </div>
            <a
              class="btn btn-outline-success"
              @click="show_add_pm_form()"
              href="javascript:void(0)"
              >+ Add Payment Method</a
            >
          </div>
          <div id="createPaymentMethod" v-if="is_add_pm_form_visible">
            <form
              @submit.prevent="addPaymentMethod()"
              action=""
              class="mx-auto"
              style="width: 18rem"
            >
              <div class="form-group">
                <label for="cardNumber">Card Number:</label>
                <input
                  v-model="new_payment_method.number"
                  autocomplete="off"
                  type="text"
                  placeholder="0000 0000 0000 0000"
                  maxlength="19"
                  class="form-control"
                  name="cardNumber"
                />
              </div>
              <div class="form-group">
                <label for="expiryMonth">Expiry month:</label>
                <input
                  v-model="new_payment_method.exp_month"
                  type="text"
                  autocomplete="off"
                  placeholder="MM"
                  minlength="2"
                  maxlength="2"
                  class="form-control"
                  name="expiryMonth"
                />
              </div>
              <div class="form-group">
                <label for="expiryYear">Expiry year:</label>
                <input
                  v-model="new_payment_method.exp_year"
                  type="text"
                  autocomplete="off"
                  placeholder="YYYY"
                  minlength="4"
                  maxlength="4"
                  class="form-control"
                  name="expiryYear"
                />
              </div>
              <div class="form-group">
                <label for="cvc">CVV:</label>
                <input
                  v-model="new_payment_method.cvc"
                  type="text"
                  autocomplete="off"
                  placeholder="000"
                  minlength="3"
                  maxlength="3"
                  class="form-control"
                  name="cvc"
                />
              </div>
              <button type="submit" class="btn btn-success">Confirm</button>
              <button
                type="button"
                @click="hide_add_pm_form()"
                class="btn btn-default"
              >
                Cancel
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Button from "../Jetstream/Button.vue";
import Label from "../Jetstream/Label.vue";
export default {
  components: { Label, Button },
  props: ["paymentmethodid"],
  data() {
    return {
      payment_methods: [],
      rdo_payment_method: 0,
      is_add_pm_form_visible: false,
      new_payment_method: {
        type: "card",
        number: "",
        exp_year: "",
        exp_month: "",
        cvc: "",
      },
    };
  },
  created() {
    this.rdo_payment_method = this.paymentmethodid;
    this.getPaymentMethods();
  },
  mounted() {
    //
  },
  methods: {
    changePaymentMethod: function () {
      this.$emit(
        "changePaymentMethod",
        JSON.stringify(
          this.payment_methods.data.filter(
            (pm) => pm.id == this.rdo_payment_method
          )[0]
        )
      );
    },
    addPaymentMethod: function () {
      fetch("api/createpm", {
        method: "POST",
        headers: {
          "content-type": "application/json",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: JSON.stringify(this.new_payment_method),
      })
        .then((res) => res.json())
        .then((data) => alert(JSON.stringify(data)));
    },
    show_add_pm_form: function () {
      this.is_add_pm_form_visible = true;
    },
    hide_add_pm_form: function () {
      this.is_add_pm_form_visible = false;
    },
    getPaymentMethods: function () {
      fetch("api/stripe/paymentmethods")
        .then((res) => res.json())
        .then((data) => {
          this.payment_methods = data;
          //alert(JSON.stringify(this.payment_methods, null, 2));
        });
    },
  },
};
</script>
