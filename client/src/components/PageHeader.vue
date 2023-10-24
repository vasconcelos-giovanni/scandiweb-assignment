<template>
  <header class="col-12 d-flex align-items-center pb-4">
    <div :class="[sidesClasses, 'justify-content-start']">
      <h1>{{ pageTitle }}</h1>
    </div>
    <div :class="[sidesClasses, 'justify-content-end']">
      <button
        class="btn btn-outline-primary"
        @click="blueButtonEvent"
      >
        {{ blueButtonText }}
      </button>
      <button
        class="btn btn-outline-danger"
        @click="redButtonEvent"
      >
        {{ redButtonText }}
      </button>
    </div>
  </header>
</template>

<script>
export default {
  props: {
    pageTitle: {
      type: String,
      required: true,
    },
    blueButtonText: {
      type: String,
      required: true,
    },
    redButtonText: {
      type: String,
      required: true,
    },
  },
  emits: {
    'blue-button-click': null,
    'red-button-click': null,
  },
  data() {
    return {
      sidesClasses: 'col-6 d-flex gap-2',
    };
  },
  methods: {
    blueButtonEvent() {
      this.$emit('blue-button-click');
    },
    redButtonEvent() {
      this.$emit('red-button-click');
    },
  },
};
</script>
