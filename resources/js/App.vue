<template>
    <div class="min-h-screen bg-gray-100">
      <!-- Navegação -->
      <nav class="bg-white shadow-lg mb-8">
        <div class="max-w-7xl mx-auto px-4">
          <div class="flex justify-between h-16 items-center">
            <!-- Logo e Título -->
            <div class="flex items-center space-x-4">
              <img src="/images/logo.webp" alt="Logo" class="h-10 w-10" />
              <router-link to="/" class="text-xl font-bold">Notícias</router-link>
            </div>
  
            <!-- Links de Navegação -->
          <div class="flex items-center space-x-4">
            <a href="/admin" class="text-gray-700 hover:text-gray-900">Cadastrar Notícias</a>
          </div>
        


            <div class="relative w-96">
            <input 
                type="text" 
                v-model="searchQuery" 
                            @input="handleSearch" 
                            placeholder="Buscar notícias..." 
                class="w-full px-4 py-2 pr-10 rounded-lg text-gray-700 border border-gray-300 focus:ring-2 focus:ring-blue-500"
            />
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.42-1.42l4.95 4.94a1 1 0 01-1.42 1.42l-4.94-4.94zM8 14A6 6 0 108 2a6 6 0 000 12z" clip-rule="evenodd" />
                </svg>
            </div>
            </div>



          </div>
        </div>
      </nav>
  
      <!-- Conteúdo Principal -->
      <main class="max-w-7xl mx-auto px-4">
        <router-view :news="news" :loading="loading" />
      </main>
    </div>
  </template>
  
  <script setup>
import { ref, onMounted } from 'vue';
import NewsList from './views/NewsList.vue';
import { newsApi } from './api/news';

const searchQuery = ref('');
const news = ref([]);
const loading = ref(false);

const handleSearch = async () => {
  loading.value = true;
  try {
    if (searchQuery.value.trim()) {
      const response = await newsApi.search(searchQuery.value);
      news.value = response.data.data;
    } else {
      const response = await newsApi.getAll();
      news.value = response.data.data;
    }
  } catch (error) {
    console.error('Error during search:', error);
  } finally {
    loading.value = false;
  }
};

// Carrega todas as notícias quando o componente é montado
onMounted(() => {
  handleSearch();
});
</script>

  