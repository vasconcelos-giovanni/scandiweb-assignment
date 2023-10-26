<template>
  <PageHeader
    title="Product List"
    blue-button-text="Add"
    red-button-text="Mass delete"
    @blue-button-click="addProduct"
    @red-button-click="massDelete"
  />
  <main>
    <form
      ref="form"
      action="formAction"
      method="post"
      class="d-flex justify-content-center flex-wrap gap-3"
    >
      <ProductCard
        v-for="product in products"
        :id="product.id"
        :key="product.id"
        :sku="product.sku"
        :name="product.name"
        :price="product.price"
        :size="product.size"
        :width="product.width"
        :height="product.height"
        :length="product.length"
        :weight="product.weight"
      />

      <input
        v-show="false"
        ref="submitInput"
        type="submit"
        value="Submit"
      />
    </form>
  </main>
</template>

<script>
import { ProductCard } from '../components/Home';
import axios from 'axios';
import { BASE_API_URL } from './../globalConstants';

export default {
  components: {
    ProductCard,
  },
  data() {
    return {
      products: null,
      formAction: BASE_API_URL + '/destroy-products',
    };
  },
  created() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      const response = await axios.get(BASE_API_URL);

      this.products = response.data;
    },
    addProduct() {
      this.$router.push('/add-product');
    },
    massDelete() {
      const submitInput = this.$refs.submitInput;

      submitInput.click();
    },
  },
};
</script>
