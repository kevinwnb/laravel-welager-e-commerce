<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="buyNowModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLongTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Buy Now</h5>
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
          <h5>Shipping address</h5>
          <p>address 1</p>
          <p>address 2</p>
          <p>address 3</p>
          <h5>Payment method</h5>
          <p>Method 1</p>
          <p>Method 2</p>
          <p>Method 3</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancel
          </button>
          <button type="button" disabled class="btn btn-success">
            Confirm
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      customer: {},
    };
  },
  created() {
    fetch("api/user/stripecustomerid")
      .then((res) => res.json())
      .then((data) => {
        fetch(
          "https://api.stripe.com/v1/customers/" + data.stripe_customer_id,
          {
            headers: {
              Authorization:
                "Bearer pk_test_51HvacCKlmt80RKMYSUWoCBUOvNZB3LqSDv6FNCTJf5WNY09bR1RrK95ozFfsXldiODg1ABD1uF5AYO5Kh3aZ5WEA00blJB9uc8",
            },
          }
        )
          .then((res) => res.json())
          .then((data) => alert(JSON.stringify(data, null, 2)));
      });
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {},
};
</script>
