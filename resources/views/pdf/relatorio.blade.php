<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{trans('admin.relatorio.actions.index')}}</title>

    <style>
        .tg {
            width: 100%;
            border: none;
        }

        .tg td {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 10px 5px;
            overflow: hidden;
            word-break: normal;
        }

        .tg th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            overflow: hidden;
            word-break: normal;
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }
    </style>

</head>

<body>

<h2>CONTAS A RECEBER</h2>

<p>
    <b>
        Período de {{ date('d/m/Y', strtotime($inicio)) }} até {{ date('d/m/Y', strtotime($fim)) }}
    </b>
</p>

@foreach($data as $dt)
    <table class="tg">
        <tr>
            <th class="tg-0lax" colspan="2" style="width: 50%">
                {{$dt->contrato->cliente->nome}}
            </th>
            <th class="tg-0lax" colspan="2" style="width: 50%; text-align: right">
                {{$dt->contrato->cliente->telefone}} / {{$dt->contrato->cliente->celular}}
            </th>
        </tr>
        <tr>
            <td class="tg-0lax" style="width: 50%"></td>
            <td class="tg-0lax" style="width: 16%"></td>
            <td class="tg-0lax" style="width: 16%"></td>
            <td class="tg-0lax" style="width: 16%"></td>
        </tr>
        <tr>
            <td class="tg-0lax" style="width: 50%"></td>
            <td class="tg-0lax" style="width: 16%">
                <b>Parcela</b>
            </td>
            <td class="tg-0lax" style="width: 16%">
                <b>Vencimento</b>
            </td>
            <td class="tg-0lax" style="width: 16%">
                <b>Valor</b>
            </td>
        </tr>
        <tr>
            <td class="tg-0lax" style="width: 50%"></td>
            <td class="tg-0lax" style="width: 16%">
                {{$dt->numero_parcela}}
            </td>
            <td class="tg-0lax" style="width: 16%">
                {{ date('d/m/Y', strtotime($dt->vencimento)) }}
            </td>
            <td class="tg-0lax" style="width: 16%">
                {{$dt->valor}}
            </td>
        </tr>
        <tr>
            <td class="tg-0lax" style="width: 50%"></td>
            <td class="tg-0lax" style="width: 16%"></td>
            <td class="tg-0lax" style="width: 16%">
                <b>Total:</b>
            </td>
            <td class="tg-0lax" style="width: 16%">
                <b>{{$dt->valor}}</b>
            </td>
        </tr>
    </table>
    <br>
    <hr>
@endforeach

</body>

</html>
