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

export const getBases = async () => {
  try {
    const response = await api.get('/bases');
    console.log(response);
    console.log('Fetched bases:', response);
    if (response.status !== 200) {
      throw new Error(`Error fetching bases: ${response.statusText}`);
    }
    return response.data;
  } catch (error) {
    console.error('Error fetching bases:', error);
    return [];
  }
};
