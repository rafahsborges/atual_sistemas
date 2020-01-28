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
                enabled: true,
                cliente: '',
                conta: '',
                plano: '',
                valor_parcela: '',

            },
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
                suffix: '',
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
        newValor: 0.00,
        newQtdParcelas: 0,
        newQtdMeses: 0,
        newDtAssinatura: 0,
        changed(e) {
            let valor = '0,00';
            let data_assinatura;
            let qtd_meses = 0;
            let qtd_parcelas = 0;
            let valor_parcela = '0,00';
            let validade_contrato = '0,00';
            if (e.target.id === 'valor' && e.target.value !== '0,00') {
                valor = e.target.value.replace(/[^\d,]+/g, '').replace(',', '.');
            }
            if (e.target.id === 'data_assinatura') {
                //console.log(e.target.value);
            }
            if (e.target.id === 'qtd_meses' && e.target.value !== 0) {
                qtd_meses = e.target.value;
            }
            if (e.target.id === 'qtd_parcelas' && e.target.value !== 0) {
                qtd_parcelas = e.target.value;
            }
            if (valor !== '0,00' && qtd_parcelas !== 0 || qtd_parcelas !== '0') {
                //console.log(parseInt(valor) / parseInt(qtd_parcelas));
                //$('#valor_parcela').val(parseInt(valor) / parseInt(qtd_parcelas));
            }
        },
        setValor(e) {
            if (e.target.value !== 'undefined' && e.target.value !== '0,00') {
                this.newValor = parseFloat(e.target.value.replace(/[^\d,]+/g, '').replace(',', '.'));
                this.setValorParcela();
            }
        },
        setQtdMeses(e) {
            if (e.target.value !== 'undefined' && e.target.value !== 0) {
                console.log(e.target.value);
            }
        },
        setQtdParcelas(e) {
            if (e.target.value !== 'undefined' && e.target.value !== 0) {
                this.newQtdParcelas = parseInt(e.target.value);
                this.setValorParcela();
            }
        },
        setValorParcela() {
            if (this.newValor !== 0.00 && this.newQtdParcelas !== 0) {
                this.form.valor_parcela = (this.newValor / this.newQtdParcelas)
                    .toFixed(2)
                    .toString()
                    .replace('.', ',');
            }
        },
    },

});
