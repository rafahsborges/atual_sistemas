<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{trans('admin.relatorio.actions.index')}}</title>
</head>

<body>

@foreach($carteiras as $carteira)

    <div style="position: relative">

        {{--<img src="{{ asset('images/carteira.png') }}" style="position: relative;width: 100%;">--}}
        <img src="images/carteira.png" style="position: relative; width: 100%;">

        <div id="id" style="position: absolute;top: 12%;left: 20%;font-size: 12px;">
            <b>{{str_pad($carteira['id'], 9, '0', STR_PAD_LEFT)}}</b>
        </div>

        <div id="nome" style="position: absolute;top: 17%;left: 7%;font-size: 14px;">
            <b>{{$carteira['nome']}}</b>
        </div>

        <div id="nascimento" style="position: absolute;top: 20%;left: 12%;font-size: 12px;">
            <b>{{ date('d/m/Y', strtotime($carteira['nascimento'])) }}</b>
        </div>

        <div id="validade" style="position: absolute;top: 20%;left: 35%;font-size: 12px;">
            <b>{{ date('d/m/Y', strtotime($carteira['validade'])) }}</b>
        </div>

        <div id="dependentes" style="position: absolute;top: 1%;right: 2%;font-size: 12px;">
            @foreach($carteira['dependentes'] as $dependente)
                <b>{{$dependente->nome}} </b><br>
            @endforeach
        </div>

        <div id="plano" style="position: absolute;top: 14%;right: 14%;font-size: 10px;">
            <b>{{$carteira['plano'] == 0 ? 'SEM ATENDIMENTO FUNERAL' : 'ATEND. FUNERAL: ANGELUS (17) 3632-2002' }}</b>
        </div>

    </div>

    <br>

@endforeach

</body>

</html>
