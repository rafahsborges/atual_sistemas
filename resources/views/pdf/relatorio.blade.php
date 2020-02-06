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

</body>

</html>
