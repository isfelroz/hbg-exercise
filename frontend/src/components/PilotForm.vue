<script setup>
import { ref, onMounted } from 'vue';
import { getBases } from '@/services/api';

const emit = defineEmits(['addpilot']);
const bases = ref([]);
const submitted = ref(false);

const fetchBases = async () => {
  const res = await getBases();
  bases.value = res;
};

const submitHandler = (formData) => {
  emit('addpilot', formData);
  console.log('Form submitted with data:', formData);
  submitted.value = true;
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
    <div class="flex gap-4 justify-between items-end">
      <div class="flex gap-2 items-end">
        <div class="w-full max-w-[200px]">
          <FormKit
            type="text"
            name="name"
            label="Pilote Name"
            placeholder="Jane Doe"
            validation="required"
            :config="{
              classes: {
                input:
                  'block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500',
                message: 'text-red-500 text-xs italic mt-2',
              },
            }"
          />
        </div>
        <div class="w-full max-w-[200px]">
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
                    'block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500',
                  message: 'text-red-500 text-xs italic mt-2',
                },
              }"
            />
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
                'flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 border-4 text-white py-2 px-4 rounded cursor-pointer',
            },
          }"
        />
      </div>
    </div>
  </FormKit>
  <div class="py-2" v-if="submitted">
    <p class="text-green-500">Le pilot a été créé</p>
  </div>
</template>
