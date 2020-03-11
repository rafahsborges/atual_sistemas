<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'is_admin' => 'Is admin',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',
        ],
    ],

    'plano' => [
        'title' => 'Planos',

        'actions' => [
            'index' => 'Planos',
            'create' => 'New Plano',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'enabled' => 'Enabled',
        ],
    ],

    'parentesco' => [
        'title' => 'Parentescos',

        'actions' => [
            'index' => 'Parentescos',
            'create' => 'New Parentesco',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'enabled' => 'Enabled',
        ],
    ],

    'estado-civil' => [
        'title' => 'Estado Civils',

        'actions' => [
            'index' => 'Estado Civils',
            'create' => 'New Estado Civil',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'enabled' => 'Enabled',
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'nome' => 'Nome',
            'nascimento' => 'Nascimento',
            'rg' => 'Rg',
            'cpf' => 'Cpf',
            'insc_municipal' => 'Insc municipal',
            'cnpj' => 'Cnpj',
            'id_sexo' => 'Id sexo',
            'profissao' => 'Profissao',
            'local_trabalho' => 'Local trabalho',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'id_cidade' => 'Id cidade',
            'id_uf' => 'Id uf',
            'email' => 'Email',
            'observacao' => 'Observacao',
            'cep' => 'Cep',
            'celular2' => 'Celular2',
            'celular3' => 'Celular3',
            'id_cliente_responsavel' => 'Id cliente responsavel',
            'id_estado_civil' => 'Id estado civil',
            'enabled' => 'Enabled',
        ],
    ],

    'dependente' => [
        'title' => 'Dependentes',

        'actions' => [
            'index' => 'Dependentes',
            'create' => 'New Dependente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'nascimento' => 'Nascimento',
            'id_cliente' => 'Id cliente',
            'id_parentesco' => 'Id parentesco',
            'enabled' => 'Enabled',
        ],
    ],

    'conta' => [
        'title' => 'Contas',

        'actions' => [
            'index' => 'Contas',
            'create' => 'New Conta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'banco' => 'Banco',
            'agencia' => 'Agencia',
            'digito_agencia' => 'Digito agencia',
            'conta' => 'Conta',
            'digito_conta' => 'Digito conta',
            'codigo_empresa' => 'Codigo empresa',
            'carteira' => 'Carteira',
            'tipo' => 'Tipo',
            'mensagem_1' => 'Mensagem 1',
            'mensagem_2' => 'Mensagem 2',
            'cpf_cnpj' => 'Cpf cnpj',
            'enabled' => 'Enabled',
        ],
    ],

    'contrato' => [
        'title' => 'Contratos',

        'actions' => [
            'index' => 'Contratos',
            'create' => 'New Contrato',
            'edit' => 'Edit :name',
            'boletos' => 'Boletos',
            'titulos' => 'Títulos',
            'carnes' => 'Carnês',
            'carteira' => 'Carteira',
        ],

        'columns' => [
            'id' => 'ID',
            'primeira_parcela' => 'Primeira parcela',
            'ultima_parcela' => 'Ultima parcela',
            'data_assinatura' => 'Data assinatura',
            'qtd_parcelas' => 'Qtd parcelas',
            'qtd_meses' => 'Qtd Meses',
            'tipo_pagamento' => 'Tipo pagamento',
            'valor' => 'Valor',
            'valor_parcela' => 'Valor Parcela',
            'plano_funeral' => 'Plano funeral',
            'desconto' => 'Desconto',
            'juros' => 'Juros',
            'multa' => 'Multa',
            'validade_contrato' => 'Validade contrato',
            'id_cliente' => 'Id cliente',
            'id_plano' => 'Id plano',
            'id_conta' => 'Id conta',
            'enabled' => 'Enabled',
        ],
    ],

    'parcela' => [
        'title' => 'Parcelas',

        'actions' => [
            'index' => 'Parcelas',
            'create' => 'New Parcela',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'vencimento' => 'Vencimento',
            'pagamento' => 'Pagamento',
            'id_boleto' => 'Id boleto',
            'id_carne' => 'Id carne',
            'valor' => 'Valor',
            'numero_parcela' => 'Numero parcela',
            'valor_pagamento' => 'Valor pagamento',
            'id_contrato' => 'Id contrato',
            'enabled' => 'Enabled',
        ],
    ],

    'boleto' => [
        'title' => 'Boletos',

        'actions' => [
            'index' => 'Boletos',
            'create' => 'New Boleto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'status' => 'Status',
            'id_parcela' => 'Id contrato parcela',
        ],
    ],

    'remessa' => [
        'title' => 'Remessas',

        'actions' => [
            'index' => 'Remessas',
            'create' => 'New Remessa',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'data' => 'Data',
            'id_usuario' => 'Id usuario',
            'nome' => 'Nome',
            'sequencia' => 'Sequencia',
            'id_conta' => 'Id conta',
        ],
    ],

    'remessa-boleto' => [
        'title' => 'Remessa Boletos',

        'actions' => [
            'index' => 'Remessa Boletos',
            'create' => 'New Remessa Boleto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_boleto' => 'Id boleto',
            'id_remessa' => 'Id remessa',
        ],
    ],

    'sexo' => [
        'title' => 'Sexos',

        'actions' => [
            'index' => 'Sexos',
            'create' => 'New Sexo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviacao' => 'Abreviacao',
            'enabled' => 'Enabled',
        ],
    ],

    'uf' => [
        'title' => 'Ufs',

        'actions' => [
            'index' => 'Ufs',
            'create' => 'New Uf',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviacao' => 'Abreviacao',
            'enabled' => 'Enabled',
        ],
    ],

    'cidade' => [
        'title' => 'Cidades',

        'actions' => [
            'index' => 'Cidades',
            'create' => 'New Cidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'ibge_code' => 'Ibge code',
            'id_uf' => 'Id uf',
            'enabled' => 'Enabled',
        ],
    ],

    'relatorio' => [
        'title' => 'Relatorios',

        'actions' => [
            'index' => 'Relatorios',
            'export' => 'Export',
        ],

        'columns' => [
            'inicio' => 'Inicio',
            'fim' => 'Fim',
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
