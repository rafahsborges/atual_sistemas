import AppForm from '../app-components/Form/AppForm';

Vue.component('admin-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                password:  '' ,
                is_admin:  false ,
                activated:  false ,
                forbidden:  false ,
                language:  '' ,
            }
        }
    }
});
