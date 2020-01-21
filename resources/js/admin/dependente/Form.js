import AppForm from '../app-components/Form/AppForm';

Vue.component('dependente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                nascimento:  '' ,
                cliente:  '' ,
                parentesco:  '' ,
                enabled:  false ,
            }
        }
    }

});
