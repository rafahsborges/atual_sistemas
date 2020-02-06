<!DOCTYPE html>
<html>

<head>
    <title>{{trans('admin.relatorio.actions.index')}}</title>
</head>

<body>

<h2>CONTAS A RECEBER</h2>

<p>
    <b>
        Período de {{ date('d/m/Y', strtotime($inicio)) }} até {{ date('d/m/Y', strtotime($fim)) }}
    </b>
</p>

@foreach($data as $dt)
    <div>
        <span>
            {{$dt->contrato->cliente->nome}}
        </span>
        <span style="float: right">
            {{$dt->contrato->cliente->telefone}} / {{$dt->contrato->cliente->celular}}
        </span>
    </div>
    <br>
    <div>
        <span style="float: right;margin-right: 5%;">
            <b>Valor</b>
        </span>
        <span style="float: right;margin-right: 5%;">
            <b>Vencimento</b>
        </span>
        <span style="float: right;margin-right: 5%;">
            <b>Parcela</b>
        </span>
    </div>
    <br>
    <br>
    <div>
        <span style="float: right;margin-right: 5%;">
            {{$dt->valor}}
        </span>
        <span style="float: right;margin-right: 5%;">
            {{ date('d/m/Y', strtotime($dt->vencimento)) }}
        </span>
        <span style="float: right;margin-right: 5%;">
            {{$dt->numero_parcela}}
        </span>
    </div>
    <br>
    <br>
    <div>
        <span style="float: right;margin-right: 5%;">
            <b>{{$dt->valor}}</b>
        </span>
        <span style="float: right;margin-right: 5%;">
            <b>Total:</b>
        </span>
    </div>
    <br>
    <hr>
@endforeach

</body>

</html>
