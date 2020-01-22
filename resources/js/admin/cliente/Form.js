import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    props: [
        'civils',
        'empresas',
    ],
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
                civil: '',
                empresa:  '' ,
                enabled:  false ,
            },
            showPJ: false,
        }
    }

});
