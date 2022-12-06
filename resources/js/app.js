require('./bootstrap');
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import { Form } from 'vform'
window.Form = Form;
import axios from 'axios';
import App from './components/App.vue'
import Brands from './components/Brands/Brands.vue'
import Product from './components/Product/product.vue'
import Viewproduct from './components/Product/view-product.vue'
import Category from './components/Category/Category.vue'
import Supplies from './components/Supplies/Supplies.vue'
import Group from './components/Group/Product_group.vue'
import Serailcode from './components/Serailcode/serailcode.vue'
import Purchase from './components/Purchase/purchase-order.vue'
import Purchasview from './components/Purchase/view-puchese.vue'
import MenuProductSetting from './components/MenuProductsetup.vue'
import MenuPurchase from './components/MenuPurchase.vue'
import MenuStock from './components/MenuStock.vue'
import Stockalert from './components/StockAlert/stockalert.vue'
import MenuClinic from './components/MenuClinic.vue'
import MenuMedical from './components/MenuMedical.vue'
import Receptorder from './components/Recept/Recept-order.vue'
import viewRecept from './components/Recept/view-Recept.vue'

const app = createApp({})
const routes = [
  { path: '/', component: App },
  { path: '/brands', component: Brands },
  { path: '/Product', component: Product, name:'Product'},
  { path: '/viewproduct', component: Viewproduct},
  { path: '/category', component: Category},
  { path: '/supplies', component: Supplies},
  { path: '/group', component: Group},
  { path: '/serailcode', component: Serailcode},
  { path: '/purchase', component: Purchase,name:'Purchase'},
  { path: '/Purchasview', component: Purchasview},
  { path: '/productsetting', component: MenuProductSetting},
  { path: '/menupurchase', component: MenuPurchase},
  { path: '/menustock', component: MenuStock},
  { path: '/stockalert', component: Stockalert},
  { path: '/menuclinic', component: MenuClinic},
  { path: '/menumedical', component: MenuMedical},
  { path: '/receptorder', component: Receptorder},
  { path: '/viewrecept', component: viewRecept},
]
const router = createRouter({
  mode: 'history',
  history: createWebHistory(),
  routes: routes
})
app.use(router, axios)
app.mount('#app')


