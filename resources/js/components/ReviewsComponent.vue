<template>
  <div>
    <h5>Reviews</h5>
    <h5>
      <span class="text-warning">
        <i v-if="average_stars.toFixed(1) >= 1" class="fas fa-star"></i
        ><i v-if="average_stars.toFixed(1) >= 2" class="fas fa-star"></i
        ><i v-if="average_stars.toFixed(1) >= 3" class="fas fa-star"></i
        ><i v-if="average_stars.toFixed(1) >= 4" class="fas fa-star"></i
        ><i v-if="average_stars.toFixed(1) == 5" class="fas fa-star"></i
        ><i
          v-if="average_stars.toFixed(1) >= 0.5 && average_stars.toFixed(1) < 1"
          class="fas fa-star-half-alt"
        ></i
        ><i
          v-if="average_stars.toFixed(1) >= 1.5 && average_stars.toFixed(1) < 2"
          class="fas fa-star-half-alt"
        ></i
        ><i
          v-if="average_stars.toFixed(1) >= 2.5 && average_stars.toFixed(1) < 3"
          class="fas fa-star-half-alt"
        ></i
        ><i
          v-if="average_stars.toFixed(1) >= 3.5 && average_stars.toFixed(1) < 4"
          class="fas fa-star-half-alt"
        ></i
        ><i
          v-if="average_stars.toFixed(1) >= 4.5 && average_stars.toFixed(1) < 5"
          class="fas fa-star-half-alt"
        ></i
        ><i v-if="average_stars.toFixed(1) < 0.5" class="far fa-star"></i
        ><i v-if="average_stars.toFixed(1) < 1.5" class="far fa-star"></i
        ><i v-if="average_stars.toFixed(1) < 2.5" class="far fa-star"></i
        ><i v-if="average_stars.toFixed(1) < 3.5" class="far fa-star"></i
        ><i v-if="average_stars.toFixed(1) < 4.5" class="far fa-star"></i>
      </span>
      {{ average_stars.toFixed(1) }} out of 5
    </h5>

    <p>Total reviews: {{ this.reviews.length }}</p>

    <div class="d-flex" style="flex-direction: column-reverse">
      <div
        v-for="key in 5"
        :key="key"
        class="d-flex align-items-center w-100 my-2"
      >
        <p style="white-space: nowrap; margin: 0 5px">{{ key }} star</p>
        <div
          class="rounded"
          style="
            box-shadow: inset 0px 0px 1px black;
            width: 100%;
            height: 30px;
            background-color: #e1e1e1;
          "
        >
          <div
            v-if="stars_percentages[key] > 0"
            class="bg-info rounded-left"
            :style="{
              border: '1px solid rgba(0,0,0,0.3)',
              height: '100%',
              width: stars_percentages[key] + '%',
            }"
          ></div>
        </div>
        <p style="width: 4rem; text-align: right; margin: 0">
          {{ stars_percentages[key] }}%
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["reviewsParam"],
  data() {
    return {
      reviews: [],
      quantity: 0,
      total_stars: 0,
      average_stars: 0,
      stars_percentages: {
        5: 0,
        4: 0,
        3: 0,
        2: 0,
        1: 0,
      },
    };
  },
  created() {
    this.reviews = this.reviewsParam;
    this.calculateQuantity();
    this.calculateTotalStars();
    this.calculateAverageStars();
    this.calculatePercentages();

    //alert(JSON.stringify(this.stars_percentages, null, 2));
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    calculateQuantity: function () {
      this.quantity = this.reviews.length;
    },
    calculateTotalStars: function () {
      this.reviews.forEach((r) => {
        this.total_stars += r.stars;
      });
    },
    calculateAverageStars: function () {
      this.average_stars = this.total_stars / this.quantity;
    },
    calculatePercentages: function () {
      for (const [key, value] of Object.entries(this.stars_percentages)) {
        this.stars_percentages[key] = (
          (100 / this.quantity) *
          this.reviews.filter((r) => r.stars == key).length
        ).toFixed(1);
      }
    },
  },
};
</script>
