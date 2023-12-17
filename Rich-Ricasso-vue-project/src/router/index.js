import { createRouter, createWebHistory } from 'vue-router'
import AccueilView from '../views/AccueilView.vue'
import ProduitView from '../views/ProduitView.vue'
import ProfilView from '../views/ProfilView.vue'
import LoginView from '../views/LoginView.vue'
import SignUpView from '../views/SignUpView.vue'
import InscriptionReussiView from '../views/InscriptionReussiView.vue'
import PayementReussiView from '../views/PayementReussiView.vue'
import ErrorView from '../views/ErrorView.vue'
import PanierView from '../views/PanierView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'accueil',
      component: AccueilView
    },
    {
      path: '/produit',
      name: 'produit',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: ProduitView
    }
    ,{
      path: '/profil',
      name: 'profil',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: ProfilView
    }
    ,{
      path: '/login',
      name: 'login',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: LoginView
    }
    ,{
      path: '/signup',
      name: 'signup',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: SignUpView
    }
    ,{
      path: '/inscriptionReussi',
      name: 'inscriptionReussi',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: InscriptionReussiView
    }
    ,{
      path: '/payementreussi',
      name: 'payementreussi',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: PayementReussiView
    }
    ,{
      path: '/error',
      name: 'error',
    
      component: ErrorView
    }
    ,{
      path: '/panier',
      name: 'panier',
      
      component: PanierView
    }
  ]
})

export default router
