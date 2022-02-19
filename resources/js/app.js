import { createApp } from 'vue'
import './main.js';

const app = createApp({});

app.component('searchbar-component', require('./components/searchBar.vue').default);
app.component('favoriticon-component', require('./components/favoritIcon.vue').default);
app.component('searchbarres-component', require('./components/searchBarRes.vue').default);

app.mount('#app');