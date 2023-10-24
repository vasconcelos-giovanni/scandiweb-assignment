<template>
  <label
    class="product-card d-block form-check-label h-11 w-16 text-center border border-2 border-secondary rounded p-2"
    for="inlineCheckbox1"
  >
    <input
      id="inlineCheckbox1"
      class="form-check-input form-check"
      type="checkbox"
      value="option1"
    />
    <ul class="list-unstyled m-0 d-flex flex-column">
      <li>{{ sku }}</li>
      <li>{{ name }}</li>
      <li>${{ price }}</li>
      <li v-if="size">Size: {{ size }}MB</li>
      <li v-if="isFurniture">
        Dimension: {{ height }}x{{ width }}x{{ length }}cm
      </li>
      <li v-if="weight">Weight: {{ weight }}g</li>
    </ul>
  </label>
</template>

<script>
export default {
  props: {
    sku: {
      type: String,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    price: {
      type: Number,
      required: true,
    },
    size: {
      type: Number,
      required: false,
    },
    width: {
      type: Number,
      required: false,
    },
    height: {
      type: Number,
      required: false,
    },
    length: {
      type: Number,
      required: false,
    },
    weight: {
      type: Number,
      required: false,
    },
  },
  computed: {
    isFurniture() {
      return this.length || this.width || this.height;
    },
  },
};
</script>

<style scoped>
.product-card {
  height: 11rem;
  width: 16rem;
}
</style>
