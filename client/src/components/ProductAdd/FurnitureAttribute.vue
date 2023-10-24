<template>
  <div>
    <p class="fs-6">Please provide dimensions in HxWxL format</p>
    <FormInput
      id="height"
      v-model="formData.height"
      name="height"
      label="Height (CM)"
      required
    >
      <template #errorMessages>
        <p
          v-for="error in v$.formData.height.$errors"
          :key="error.uid"
          class="text-danger"
          role="alert"
        >
          {{ error.$message }}
        </p>
      </template>
    </FormInput>

    <FormInput
      id="width"
      v-model="formData.width"
      name="width"
      label="Width (CM)"
      required
    >
      <template #errorMessages>
        <p
          v-for="error in v$.formData.width.$errors"
          :key="error.uid"
          class="text-danger"
          role="alert"
        >
          {{ error.$message }}
        </p>
      </template>
    </FormInput>

    <FormInput
      id="length"
      v-model="formData.length"
      name="length"
      label="Length (CM)"
      required
    >
      <template #errorMessages>
        <p
          v-for="error in v$.formData.length.$errors"
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
        height: null,
        width: null,
        length: null,
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
        height: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
        width: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
        length: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
      },
    };
  },
};
</script>
