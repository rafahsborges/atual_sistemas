import AppForm from '../app-components/Form/AppForm';

Vue.component('contrato-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                primeira_parcela:  '' ,
                ultima_parcela:  '' ,
                data_assinatura:  '' ,
                qtd_parcelas:  '' ,
                tipo_pagamento:  '' ,
                valor:  '' ,
                plano_funeral:  false ,
                desconto:  '' ,
                juros:  '' ,
                multa:  '' ,
                validade_contrato:  '' ,
                id_cliente:  '' ,
                id_plano:  '' ,
                id_conta:  '' ,
                enabled:  false ,
                
            }
        }
    }

});