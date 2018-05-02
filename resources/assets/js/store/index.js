import Vuex from 'vuex';
import Vue from 'vue';


Vue.use(Vuex);


export default new Vuex.Store({
    state: {// Datos
        activities: [],
        keys: [],
        fortalalezas: [],
        Debilidades: [],
        Oportunidades: [],
        Amenazas: []
    },
    getters: { // Propiedades computed

    },
    actions: {// methods
        getActivities(context){
            return axios.get('/activities')
            .then(res => {
                context.commit('getActivities', res.data);
            })
            .catch(error => console.log(error));
            
        }
    },
    mutations: {// Used el cambio 
        getActivities(state, activities){
            state.activities = activities; 
        }
    }
});