import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import pinia from './stores';

const app = createApp({});

app.use(router);
app.use(pinia);

app.mount('#app');
