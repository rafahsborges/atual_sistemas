import AppForm from '../app-components/Form/AppForm';

Vue.component('boleto-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                status: false,
                id_parcela: '',
            }
        }
    }

});
