import AppForm from '../app-components/Form/AppForm';

Vue.component('remessa-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                data: '',
                id_usuario: '',
                nome: '',
                sequencia: '',
                id_conta: '',
            }
        }
    }

});
