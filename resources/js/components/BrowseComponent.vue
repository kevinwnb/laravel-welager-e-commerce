<template>
  <div class="container">
    <div class="row">
      <div
        class="col-lg-3 col-md-6 p-0"
        v-for="p in products.items"
        :key="p.id"
      >
        <div class="card p-2 m-2" style="background-color: white">
          <div style="line-height: 200px; height: 200px; text-align: center">
            <img
              style="max-height: 200px; width: auto; max-width: 100%"
              :src="products.images.filter((i) => i.product_id == p.id)[0].path"
            />
          </div>
          <div class="card-body">
            <p class="card-text">{{ p.name }}</p>
            <a class="card-text" :href="'/product/' + p.id">See Product</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["productsparam"],
  data() {
    return {
      products: {
        items: [],
        images: [],
      },
    };
  },
  created() {
    this.products = JSON.parse(this.productsparam);
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    searchProducts() {
      //
    },
  },
};
</script>
