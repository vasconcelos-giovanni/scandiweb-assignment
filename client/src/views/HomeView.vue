<template>
  <page-header
    title="Product List"
    blue-button-text="Add"
    red-button-text="Mass delete"
  />
  <main class="d-flex justify-content-center flex-wrap gap-3">
    <product-card
      v-for="product in products"
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
  </main>
</template>

<script>
import { ProductCard } from '../components/Home';
import axios from 'axios';

export default {
  components: {
    ProductCard,
  },
  data() {
    return {
      products: null,
    };
  },
  created() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      const response = await axios.get('http://localhost:8000/');

      this.products = response.data;

      console.log(this.products[3].height);
    },
  },
};
</script>
