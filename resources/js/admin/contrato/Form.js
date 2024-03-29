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
            pagamento: [
                {nome: 'Boleto', id: 1},
                {nome: 'Carnê', id: 2},
            ],
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
        newPrimeiraParcela: 0,
        changed(e) {
            if (e.target.id === 'data_assinatura' && Object.prototype.toString.call(new Date(e.target.value)) === '[object Date]') {
                this.newDtAssinatura = new Date(e.target.value);
                this.setValidadeContrato();
            }
            if (e.target.id === 'primeira_parcela' && Object.prototype.toString.call(new Date(e.target.value)) === '[object Date]') {
                this.newPrimeiraParcela = new Date(e.target.value);
                this.setUltimaParcela();
            }
        },
        setValor(e) {
            if (e.target.value !== 'undefined' && e.target.value !== '0,00') {
                this.newValor = parseFloat(e.target.value.replace(/[^\d,]+/g, '').replace(',', '.'));
                this.setValorParcela();
            }
        },
        setQtdMeses(e) {
            if (e.target.value !== 'undefined' && e.target.value > 0) {
                this.newQtdMeses = parseInt(e.target.value);
                this.setValidadeContrato();
            }
        },
        setQtdParcelas(e) {
            if (e.target.value !== 'undefined' && e.target.value > 0) {
                this.newQtdParcelas = parseInt(e.target.value);
                this.setValorParcela();
                this.setUltimaParcela();
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
        setValidadeContrato() {
            if (Object.prototype.toString.call(this.newDtAssinatura) === '[object Date]' && this.newQtdMeses > 0) {
                let validadeContrato = moment(this.newDtAssinatura);
                validadeContrato.add(this.newQtdMeses, 'M');
                this.form.validade_contrato = moment(validadeContrato).format("YYYY-MM-DD HH:mm:ss");
            }
        },
        setUltimaParcela() {
            if (Object.prototype.toString.call(this.newPrimeiraParcela) === '[object Date]' && this.newQtdParcelas > 0) {
                let ultimaParcela = moment(this.newPrimeiraParcela);
                ultimaParcela.add(this.newQtdParcelas, 'M');
                this.form.ultima_parcela = moment(ultimaParcela).format("YYYY-MM-DD HH:mm:ss");
            }
        }
    },

});
