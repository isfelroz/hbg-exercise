import axios from 'axios';
export const api = axios.create({
  baseURL: 'http://localhost:8000/api',
});

export const getPilots = async (page) => {
  try {
    const response = await api.get('/pilots?page=' + page);
    if (response.status !== 200) {
      throw new Error(`Error fetching pilots: ${response.statusText}`);
    }
    return response.data;
  } catch (error) {
    console.error('Error fetching pilots:', error);
    return [];
  }
};

export const createPilot = async (pilotData) => {
  try {
    const response = await api.post('/pilots', pilotData);
    if (response.status !== 200) {
      throw new Error(`Error creating pilot: ${response.statusText}`);
    }
    return response.data;
  } catch (error) {
    console.error('Error creating pilot:', error);
    return null;
  }
};

export const deletePilot = async (pilotId) => {
  try {
    const response = await api.delete(`/pilots/${pilotId}`);
    if (response.status !== 200) {
      throw new Error(`Error deleting pilot: ${response.statusText}`);
    }
    return response.data;
  } catch (error) {
    console.error('Error deleting pilot:', error);
    return null;
  }
};

export const getBases = async () => {
  try {
    const response = await api.get('/bases');
    if (response.status !== 200) {
      throw new Error(`Error fetching bases: ${response.statusText}`);
    }
    return response.data;
  } catch (error) {
    console.error('Error fetching bases:', error);
    return [];
  }
};
