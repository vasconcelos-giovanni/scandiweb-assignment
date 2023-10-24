<template>
  <div>
    <p class="fs-6">Please provide size in MB</p>
    <FormInput
      id="size"
      v-model="formData.size"
      name="size"
      label="Size (MB)"
      required
    >
      <template #errorMessages>
        <p
          v-for="error in v$.formData.size.$errors"
          :key="error.uid"
          class="text-danger"
          role="alert"
        >
          {{ error.$message }}
        </p>
      </template>
    </FormInput>
  </div>
</template>

<script>
import { useVuelidate } from '@vuelidate/core';
import { helpers, required, numeric } from '@vuelidate/validators';
import { FormInput } from '.';

export default {
  components: {
    FormInput,
  },
  setup() {
    return {
      v$: useVuelidate(),
    };
  },
  data() {
    return {
      formData: {
        size: null,
      },
      invalidTypeMessage: 'Please provide the indicated data type.',
    };
  },
  validationConfig() {
    return {
      $autoDirty: true,
      $lazy: true,
      $rewardEarly: true,
    };
  },
  validations() {
    return {
      formData: {
        size: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
      },
    };
  },
};
</script>
