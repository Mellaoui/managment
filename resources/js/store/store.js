import Vue from 'vue';
import Vuex from 'vuex';
import { Bar } from 'vue-chartjs';
import charts from './modules/charts';
import calc from './modules/calc'

Vue.use(Vuex);

export const store = new Vuex.Store({
   modules:{
       charts,
       calc
   }
  })