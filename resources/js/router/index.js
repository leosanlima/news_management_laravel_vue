import { createRouter, createWebHistory } from 'vue-router';
import NewsList from '../views/NewsList.vue';
import NewsDetail from '../views/NewsDetail.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: NewsList
    },
    {
        path: '/news/:id',
        name: 'news.show',
        component: NewsDetail,
        props: true,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;