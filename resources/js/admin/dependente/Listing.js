import AppListing from '../app-components/Listing/AppListing';

Vue.component('dependente-listing', {
    mixins: [AppListing],
    data() {
        return {
            showClientesFilter: false,
            showParentescosFilter: false,
            clientesMultiselect: {},
            parentescosMultiselect: {},

            filters: {
                clientes: [],
                parentescos: [],
            },
        }
    },

    watch: {
        showClientesFilter: function (newVal, oldVal) {
            this.clientesMultiselect = [];
        },
        showParentescosFilter: function (newVal, oldVal) {
            this.parentescosMultiselect = [];
        },
        clientesMultiselect: function(newVal, oldVal) {
            this.filters.clientes = newVal.map(function(object) { return object['key']; });
            this.filter('clientes', this.filters.clientes);
        },
        parentescosMultiselect: function(newVal, oldVal) {
            this.filters.parentescos = newVal.map(function(object) { return object['key']; });
            this.filter('parentescos', this.filters.parentescos);
        }
    }
});
