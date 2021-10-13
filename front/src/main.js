import 'font-awesome/css/font-awesome.css'
import Vue from 'vue'

import App from './App'
import './config/bootstrap'
import store from './config/store'
import router from './config/router'

Vue.config.productionTip = false

// TEMPORARIO!
require('axios').defaults.headers.common['Access-Control-Allow-Origin'] = 'http://localhost:8080/'
/* require('axios').defaults.headers.common['Content-Type'] = 'application/x-www-form-urlencoded'*/
//require('axios').defaults.headers.common['Access-Control-Allow-Methods'] = 'GET, PUT, POST, DELETE, OPTIONS'
//require('axios').defaults.headers.common['Content-Type'] = 'application/json'
//require('axios').defaults.headers.common['Access-Control-Allow-Credentials'] = 'true'

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')