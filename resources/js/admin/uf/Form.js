import AppForm from '../app-components/Form/AppForm';

Vue.component('uf-form', {
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