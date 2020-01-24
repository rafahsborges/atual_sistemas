import AppListing from '../app-components/Listing/AppListing';

Vue.component('cliente-listing', {
    mixins: [AppListing],
    data() {
        return {
            showStatusFilter: false,
            statusMultiselect: {},

            filters: {
                status: [],
            },
            statusList: [
                {nome: 'Ativo', id: '1'},
                {nome: 'Inativo', id: '0'},
            ],
        }
    },

    watch: {
        showStatusFilter: function (newVal, oldVal) {
            this.statusMultiselect = [];
        },
        statusMultiselect: function(newVal, oldVal) {
            this.filters.status = newVal.map(function(object) { return object['key']; });
            this.filter('status', this.filters.status);
        },
    }
});
