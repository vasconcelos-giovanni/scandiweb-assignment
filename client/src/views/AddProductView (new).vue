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
      <!-- <form-input
        v-model="inputSku"
        label-text="SKU"
        input-name-and-id="sku"
        input-html-type="text"
      />
      <form-input
        v-model="inputName"
        label-text="Name"
        input-name-and-id="name"
        input-html-type="text"
      />
      <form-input
        v-model="inputPrice"
        label-text="Price ($)"
        input-name-and-id="price"
        input-html-type="number"
      />
      <form-input
        v-model="inputType"
        label-text="Type Switcher"
        not-typing-field
      >
        <template #selectSlot>
          <select
            id=""
            v-model="productType"
            value=""
            name=""
            class="col-4 form-select"
          >
            <option
              v-for="productType in productTypes"
              :key="productType.id"
              :value="productType.id"
            >
              {{ productType.name }}
            </option>
          </select>
        </template>
      </form-input>

      <div id="book-attributes">
        <form-input
          v-if="productType == 'BookAttribute'"
          v-model="inputWeight"
          label-text="Weight (KG)"
          input-name-and-id="weight"
          input-html-type="number"
        />
        <form-input
          v-else-if="productType == 'DvdAttribute'"
          v-model="inputSize"
          label-text="Size (MB)"
          input-name-and-id="size"
          input-html-type="number"
        />
        <div v-else-if="productType == 'FurnitureAttribute'">
          <form-input
            v-model="inputHeight"
            label-text="Height (CM)"
            input-name-and-id="height"
            input-html-type="number"
          />
          <form-input
            v-model="inputWidth"
            label-text="Width (CM)"
            input-name-and-id="width"
            input-html-type="number"
          />
          <form-input
            v-model="inputLength"
            label-text="Length (CM)"
            input-name-and-id="length"
            input-html-type="number"
          />
        </div>
      </div> -->
      <div :class="labelWrapperClass">
        <label
          :for="inputNameAndId"
          :class="labelClass"
        >
          {{ labelText }}
        </label>
        <div :class="inputWrapperClass">
          <input
            :id="inputNameAndId"
            v-model="inputSku"
            required="true"
            :type="inputHtmlType"
            :class="inputClass"
            :name="inputNameAndId"
          />
        </div>
      </div>
    </form>
  </main>
</template>

<script>
// import { FormInput } from '../components/ProductAdd';

export default {
  components: {
    // FormInput,
  },
  data() {
    return {
      inputName: '',
      inputPrice: null,
      inputSku: '',
      inputWeight: null,
      inputSize: null,
      inputHeight: null,
      inputWidth: null,
      inputLength: null,
      inputType: '',
      productType: '',
      productTypes: [
        { id: 'book', name: 'Book' },
        { id: 'dvd', name: 'DVD' },
        { id: 'furniture', name: 'Furniture' },
      ],
      inputClass: 'form-control',
      inputWrapperClass: 'col-4',
      labelClass: 'col-2 col-form-label fw-bold',
      labelWrapperClass: 'row mb-3',
      inputs: {
        general: [
          {
            label: 'SKU',
            nameAndId: 'sku',
            type: 'text',
            inputModel: 'inputSku',
          },
          {
            label: 'Name',
            nameAndId: 'name',
            type: 'text',
            inputModel: 'inputName',
          },
          {
            label: 'Price',
            nameAndId: 'price',
            type: 'number',
            inputModel: 'inputPrice',
          },
        ],
        book: [
          {
            label: 'Weight (KG)',
            nameAndId: 'weight',
            type: 'number',
            inputModel: 'inputWeight',
          },
        ],
        dvd: [
          {
            label: 'Size (MB)',
            nameAndId: 'size',
            type: 'number',
            inputModel: 'inputSize',
          },
        ],
        furniture: [
          {
            label: 'Height',
            nameAndId: 'height',
            type: 'number',
            inputModel: 'inputHeight',
          },
          {
            label: 'Width',
            nameAndId: 'width',
            type: 'number',
            inputModel: 'inputWidth',
          },
          {
            label: 'Length',
            nameAndId: 'length',
            type: 'number',
            inputModel: 'inputLength',
          },
        ],
      },
    };
  },
  computed: {},
  methods: {
    addProduct() {
      console.log('Product added.');
    },
    cancel() {
      console.log('Canceled.');
    },
    // switchType(attributeComponent) {
    //   this.productType = attributeComponent;
    // },
  },
};
</script>
