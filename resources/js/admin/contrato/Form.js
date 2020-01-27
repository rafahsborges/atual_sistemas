import AppForm from '../app-components/Form/AppForm';
import {VMoney} from 'v-money';

Vue.component('contrato-form', {
    mixins: [AppForm],
    props: [
        'clientes',
        'contas',
        'planos'
    ],
    data: function () {
        return {
            form: {
                primeira_parcela: '',
                ultima_parcela: '',
                data_assinatura: '',
                qtd_parcelas: '',
                qtd_meses: '',
                tipo_pagamento: '',
                valor: '',
                plano_funeral: false,
                desconto: '',
                juros: '',
                multa: '',
                validade_contrato: '',
                enabled: false,
                cliente: '',
                conta: '',
                plano: '',
                valor_parcela: '',

            },
            price: 123.45,
            money: {
                decimal: ',',
                thousands: '.',
                prefix: '',
                suffix: '',
                precision: 2,
                masked: false /* doesn't work with directive */
            },
            percent: {
                decimal: ',',
                thousands: '.',
                prefix: '',
                suffix: ' %',
                precision: 2,
                masked: false /* doesn't work with directive */
            },
            pgList: [
                {nome: 'Boleto', id: 1},
                {nome: 'Carnê', id: 2},
            ]
        }
    },

    directives: {
        money: VMoney,
        percent: VMoney,
    },

});

