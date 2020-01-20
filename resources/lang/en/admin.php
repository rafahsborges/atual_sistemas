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
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
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
            'descricao' => 'Descricao',
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
            'sexo' => 'Sexo',
            'profissao' => 'Profissao',
            'local_trabalho' => 'Local trabalho',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
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

    // Do not delete me :) I'm used for auto-generation
];
