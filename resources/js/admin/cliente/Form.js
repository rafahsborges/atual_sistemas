import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    props: [
        'civils',
        'empresas',
        'sexos',
        'ufs',
        'cidades',
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
        }
    },

    methods: {
        getAddressInfo(e) {
            this.$viaCep.buscarCep(e.target.value).then((obj) => {
                this.form.logradouro = obj.logradouro;
                this.form.complemento = obj.complemento;
                this.form.bairro = obj.bairro;
                //this.form.cidade = obj.localidade;
                //this.form.estado = obj.uf;
            });
        },
    },
});
