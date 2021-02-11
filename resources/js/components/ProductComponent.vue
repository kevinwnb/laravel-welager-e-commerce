<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
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
            <div class="text-center">
              <div
                id="spinner"
                class="mx-auto spinner-border text-info"
                role="status"
              >
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <div class="content"></div>
          </div>
          <div class="modal-footer">
            <button
              @click="closeModal"
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Sign In Modal-->
    <sign-in-modal-component
      v-on:success="loadBuyNow()"
    ></sign-in-modal-component>

    <div class="m-3 mt-5">
      <div class="row">
        <div class="col-md-4">
          <div style="position: sticky; top: 1rem">
            <div
              id="imagePreview"
              style="
                border: 2px solid #c0c0c0;
                margin-bottom: 8px;
                width: 100%;
                padding-top: 100%;
                position: relative;
                text-align: center;
              "
            >
              <img
                style="
                  position: absolute;
                  max-width: 100%;
                  max-height: 100%;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                "
                v-bind:src="
                  product.images.filter((i) => i.id == selected_img_id)[0].path
                "
              />
            </div>

            <div
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
              <div
                style="width: 11%"
                v-for="image in product.images"
                :key="image.id"
              >
                <div
                  class="pre-images"
                  style="
                    width: 100%;
                    padding-top: 100%;
                    position: relative;
                    outline: 1px solid #c0c0c0;
                  "
                  :id="image.id"
                  @mouseenter="changeSelectedImg($event)"
                >
                  <img
                    style="
                      max-width: 100%;
                      max-height: 100%;
                      position: absolute;
                      top: 0;
                      left: 0;
                    "
                    :src="image.path"
                    :id="'image' + image.id"
                  />
                </div>
              </div>
              <div
                style="width: 11%"
                v-for="index in 8 - product.images.length"
                :key="'empty' + index"
              >
                <div
                  style="
                    width: 100%;
                    padding-top: 100%;
                    position: relative;
                    outline: 1px solid #c0c0c0;
                    text-align: center;
                  "
                >
                  <p
                    style="
                      cursor: default;
                      position: absolute;
                      width: 100%;
                      top: 50%;
                      transform: translateY(-50%);
                      left: 0;
                      color: #c0c0c0;
                      font-size: 1.5vw;
                    "
                  >
                    {{ product.images.length + index }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <h4 class="pt-3 pt-md-0">{{ product["0"].name }}</h4>
          <div class="my-3">
            <p
              class="bg-info d-inline p-1"
              style="cursor: default; color: rgba(255, 255, 255, 0.8)"
            >
              <i class="fas fa-check-circle"></i> Trusted Brand
            </p>
            <p class="text-info d-inline ml-3">Wegener Technologies</p>
          </div>
          <h5 class="d-inline text-warning">
            <span class="text-warning">
              <i v-if="average_stars.toFixed(1) >= 1" class="fas fa-star"></i
              ><i v-if="average_stars.toFixed(1) >= 2" class="fas fa-star"></i
              ><i v-if="average_stars.toFixed(1) >= 3" class="fas fa-star"></i
              ><i v-if="average_stars.toFixed(1) >= 4" class="fas fa-star"></i
              ><i v-if="average_stars.toFixed(1) == 5" class="fas fa-star"></i
              ><i
                v-if="
                  average_stars.toFixed(1) >= 0.5 &&
                  average_stars.toFixed(1) < 1
                "
                class="fas fa-star-half-alt"
              ></i
              ><i
                v-if="
                  average_stars.toFixed(1) >= 1.5 &&
                  average_stars.toFixed(1) < 2
                "
                class="fas fa-star-half-alt"
              ></i
              ><i
                v-if="
                  average_stars.toFixed(1) >= 2.5 &&
                  average_stars.toFixed(1) < 3
                "
                class="fas fa-star-half-alt"
              ></i
              ><i
                v-if="
                  average_stars.toFixed(1) >= 3.5 &&
                  average_stars.toFixed(1) < 4
                "
                class="fas fa-star-half-alt"
              ></i
              ><i
                v-if="
                  average_stars.toFixed(1) >= 4.5 &&
                  average_stars.toFixed(1) < 5
                "
                class="fas fa-star-half-alt"
              ></i
              ><i v-if="average_stars.toFixed(1) < 0.5" class="far fa-star"></i
              ><i v-if="average_stars.toFixed(1) < 1.5" class="far fa-star"></i
              ><i v-if="average_stars.toFixed(1) < 2.5" class="far fa-star"></i
              ><i v-if="average_stars.toFixed(1) < 3.5" class="far fa-star"></i
              ><i v-if="average_stars.toFixed(1) < 4.5" class="far fa-star"></i>
            </span>
          </h5>
          <a href="javascript:void(0)" class="ml-2"
            >{{ numberWithCommas(product.reviews.length) }} ratings</a
          >
          <h3 class="mt-3">
            CDN$ {{ product["0"].price }}
            <span
              style="
                display: inline-block;
                vertical-align: middle;
                font-size: 1rem;
                font-weight: normal;
              "
              >was&nbsp;</span
            ><span
              style="
                font-weight: normal;
                text-decoration: line-through;
                font-size: 1rem;
                color: #c0c0c0;
              "
              >CDN$ {{ (product["0"].price * 1.2).toFixed(2) }}</span
            >
          </h3>

          <h5 class="mt-5">Description</h5>
          <ul>
            <li
              class="mt-3"
              v-for="(item, index) in product.details"
              :key="item.title + index"
            >
              <b>{{ item.title }}: </b>{{ item.description }}
            </li>
          </ul>

          <h5 class="mt-5">Product Summary</h5>
          <ul>
            <li v-for="(item, index) in product.summary" :key="index">
              {{ item.summary }}
            </li>
          </ul>

          <h5 class="mt-5">Product Properties</h5>
          <table class="table table-bordered">
            <tbody>
              <tr v-for="(item, index) in product.properties" :key="index">
                <td class="bg-light font-weight-bold">{{ item.title }}</td>
                <td>{{ item.description }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-3">
          <form @submit.prevent="" class="form border p-3 rounded">
            <h3>CDN${{ product["0"].price }}</h3>

            <div class="form-group">
              <label>Quantity: </label>
              <select v-model="quantity" class="form-control">
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
              </select>
            </div>

            <a
              :data-toggle="authenticated ? '' : 'modal'"
              v-bind:data-target="
                authenticated ? '#buyNowModal' : '#signInModal'
              "
              :href="
                'order/buynow/' + this.product['0'].id + '/' + this.quantity
              "
              class="btn btn-success d-flex align-items-center my-1"
              ><i class="fas fa-coins mr-auto pr-2"></i>
              <span class="mr-auto">Buy Now</span></a
            >
            <a
              @click="addToCart"
              data-toggle="modal"
              data-target="#exampleModalCenter"
              class="btn btn-info d-flex align-items-center"
            >
              <i class="fas fa-shopping-cart mr-auto pr-2"></i>
              <span class="mr-auto">Add to Cart</span>
            </a>
            <a
              href="javascript:void(0)"
              class="btn btn-light d-flex align-items-center border mt-1"
              ><i class="fas fa-plus mr-auto pr-2"></i>
              <span class="mr-auto">Add to wishlist</span></a
            >
            <a
              v-if="false"
              href="javascript:void(0)"
              class="btn btn-danger"
              @click="deleteCart"
            >
              Delete Cart
            </a>

            <p class="mt-3">Deliver to:</p>
            <h5>{{ JSON.parse(ship_to).city || "sign in" }}</h5>
          </form>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-4">
          <div class="pl-2 pr-5">
            <reviews-component
              :reviewsParam="product.reviews"
            ></reviews-component>
          </div>
        </div>
        <div class="col-md-5 p-md-0">
          <h5>Reviews</h5>
          <div>
            <div
              class="border my-2 p-3"
              v-for="review in product.reviews.slice(-10)"
              :key="review.id"
            >
              <h5>
                <span class="text-warning">
                  <i
                    class="fas fa-star"
                    v-for="star in review.stars"
                    :key="review.id + star"
                  ></i
                  ><i
                    class="far fa-star"
                    v-for="star in 5 - review.stars"
                    :key="review.id + star + '2'"
                  ></i
                ></span>
                {{ review.title }}
              </h5>
              <p>{{ review.review }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["productparam", "ship_to"],
  data() {
    return {
      authenticated: false,
      product: {
        images: [],
        id: 0,
        name: "",
        price: 0,
      },
      average_stars: 0,
      selected_img_id: 0,
      quantity: 1,
    };
  },
  created() {
    this.checkLogin();
    this.$root.$on("checkLogin", this.checkLogin);

    this.product = JSON.parse(this.productparam);
    var total_stars = 0;
    this.product.reviews.forEach((review) => {
      total_stars += review.stars;
    });
    this.average_stars = total_stars / this.product.reviews.length;
    console.log(JSON.stringify(this.product, null, 2));
    this.selected_img_id = this.product.images[0].id;
  },
  mounted() {
    console.log("Component mounted.");
    $("#imagePreview").zoom({
      url: this.product.images.filter((i) => i.id == this.selected_img_id)[0]
        .path,
    });
    document.querySelector("div.pre-images").style.outline =
      "2px solid #17a2b8";
    // this.product.images.forEach((image) => {
    //   this.imageZoom(image.id, image.id + "ResultBox");
    // });
  },
  methods: {
    loadBuyNow() {
      // Simulate a mouse click:
      window.location.href =
        "order/buynow/" + this.product["0"].id + "/" + this.quantity;
    },
    showBuyNowModal() {
      $("#buyNowModal").modal("show");
    },
    checkLogin() {
      fetch("api/login/check")
        .then((res) => res.json())
        .then((data) => {
          this.authenticated = data.is_authenticated;
        });
    },
    numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    closeModal() {
      $("#exampleModalCenter").on("hidden.bs.modal", function () {
        // do something…
        document.querySelector("#spinner").classList.remove("d-none");
        document.querySelector(".modal-body .content").innerHTML = "";
      });
    },
    addToCart() {
      fetch("api/cart/add", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: JSON.stringify({
          product_id: this.product["0"].id,
          quantity: this.quantity,
        }),
      })
        .then((res) => res.json())
        .then((data) => {
          this.$root.$emit("addQuantityToCart", data);
          document.querySelector("#spinner").classList.add("d-none");
          document.querySelector(".modal-body .content").innerHTML =
            "<i style='font-size: 2rem; vertical-align: middle;' class='text-success fas fa-check-circle'></i> <span style='vertical-align: middle;'>Product added to your cart</span>";
        });
    },
    deleteCart() {
      fetch("api/cart/delete");
    },
    changeSelectedImg(e) {
      this.selected_img_id = e.target.id;
      document.querySelectorAll("div.pre-images").forEach((element) => {
        element.style.outline = "1px solid #c0c0c0";
      });
      e.target.style.outline = "2px solid #17a2b8";
      $("#imagePreview").trigger("zoom.destroy");
      $("#imagePreview").zoom({
        url: this.product.images.filter((i) => i.id == this.selected_img_id)[0]
          .path,
      });
    },
  },
};
</script>
