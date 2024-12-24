<template>
    <div class="max-w-4xl mx-auto px-4 py-8">
      <div v-if="loading" class="text-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mx-auto"></div>
      </div>
  
      <div v-else-if="error" class="bg-red-50 border border-red-200 rounded-lg p-4 text-red-600">
        {{ error }}
      </div>
  
      <div v-else-if="article" class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
          <div class="mb-6">
            <router-link 
              :to="{ name: 'home' }" 
              class="inline-flex items-center text-blue-600 hover:text-blue-800"
            >
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              Voltar
            </router-link>
          </div>
  
          <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ article.title }}</h1>
          
          <div class="flex items-center space-x-4 text-sm text-gray-500 mb-6">
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
              {{ article.category.name }}
            </span>
            <span>{{ formatDate(article.created_at) }}</span>
          </div>
  
          <div class="prose max-w-none">
            <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ article.content }}</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { useRoute } from 'vue-router';
  import { newsApi } from '../api/news';
  import { formatDate, truncate } from '../utils/helpers';

const route = useRoute();
const article = ref(null);
const loading = ref(true);
const error = ref(null);

const loadArticle = async () => {
  loading.value = true;
  error.value = null;

  try {
    const response = await newsApi.getOne(route.params.id);
    article.value = response.data;
  } catch (err) {
    error.value = 'Failed to load article. Please try again later.';
    console.error('Error loading article:', err);
  } finally {
    loading.value = false;
  }
};

onMounted(loadArticle);
</script>