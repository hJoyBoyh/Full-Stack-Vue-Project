import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import VueTypedJs from 'vue-typed-js'



import App from './App.vue'
import router from './router'

const app = createApp(App)
app.use(VueTypedJs)
app.use(createPinia())
app.use(router)

app.mount('#app')
