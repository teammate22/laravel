import { createApp } from 'vue';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import App from './components/App.vue';

(window as any).Pusher = Pusher;

(window as any).Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'eu',
    forceTLS: true,
});

const app = createApp(App);
app.mount('#app');
