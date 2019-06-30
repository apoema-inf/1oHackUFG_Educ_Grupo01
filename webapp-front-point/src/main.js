import Vue from 'vue'
import App from './App.vue'
import BootstrapVue from 'bootstrap-vue'
import VueRouter from 'vue-router'
import router from './router'
import ElementUI from 'element-ui'
import VueSweetalert2 from 'vue-sweetalert2';
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css'
import 'sweetalert2/dist/sweetalert2.min.css';
import 'element-ui/lib/theme-chalk/index.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(Vuetify)
Vue.use(VueSweetalert2);
Vue.use(ElementUI);
Vue.use(VueRouter)
Vue.use(BootstrapVue)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
