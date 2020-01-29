import AppForm from '../app-components/Form/AppForm';

Vue.component('remessa-boleto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_boleto:  '' ,
                id_remessa:  '' ,
                
            }
        }
    }

});