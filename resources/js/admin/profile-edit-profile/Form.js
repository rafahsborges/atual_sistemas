import AppForm from '../app-components/Form/AppForm';

Vue.component('profile-edit-profile-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                is_admin: false,
                activated: false,
                forbidden: false,
                language: '',

            },
            mediaCollections: ['avatar']
        }
    },
    methods: {
        onSuccess(data) {
            if (data.notify) {
                this.$notify({type: data.notify.type, title: data.notify.title, text: data.notify.message});
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        }
    }
});
