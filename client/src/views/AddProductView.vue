<template>
  <header>
    <page-header
      page-title="Product Add"
      blue-button-text="Save"
      red-button-text="Cancel"
      @blue-button-click="addProduct"
      @red-button-click="cancel"
    />
  </header>

  <main>
    <form
      id="productForm"
      method="POST"
      action="#"
      class="col-12"
    >
      <form-input-style
        label-for-attr="sku"
        label-text="SKU"
      >
        <input
          id="sku"
          v-model="formData.sku"
          class="form-control"
          name="sku"
        />
        <p
          v-for="error in v$.formData.sku.$errors"
          :key="error.uid"
          class="text-danger"
          role="alert"
        >
          {{ error.$message }}
        </p>
      </form-input-style>

      <form-input-style
        label-for-attr="name"
        label-text="Name"
      >
        <input
          id="name"
          v-model="formData.name"
          class="form-control"
          name="name"
        />
        <p
          v-for="error in v$.formData.name.$errors"
          :key="error.uid"
          class="text-danger"
          role="alert"
        >
          {{ error.$message }}
        </p>
      </form-input-style>

      <form-input-style
        label-for-attr="price"
        label-text="Price"
      >
        <input
          id="price"
          v-model="formData.price"
          class="form-control"
          name="price"
        />
        <p
          v-for="error in v$.formData.price.$errors"
          :key="error.uid"
          class="text-danger"
          role="alert"
        >
          {{ error.$message }}
        </p>
      </form-input-style>

      <!-- <form-input-style
        label-for-attr="typeSwitcher"
        label-text="Type Switcher"
      >
        <select
          id="typeSwitcher"
          class="form-select"
        >
          <option
            value="test"
            selected
          >
            Type Switcher
          </option>
          <option value="dvd">DVD</option>
          <option value="furniture">Furniture</option>
          <option value="book">Book</option>
        </select>
      </form-input-style> -->
      <!-- <div v-if=""></div> -->

      <form-input-2
        name="typeSwitcher"
        label="TypeSwitcher"
        custom-input
      >
        <template #customInput>
          <select
            id="typeSwitcher"
            ref="teste"
            v-model="formData.product"
            class="form-control form-select"
          >
            <option value="default">Type Switcher</option>
            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
            <option value="book">Book</option>
          </select>
          <p
            v-for="error in v$.formData.test.$errors"
            :key="error.uid"
            class="text-danger"
            role="alert"
          >
            {{ error.$message }}
          </p>
        </template>
      </form-input-2>

      <div v-if="formData.product == 'dvd'">
        <form-input-2
          id="size"
          v-model="formData.size"
          name="size"
          label="Size"
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
        </form-input-2>
      </div>

      <div v-if="formData.product == 'furniture'">
        <form-input-2
          id="height"
          v-model="formData.height"
          name="height"
          label="Height (CM)"
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
        </form-input-2>

        <form-input-2
          id="width"
          v-model="formData.width"
          name="width"
          label="Width (CM)"
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
        </form-input-2>

        <form-input-2
          id="length"
          v-model="formData.length"
          name="length"
          label="Length (CM)"
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
        </form-input-2>
      </div>

      <div v-if="formData.product == 'book'">
        <form-input-2
          id="weight"
          v-model="formData.weight"
          name="weight"
          label="Weight"
        >
          <template #errorMessages>
            <p
              v-for="error in v$.formData.weight.$errors"
              :key="error.uid"
              class="text-danger"
              role="alert"
            >
              {{ error.$message }}
            </p>
          </template>
        </form-input-2>
      </div>
    </form>
  </main>
</template>

<script>
import { useVuelidate } from '@vuelidate/core';
import { helpers, required, numeric } from '@vuelidate/validators';
import { FormInputStyle } from '../components/ProductAdd';
import { FormInput2 } from '../components/ProductAdd';

const preventDefautValue = (selected) => selected != 'default';

export default {
  components: {
    FormInputStyle,
    FormInput2,
  },
  setup() {
    return {
      v$: useVuelidate(),
    };
  },
  data() {
    return {
      formData: {
        sku: '',
        name: '',
        price: null,
        test: null,
        product: 'default',
        size: null,
        height: null,
        width: null,
        length: null,
        weight: null,
      },
      invalidTypeMessage: 'Please provide the indicated data type.',
    };
  },
  computed: {},
  methods: {
    teste() {
      console.log(this.$refs.teste.value);
    },
    addProduct() {
      console.log('Product added.');
    },
    cancel() {
      console.log('Canceled.');
    },
    invalidFunction() {
      console.log('Invalid');
    },
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
        sku: {
          $autoDirty: true,
          required,
          // numeric: helpers.withMessage(
          //   'Please provide the indicated data type.',
          // ),
        },
        name: {
          $autoDirty: true,
          required,
          // numeric: helpers.withMessage(
          //   'Please provide the indicated data type.',
          // ),
        },
        price: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
        test: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
        product: {
          $autoDirty: true,
          required,
          preventDefautValue: helpers.withMessage(
            'Please select a product.',
            preventDefautValue,
          ),
        },
        size: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
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
        weight: {
          $autoDirty: true,
          required,
          numeric: helpers.withMessage(this.invalidTypeMessage, numeric),
        },
      },
    };
  },
};
</script>
