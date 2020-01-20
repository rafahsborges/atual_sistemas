import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tipo:  false ,
                nome:  '' ,
                nascimento:  '' ,
                rg:  '' ,
                cpf:  '' ,
                insc_municipal:  '' ,
                cnpj:  '' ,
                sexo:  '' ,
                id_estado_civil:  '' ,
                profissao:  '' ,
                local_trabalho:  '' ,
                telefone:  '' ,
                celular:  '' ,
                logradouro:  '' ,
                numero:  '' ,
                complemento:  '' ,
                bairro:  '' ,
                cidade:  '' ,
                uf:  '' ,
                email:  '' ,
                observacao:  '' ,
                cep:  '' ,
                celular2:  '' ,
                celular3:  '' ,
                id_cliente_responsavel:  '' ,
                
            }
        }
    }

});