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
  <h2 class="text-xl font-bold mb-4">Ajouter un pilote</h2>
  <form class="flex gap-4 justify-between items-center" @submit.prevent="addPilot">
    <div class="flex gap-2">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="grid-first-name"
        >
          Pilot Name
        </label>
        <input
          class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          v-model="name"
          placeholder="Nom"
          required
        />
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="grid-state"
        >
          Base
        </label>
        <div class="relative">
          <select
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            v-model="base_id"
            required
          >
            <option disabled value="">Choisir une base</option>
            <option v-for="base in bases" :value="base.id" :key="base.id">
              {{ base.name }}
            </option>
          </select>
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
      <button
        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
        type="submit"
      >
        Ajouter
      </button>
    </div>
  </form>

  <p v-if="message">{{ message }}</p>
</template>
