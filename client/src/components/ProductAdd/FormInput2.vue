<template>
  <div :class="wrapperClass">
    <label
      :class="labelClass"
      :for="name"
    >
      {{ label }}
    </label>
    <div :class="inputWrapperClass">
      <input
        v-if="!customInput"
        :class="inputClass"
        :name="name"
        v-bind="$attrs"
        @input="$emit('update:modelValue', $event.target.value)"
      />
      <slot name="customInput"></slot>
      <slot name="errorMessages"></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    name: {
      default: '',
      required: true,
      type: String,
    },
    label: {
      default: '',
      required: true,
      type: String,
    },
    customInput: {
      type: Boolean,
    },
  },
  emits: ['update:modelValue'],
  data() {
    return {
      inputClass: 'form-control',
      inputWrapperClass: 'col-4',
      labelClass: 'col-2 col-form-label fw-bold',
      wrapperClass: 'row mb-3',
    };
  },
};
</script>
