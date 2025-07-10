<script setup>
import { ref, onMounted } from 'vue';
import { getPilots, createPilot, deletePilot } from '@/services/api';
import PilotForm from './PilotForm.vue';

const pilots = ref([]);
const currentPage = ref(1);
const totalPages = ref(0);

const fetchPilots = async (page = 1) => {
  const res = await getPilots(page);
  pilots.value = res.data;
  totalPages.value = res.last_page;
  currentPage.value = res.current_page;
};

const addPilot = async (pilotData) => {
  try {
    await createPilot(pilotData);
    await fetchPilots(currentPage.value);
  } catch (error) {
    console.error('Error adding pilot:', error);
  }
};

const removePilot = async (pilotId) => {
  try {
    await deletePilot(pilotId);
    await fetchPilots(currentPage.value);
  } catch (error) {
    console.error('Error removing pilot:', error);
  }
};

onMounted(fetchPilots);
</script>
<template>
  <div class="flex flex-col gap-4">
    <div class="pilot-manager">
      <h1 class="text-2xl font-bold mb-4 text-center">Pilot Manager</h1>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div v-for="pilot in pilots" :key="pilot.id" class="border p-4 rounded shadow">
          <h2 class="text-xl font-semibold">{{ pilot.name }}</h2>
          <p>Base: {{ pilot.base.name }}</p>
          <p>Created: {{ new Date(pilot.created_at).toLocaleDateString() }}</p>
          <p>Created: {{ new Date(pilot.updated_at).toLocaleDateString() }}</p>
          <div class="flex justify-center">
            <button
              @click="removePilot(pilot.id)"
              class="mt-2 text-red-500 hover:text-red-700 hover:underline cursor-pointer mx-auto"
            >
              Remove
            </button>
          </div>
        </div>
      </div>
      <div class="flex justify-end gap-4 py-4">
        <button
          v-for="page in totalPages"
          :key="page"
          @click="fetchPilots(page)"
          :class="{
            'bg-blue-500 text-white': currentPage === page,
            'bg-gray-200 text-gray-700': currentPage !== page,
          }"
          class="px-4 py-2 rounded"
        >
          {{ page }}
        </button>
      </div>
    </div>
    <div>
      <PilotForm @addpilot="addPilot" />
    </div>
  </div>
</template>
