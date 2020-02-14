import AppForm from '../app-components/Form/AppForm';

Vue.component('relatorio-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                inicio: '',
                fim: '',
            },
            configs: {
                start: {
                    dateFormat: 'Y-m-d H:i:S',
                    altInput: true,
                    altFormat: 'd.m.Y',
                    locale: null,
                    minDate: new Date(),
                    maxDate: null
                },
                end: {
                    dateFormat: 'Y-m-d H:i:S',
                    altInput: true,
                    altFormat: 'd.m.Y',
                    locale: null,
                    minDate: null
                },
            }
        }
    },
    methods: {
        changed(e) {
            if (e.target.id === 'inicio' && Object.prototype.toString.call(new Date(e.target.value)) === '[object Date]') {
                this.configs.end.minDate = new Date(e.target.value);
            }
            if (e.target.id === 'fim' && Object.prototype.toString.call(new Date(e.target.value)) === '[object Date]') {
                this.configs.start.maxDate = new Date(e.target.value);
            }
        },
        setValues(e) {
            e.preventDefault();
            if (Object.prototype.toString.call(new Date(e.target[0].value)) === '[object Date]' &&
                Object.prototype.toString.call(new Date(e.target[2].value)) === '[object Date]') {
                window.location = '/admin/relatorios/' + e.target[0].value + '/' + e.target[2].value;
            }
            return false;
        },
    }
});
