import AppForm from '../app-components/Form/AppForm';

Vue.component('conta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                banco:  '' ,
                agencia:  '' ,
                digito_agencia:  '' ,
                conta:  '' ,
                digito_conta:  '' ,
                codigo_empresa:  '' ,
                carteira:  '' ,
                tipo:  '' ,
                mensagem_1:  '' ,
                mensagem_2:  '' ,
                cpf_cnpj:  '' ,
                enabled:  false ,
                
            }
        }
    }

});