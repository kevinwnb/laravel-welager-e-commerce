<template>
  <div>
    <div
      style="
        width: 100%;
        height: 100vh;
        position: absolute;
        background: linear-gradient(#5bc0de, #ffffff);
        z-index: -1;
      "
    ></div>
    <div class="container pb-5" style="min-height: 100vh; overflow: auto">
      <!-- Featured -->
      <section
        id="featured"
        style="background-color: white; margin-top: 150px"
        class="p-3 rounded"
      >
        <h5 class="text-dark">Featured</h5>
        <div class="row">
          <div
            class="col-lg-3 p-1"
            v-for="p in products.items.filter((p) => p.id <= 4)"
            :key="p.id"
          >
            <div
              class="card-body bg-light h-100"
              style="border: 2px solid #efefef"
            >
              <div
                style="text-align: center; height: 200px; line-height: 200px"
              >
                <img
                  style="max-height: 200px; max-width: 100%"
                  :src="
                    products.images.filter((i) => i.product_id == p.id)[0].path
                  "
                />
              </div>
              <div>
                <p class="card-text" style="margin-top: 16px">
                  {{ p.name }}
                </p>
                <a class="card-text" :href="'/product/' + p.id">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Recently viewed -->
      <section
        id="recentlyViewed"
        style="background-color: white"
        class="p-3 mt-5"
      >
        <h5 class="text-dark">Recently viewed</h5>
        <div class="row">
          <div
            class="col-lg-3 p-1"
            v-for="p in products.items.filter((p) => p.id > 4 && p.id <= 8)"
            :key="p.id"
          >
            <div
              class="card-body bg-light h-100"
              style="border: 2px solid #efefef"
            >
              <div
                style="text-align: center; height: 200px; line-height: 200px"
              >
                <img
                  style="max-height: 200px; max-width: 100%"
                  :src="
                    products.images.filter((i) => i.product_id == p.id)[0].path
                  "
                />
              </div>
              <div>
                <p class="card-text" style="margin-top: 16px">
                  {{ p.name }}
                </p>
                <a class="card-text" :href="'/product/' + p.id">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Buy it again -->
      <section id="buyItAgain" style="background-color: white" class="p-3 mt-5">
        <h5 class="text-dark">Buy it again</h5>
        <div class="row">
          <div
            class="col-lg-3 p-1"
            v-for="p in products.items.filter((p) => p.id > 8)"
            :key="p.id"
          >
            <div
              class="card-body bg-light h-100"
              style="border: 2px solid #efefef"
            >
              <div
                style="text-align: center; height: 200px; line-height: 200px"
              >
                <img
                  style="max-height: 200px; max-width: 100%"
                  :src="
                    products.images.filter((i) => i.product_id == p.id)[0].path
                  "
                />
              </div>
              <div>
                <p class="card-text" style="margin-top: 16px">
                  {{ p.name }}
                </p>
                <a class="card-text" :href="'/product/' + p.id">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
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
      offer_types: ["Featured", "Recently viewed"],
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
