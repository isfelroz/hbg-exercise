<script setup>
import { ref, onMounted } from 'vue';
import { getBases } from '@/services/api';

const bases = ref([]);

const fetchBases = async () => {
  const res = await getBases();
  bases.value = res;
};
onMounted(fetchBases);
</script>

<template>
  <FormKit
    type="form"
    id="registration-example"
    :form-class="submitted ? 'hide' : 'show'"
    submit-label="Register"
    @submit="submitHandler"
    :actions="false"
  >
    <h2 class="text-xl font-bold mb-4">Ajouter un pilote</h2>
    <div class="flex gap-4 justify-between items-center">
      <div class="flex gap-2">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <FormKit
            type="text"
            name="name"
            label="Pilote Name"
            placeholder="Jane Doe"
            validation="required"
            :config="{
              classes: {
                input:
                  'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
              },
            }"
          />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <div class="relative">
            <FormKit
              type="select"
              name="base_id"
              label="Base"
              :options="bases.map((base) => ({ label: base.name, value: base.id }))"
              placeholder="Choisir une base"
              validation="required"
              :config="{
                classes: {
                  input:
                    'block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500',
                },
              }"
            />

            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div>
        <FormKit
          type="submit"
          label="Ajouter"
          :config="{
            classes: {
              input:
                'flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded cursor-pointer',
            },
          }"
        />
      </div>
    </div>
  </FormKit>
  <div v-if="submitted">
    <h2 class="text-xl text-green-500">Submission successful!</h2>
  </div>
</template>
