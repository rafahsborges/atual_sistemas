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
                prefix: 'R$ ',
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

    methods: {
        changed(e) {
            let valor;
            let data_assinatura;
            let qtd_meses;
            let qtd_parcelas;
            let valor_parcela;
            let validade_contrato;
            if (e.target.id === 'valor' && e.target.value !== 'R$ 0,00') {
                valor = e.target.value.replace(/[^\d,]+/g, '').replace(',', '.');
                valor = e.target.value.replace(/[^\d,]+/g, '').replace(',', '.');
            }
            if (e.target.id === 'data_assinatura') {
                console.log(e.target.value);
            }
            if (e.target.id === 'qtd_meses' && e.target.value !== '0') {
                qtd_meses = e.target.value;
            }
            if (e.target.id === 'qtd_parcelas' && e.target.value !== '0') {
                qtd_parcelas = e.target.value;
            }
            if (valor !== 'R$ 0,00' && qtd_parcelas !== 0) {
                $('#valor_parcela').val(valor / qtd_parcelas);
            }
        }
    },

});

