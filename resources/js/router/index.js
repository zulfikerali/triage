import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes.js'
// import store from '../store'
  
const router = createRouter({
  history: createWebHistory(),
  routes,
  linkActiveClass: 'activeLink'
})
router.beforeEach((to, from, next) => {
  if (localStorage.getItem("user") != null) {
    if (to.matched.some(route => route.meta.guard === 'guest')) next({ name: 'Dashboard' })
    else next();
    
  } else {
    if (to.matched.some(route => route.meta.guard === 'auth')) next({ name: 'Login' })
    else next();
  }
})

// router.beforeEach((to, from, next) => {
 
//     if (store.getters.user) {
//       if (to.matched.some(route => route.meta.guard === 'guest')) next({ name: 'home' })
//       else next();
      
//     } else {
//       if (to.matched.some(route => route.meta.guard === 'auth')) next({ name: 'login' })
//       else next();
//     }
    
  
  
//   // if (store.getters.user) {
//   //   if (to.name === 'login' || to.name === 'register') next({ name: 'home' })
//   //   else next()
//   // } else {

//   //   if (to.name !== 'login' && to.name !== 'register') next({ name: 'login' })
//   //   else next()
//   // }
// })

export default router;

