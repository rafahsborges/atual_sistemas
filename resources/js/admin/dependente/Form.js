import AppForm from '../app-components/Form/AppForm';

Vue.component('dependente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                nascimento:  '' ,
                id_cliente:  '' ,
                id_parentesco:  '' ,
                enabled:  false ,
                
            }
        }
    }

});