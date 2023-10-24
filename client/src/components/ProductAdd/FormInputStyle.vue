<template>
  <div :class="labelWrapperClass">
    <label
      :for="labelForAttr"
      :class="labelClass"
    >
      {{ labelText }}
    </label>
    <div :class="inputWrapperClass">
      <slot></slot>
    </div>
  </div>
</template>

<script>
// pattern="^\+?[0-9]*\.?[0-9]+$"
export default {
  props: {
    inputHtmlType: {
      // required: true,
      type: String,
    },
    labelForAttr: {
      required: true,
      type: String,
    },
    labelText: {
      required: true,
      type: String,
    },
    notTypingField: {
      type: Boolean,
    },
  },
  emits: {
    // 'update:modelValue': null,
  },
  data() {
    return {
      inputWrapperClass: 'col-4',
      labelClass: 'col-2 col-form-label fw-bold',
      labelWrapperClass: 'row mb-3',
      // inputValue: '',
    };
  },
};
</script>
