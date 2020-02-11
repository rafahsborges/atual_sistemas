import AppListing from '../app-components/Listing/AppListing';

var _lodash = require('lodash');

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
    },

    methods: {

        bulkCarteira: function bulkCarteira(url) {
            var _this5 = this;

            var itemsToExport = (0, _lodash.keys)((0, _lodash.pickBy)(this.bulkItems));
            var self = this;

            this.$modal.show('dialog', {
                title: 'Warning!',
                text: 'Do you really want to export ' + this.clickedBulkItemsCount + ' selected items ?',
                buttons: [{title: 'No, cancel.'}, {
                    title: '<span class="btn-dialog btn-success">Yes, export.<span>',
                    handler: function handler() {
                        _this5.$modal.hide('dialog');
                        axios({
                            url: url + '/' + itemsToExport,
                            method: 'GET',
                            responseType: 'blob',
                        }).then((response) => {
                            var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                            var fileLink = document.createElement('a');
                            fileLink.href = fileURL;
                            fileLink.setAttribute('download', 'carteiras.pdf');
                            document.body.appendChild(fileLink);
                            fileLink.click();
                            self.bulkItems = {};
                            _this5.loadData();
                            _this5.$notify({
                                type: 'success',
                                title: 'Success!',
                                text: response.data.message ? response.data.message : 'Item successfully exported.'
                            });
                        }, function (error) {
                            _this5.$notify({
                                type: 'error',
                                title: 'Error!',
                                text: error.response.data.message ? error.response.data.message : 'An error has occured.'
                            });
                        });
                    }
                }]
            });
        },
    }
});
