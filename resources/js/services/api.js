import axios from 'axios';

const apiClient = axios.create({
    baseURL: '/api',
    headers: {
        'Content-Type': 'application/json',
    },
});

export default {
    getPrizes() {
        return apiClient.get('/prizes');
    },
    spin() {
        return apiClient.get('/spin');
    },
};