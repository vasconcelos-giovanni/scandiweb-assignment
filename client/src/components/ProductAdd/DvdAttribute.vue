<template>
  <form-input-2
    v-model="something2"
    label="Something2"
    :value="modelValue"
    name-and-id="example"
    type="number"
    @input="$emit('update:modelValue', $event.target.value)"
  />
  <p>{{ something2 }}</p>
</template>

<!-- <script>
import { FormInput2 } from '.';

export default {
  components: {
    FormInput2,
  },
  props: {
    modelValue: {
      type: [Number, String],
      default: '',
    },
  },
  emits: {
    'update:modelValue': null,
  },
  data() {
    return {
      something2: '',
    };
  },
};
</script> -->
