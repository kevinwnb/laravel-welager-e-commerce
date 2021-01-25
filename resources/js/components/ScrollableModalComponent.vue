<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="scrollableModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLongTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Weland</h5>
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
          <h5 class="text-center">Sign In</h5>
          <form @submit.prevent=""></form>
          <a href="javascript:void(0)" @click="emit()">Create Account</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SignInModalComponent from "./SignInModalComponent.vue";
export default {
  props: ["componentParam"],
  data() {
    return {
      component_to_render: "SignInModalComponent",
    };
  },
  created() {
    this.component_to_render = this.componentParam;
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
