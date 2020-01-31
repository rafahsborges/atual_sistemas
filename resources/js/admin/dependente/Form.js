import AppForm from '../app-components/Form/AppForm';

Vue.component('dependente-form', {
    mixins: [AppForm],
    props: [
        'clientes',
        'parentescos'
    ],
    data: function () {
        return {
            form: {
                nome: '',
                nascimento: '',
                cliente: '',
                parentesco: '',
                enabled: true,
            }
        }
    }

});
