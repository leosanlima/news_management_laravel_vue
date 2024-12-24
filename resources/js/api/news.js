import { apiClient } from './config';

export const newsApi = {
    async getAll(params = {}) {
        return apiClient.get('/news', { params });
      },
      async search(query) {
        return apiClient.get('/news/search', {
          params: { search: query },
        });
      },
    getOne: (id) => apiClient.get(`/news/${id}`), 
};
