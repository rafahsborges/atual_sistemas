import AppListing from '../app-components/Listing/AppListing';

Vue.component('contrato-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            clientesMultiselect: {},
            planosMultiselect: {},

            filters: {
                clientes: [],
                planos: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.clientesMultiselect = [];
            this.planosMultiselect = [];
        },
        clientesMultiselect: function (newVal, oldVal) {
            this.filters.clientes = newVal.map(function (object) {
                return object['key'];
            });
            this.filter('clientes', this.filters.clientes);
        },
        planosMultiselect: function (newVal, oldVal) {
            this.filters.planos = newVal.map(function (object) {
                return object['key'];
            });
            this.filter('planos', this.filters.planos);
        }
    }
});
