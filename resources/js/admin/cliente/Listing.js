import AppListing from '../app-components/Listing/AppListing';

Vue.component('cliente-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            tiposMultiselect: {},
            statusMultiselect: {},
            cpfsMultiselect: {},
            cnpjsMultiselect: {},

            filters: {
                tipos: [],
                status: [],
                cpfs: [],
                cnpjs: [],
            },
            tiposList: [
                {nome: 'Pessoa Física', id: '0'},
                {nome: 'Pessoa Jurídica', id: '1'},
            ],
            statusList: [
                {nome: 'Ativo', id: '1'},
                {nome: 'Inativo', id: '0'},
            ],
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.tiposMultiselect = [];
            this.statusMultiselect = [];
            this.cpfsMultiselect = [];
            this.cnpjsMultiselect = [];
        },
        tiposMultiselect: function (newVal, oldVal) {
            this.filters.tipos = newVal.map(function (object) {
                return object['id'];
            });
            this.filter('tipos', this.filters.tipos);
        },
        statusMultiselect: function (newVal, oldVal) {
            this.filters.status = newVal.map(function (object) {
                return object['id'];
            });
            this.filter('status', this.filters.status);
        },
        cpfsMultiselect: function (newVal, oldVal) {
            this.filters.cpfs = newVal.map(function (object) {
                return object['key'];
            });
            this.filter('cpfs', this.filters.cpfs);
        },
        cnpjsMultiselect: function (newVal, oldVal) {
            this.filters.cnpjs = newVal.map(function (object) {
                return object['key'];
            });
            this.filter('cnpjs', this.filters.cnpjs);
        },
    }
});
