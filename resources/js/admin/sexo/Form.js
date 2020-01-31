import AppForm from '../app-components/Form/AppForm';

Vue.component('sexo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                abreviacao:  '' ,
                enabled:  false ,
                
            }
        }
    }

});