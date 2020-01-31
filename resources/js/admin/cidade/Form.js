import AppForm from '../app-components/Form/AppForm';

Vue.component('cidade-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                ibge_code:  '' ,
                id_uf:  '' ,
                enabled:  false ,
                
            }
        }
    }

});