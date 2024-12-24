<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <article v-for="article in news" :key="article.id" class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between">
        <router-link :to="{ name: 'news.show', params: { id: article.id }}" class="block">
          <h2 class="text-xl font-semibold mb-2 hover:text-blue-600">{{ article.title }}</h2>
          <div class="flex items-center text-sm text-gray-500 mb-3">
            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ article.category.name }}</span>
            <span class="ml-2">{{ formatDate(article.created_at) }}</span>
          </div>
          <p class="text-gray-600">{{ truncate(article.content, 200) }}</p>
        </router-link>
  
        <!-- Botão centralizado -->
        <div class="mt-4 flex justify-center">
          <router-link 
            :to="{ name: 'news.show', params: { id: article.id }}" 
            class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition duration-300"
          >
            Leia Mais
          </router-link>
        </div>
      </article>
  
      <div v-if="loading" class="text-center py-4">
        Carregando...
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import { formatDate, truncate } from '../utils/helpers';
  
  defineProps({
    news: {
      type: Array,
      default: () => [],
    },
    loading: {
      type: Boolean,
      default: false,
    },
  });
  </script>
  