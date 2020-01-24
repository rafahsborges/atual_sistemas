import AppForm from '../app-components/Form/AppForm';

Vue.component('contrato-parcela-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                vencimento:  '' ,
                pagamento:  '' ,
                id_boleto:  '' ,
                id_carne:  '' ,
                valor:  '' ,
                numero_parcela:  '' ,
                valor_pagamento:  '' ,
                id_contrato:  '' ,
                enabled:  false ,
                
            }
        }
    }

});