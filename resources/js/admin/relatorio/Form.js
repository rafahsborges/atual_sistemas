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
                console.log(new Date(e.target.value));
                this.configs.end.minDate = new Date(e.target.value);
                console.log(this.configs.end.minDate);
            }
            if (e.target.id === 'fim' && Object.prototype.toString.call(new Date(e.target.value)) === '[object Date]') {
                this.configs.start.maxDate = new Date(e.target.value);
            }
        },
    }
});
