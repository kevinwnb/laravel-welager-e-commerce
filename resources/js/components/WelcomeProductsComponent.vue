<template>
  <div>
    <div
      style="
        width: 100%;
        height: 100vh;
        position: absolute;
        background: linear-gradient(#5bc0de, #ffffff);
      "
    ></div>
    <div class="container pb-5" style="min-height: 100vh">
      <div class="row" style="padding-top: 150px">
        <div class="col-lg-3 mt-3" v-for="p in products.items" :key="p.id">
          <div
            class="card-body bg-light h-100"
            style="border: 2px solid #e1e1e1"
          >
            <div style="text-align: center; height: 200px; line-height: 200px">
              <img
                style="max-height: 200px; max-width: 100%"
                :src="
                  products.images.filter((i) => i.product_id == p.id)[0].path
                "
              />
            </div>
            <div>
              <p class="card-text" style="margin-top: 16px">{{ p.name }}</p>
              <a class="card-text" :href="'/product/' + p.id">See product</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      products: {
        items: [],
        images: [],
      },
    };
  },
  created() {
    fetch("/api/products")
      .then((res) => res.json())
      .then((res) => {
        this.products.items = res.data;
      });

    fetch("/api/products/images")
      .then((res) => res.json())
      .then((res) => {
        this.products.images = res.data;
      });
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
