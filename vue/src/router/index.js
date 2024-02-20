import { createRouter, createWebHistory } from 'vue-router'
import sign from '../components/SignComponent.vue'
import reserver from '../components/ReservationsComponent.vue'
import auth from '../components/AuthComponent.vue'
import VideoChat from '../components/VideoChat.vue'
import register from '../components/RegisterComponent'

const routes = [
  {
    path:'/',
    name:'sign',
    component:sign,
  },
  {
    path:'/register',
    name:'register',
    component:register,
  },
  {
    path:'/reserver',
    name:'reserver',
    component:reserver,
  },
  {
    path:'/auth',
    name:'auth',
    component:auth,
  },
  {
    path:'/video-chat',
    name:'video-chat',
    component:VideoChat,
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
