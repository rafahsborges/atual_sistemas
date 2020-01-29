import AppListing from '../app-components/Listing/AppListing';

Vue.component('contrato-parcela-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            contratosMultiselect: {},

            filters: {
                contratos: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.contratosMultiselect = [];
        },
        contratosMultiselect: function(newVal, oldVal) {
            this.filters.contratos = newVal.map(function(object) { return object['key']; });
            this.filter('contratos', this.filters.contratos);
        }
    }
});
