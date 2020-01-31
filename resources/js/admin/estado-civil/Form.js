import AppForm from '../app-components/Form/AppForm';

Vue.component('estado-civil-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                nome: '',
                enabled: true,
            }
        }
    }

});
