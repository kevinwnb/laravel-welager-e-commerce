<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="addressManagementModal"
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
            Manage Addresses
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
          <label
            class="card-body d-inline-block border rounded"
            v-for="a in addresses"
            :key="a.id"
          >
            <input
              type="radio"
              name="address"
              :value="a.id"
              v-model="selectedAddressId"
              @change="changeAddress"
              :checked="a.default == 1"
            />
            <p style="cursor: default">
              {{ a.address }}<br />{{ a.city }}, {{ a.alpha }},
              {{ a.postal_code }}<br />Canada<br />
              Phone: {{ a.phone }}
            </p>
          </label>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      addresses: [],
      selectedAddressId: 1,
    };
  },
  created() {
    fetch("api/addresses")
      .then((res) => res.json())
      .then((data) => {
        this.addresses = data;
        //alert(JSON.stringify(this.addresses, null, 2));
      });
  },
  mounted() {
    //
  },
  methods: {
    changeAddress: function () {
      this.$emit(
        "changeAddress",
        this.addresses.filter((a) => a.id == this.selectedAddressId)[0]
      );
    },
  },
};
</script>
