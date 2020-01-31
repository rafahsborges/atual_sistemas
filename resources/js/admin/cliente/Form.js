import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    props: [
        'civils',
        'empresas',
    ],
    data: function () {
        return {
            form: {
                tipo: false,
                nome: '',
                nascimento: '',
                rg: '',
                cpf: '',
                insc_municipal: '',
                cnpj: '',
                sexo: '',
                profissao: '',
                local_trabalho: '',
                telefone: '',
                celular: '',
                logradouro: '',
                numero: '',
                complemento: '',
                bairro: '',
                cidade: '',
                uf: '',
                email: '',
                observacao: '',
                cep: '',
                celular2: '',
                celular3: '',
                civil: '',
                empresa: '',
                enabled: true,
            },
            showPJ: false,
            sexo: [
                {nome: 'Masculino', id: 'M'},
                {nome: 'Feminino', id: 'F'},
            ],
            uf: [
                {nome: 'Acre', id: 'AC'},
                {nome: 'Alagoas', id: 'AL'},
                {nome: 'Amapá', id: 'AP'},
                {nome: 'Amazonas', id: 'AM'},
                {nome: 'Bahia', id: 'BA'},
                {nome: 'Ceará', id: 'CE'},
                {nome: 'Distrito Federal', id: 'DF'},
                {nome: 'Espírito Santo', id: 'ES'},
                {nome: 'Goiás', id: 'GO'},
                {nome: 'Maranhão', id: 'MA'},
                {nome: 'Mato Grosso', id: 'MT'},
                {nome: 'Mato Grosso do Sul', id: 'MS'},
                {nome: 'Minas Gerais', id: 'MG'},
                {nome: 'Pará', id: 'PA'},
                {nome: 'Paraíba', id: 'PB'},
                {nome: 'Paraná', id: 'PR'},
                {nome: 'Pernambuco', id: 'PE'},
                {nome: 'Piauí', id: 'PI'},
                {nome: 'Rio de Janeiro', id: 'RJ'},
                {nome: 'Rio Grande do Norte', id: 'RN'},
                {nome: 'Rio Grande do Sul', id: 'RS'},
                {nome: 'Rondônia', id: 'RO'},
                {nome: 'Roraima', id: 'RR'},
                {nome: 'Santa Catarina', id: 'SC'},
                {nome: 'São Paulo', id: 'SP'},
                {nome: 'Sergipe', id: 'SE'},
                {nome: 'Tocantins', id: 'TO'},
            ],
        }
    }

});
