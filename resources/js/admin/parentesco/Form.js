import AppForm from '../app-components/Form/AppForm';

Vue.component('parentesco-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                enabled:  false ,
                
            }
        }
    }

});