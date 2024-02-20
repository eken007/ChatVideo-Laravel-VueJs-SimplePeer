import { createRouter, createWebHistory } from 'vue-router'
import auth from '../components/AuthComponent.vue'
import VideoChat from '../components/VideoChat.vue'
import register from '../components/RegisterComponent'

const routes = [
  {
    path:'/register',
    name:'register',
    component:register,
  },
  {
    path:'/',
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
