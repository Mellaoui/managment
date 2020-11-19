import axios from 'axios';
const state = {
    patients:[]
}
const getters = {
    Allpatients: (state) => state.patients.length
};
const actions = {
    async fetchPatients({commit}){
        const response = await axios.get('api/patient')
        .then((response) =>{ this.patients = response.data.patients});

        commit('setPatient',response.data);
    }
};
const mutations = {
    setPatient: (state, patients) => (state.patients = patients)
};

export default{
    state,
    getters,
    actions,
    mutations
}
