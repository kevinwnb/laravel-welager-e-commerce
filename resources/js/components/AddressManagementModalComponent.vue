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
          <div>
            <p>VISA **** **** **** 1111</p>
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
      //
    };
  },
  created() {
    //
  },
  mounted() {
    //
  },
  methods: {
    //
  },
};
</script>
