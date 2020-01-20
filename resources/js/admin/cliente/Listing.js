import AppListing from '../app-components/Listing/AppListing';

Vue.component('cliente-listing', {
    mixins: [AppListing],
    data() {
        return {
            showPJ: false,
            showCivilsFilter: false,
            civilsMultiselect: {},

            filters: {
                civils: [],
            },
        }
    },

    watch: {
        showCivilsFilter: function (newVal, oldVal) {
            this.civilsMultiselect = [];
        },
        civilsMultiselect: function(newVal, oldVal) {
            this.filters.civils = newVal.map(function(object) { return object['key']; });
            this.filter('civils', this.filters.civils);
        }
    }
});
