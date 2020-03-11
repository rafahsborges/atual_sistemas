<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Carnê</title>
    <style>
        body {
            margin: 0;
        }

        .grid {
            width: 100%;
            position: relative;
            overflow: hidden;
            zoom: 1;
        }

        .grid:before,
        .grid:after {
            content: "";
        }

        .grid:after {
            clear: both;
        }

        .grid > div[class*="col"],
        .grid > div[class*="size"],
        .grid > div[class*="w"],
        .grid > div[class*="px"] {
            float: left;
            vertical-align: middle;
        }

        .col12 {
            width: 100%;
        }

        .col12-pad {
            width: 98%;
            padding: 1%;
        }

        .col11 {
            width: 91.66%;
        }

        .col11-pad {
            width: 89.66%;
            padding: 1%;
        }

        .col10 {
            width: 83.33%;
        }

        .col10-pad {
            width: 81.33%;
            padding: 1%;
        }

        .col9 {
            width: 75%;
        }

        .col9-pad {
            width: 73%;
            padding: 1%;
        }

        .col8 {
            width: 66.66%;
        }

        .col8-pad {
            width: 64.66%;
            padding: 1%;
        }

        .col7 {
            width: 58.33%;
        }

        .col7-pad {
            width: 56.33%;
            padding: 1%;
        }

        .col6 {
            width: 50%;
        }

        .col6-pad {
            width: 48%;
            padding: 1%;
        }

        .col5 {
            width: 41.66%;
        }

        .col5-pad {
            width: 39.66%;
            padding: 1%;
        }

        .col4 {
            width: 33.33%;
        }

        .col4-pad {
            width: 31.33%;
            padding: 1%;
        }

        .col3 {
            width: 25%;
        }

        .col3-pad {
            width: 23%;
            padding: 1%;
        }

        .col2 {
            width: 16.66%;
        }

        .col2-pad {
            width: 14.66%;
            padding: 1%;
        }

        .col1 {
            width: 8.333%;
        }

        .col1-pad {
            width: 6.333%;
            padding: 1%;
        }

        .bto {
            padding: 1%;
            background: #dedede;
            margin-bottom: 1%;
            border-bottom: 1px solid #ccc;
        }

        .bto a,
        .bto button {
            padding: 9px;
            border: 0;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
        }

        .bto .btn-impress {
            color: #fff;
            background: green;
        }

        .bto .btn {
            color: #555;
            background: transparent;
        }

        table td {
            padding: 5px 12px;
            margin: 0;
            border-top: 1px solid #333;
        }

        table, table tr {
            margin: 0;
            padding: 0;
        }

        .parcela {
            padding: 2% 0 2% 2%;
            border-top: 1px dashed #333;
            border-bottom: 1px dashed #333;
            font-size: .9em;
        }

        .destaca {
            padding-right: 3%;
            margin-right: 3%;
            border-right: 1px dashed #333;
        }

        .text-center {
            text-align: center;
        }

        .nome { /* Nome no carnê */
            padding-top: 2%;
            font-size: .7em;
        }


        @media print {
            .bto {
                display: none;
            }

            .quebra-pagina {
                page-break-after: always;
            }
        }


        /* ------------------------------------ */

        .capa {
            height: 190px;
            width: 96%;
            padding: 2%;
            border-top: 1px dashed #333;
            border-bottom: 1px dashed #333;
            font-size: 1.1em;
            margin-top: 7%;
        }

        .capa img {
            max-width: 100%;
            height: 180px;
        }

    </style>
</head>
<body>

@php

    $count = 1;
    $count_quebra_pg = 0;
    $ano_vence = $primeiro_ano;
    $mes_vence = $primeiro_mes - 1;

    while ($count <= $qtd) {

        if ($mes_vence == 12) {
            $ano_vence = $ano_vence + 1;
            $mes_vence = 1;
        } else {
            $mes_vence++;
        }

@endphp

<!-- PARCELA -->
<div class="parcela">
    <div class="grid">
        <div class="col4">
            <div class="destaca">
                <table width="100%">
                    <tr>
                        <td>
                            <small>Parcela</small>
                            <br>{{$count}} / {{$qtd}}
                        </td>
                        <td>
                            <small>Valor</small>
                            <br>{{$valor}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <small>Vencimento</small>
                            <br>{{$vence}}/{{$mes_vence}}/{{$ano_vence}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <small>Observações</small>
                            <br><br><br><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col8">
            <table width="100%">
                <tr>
                    <td colspan="2">
                        <small>Nome do cedente</small>
                        <br>{{$nome_empresa}}
                    </td>
                    <td>
                        <small>Parcela</small>
                        <br>{{$count}} / {{$qtd}}
                    </td>
                    <td>
                        <small>Valor</small>
                        <br>{{$valor}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <small>Data do Documento</small>
                        <br>{{$hoje}}
                    </td>
                    <td>
                        <small>Tipo de Documento</small>
                        <br>Carnê
                    </td>
                    <td colspan="2">
                        <small>Vencimento</small>
                        <br>{{$vence}}/{{$mes_vence}}/{{$ano_vence}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <small>Todas as informações deste carnê são de responsabilidade do cedente</small>
                        <br>{{$obs}}
                    </td>
                </tr>
            </table>
            <div class="nome">{{$nome}}, {{$cpf}}, {{$endereco}}</div>
        </div>
    </div>
</div>

@php
    $count_quebra_pg++; // contagem de loop
@endphp

@if($count_quebra_pg == 4)
    {{--Adiciona quebra a cada 4 loops e zera a variavel--}}
    <div class="quebra-pagina"></div>
    @php
        $count_quebra_pg = 0;
    @endphp
@endif

@php
    $count++;
}
@endphp

</body>
</html>
