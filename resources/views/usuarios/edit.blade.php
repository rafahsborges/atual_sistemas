@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Alterar Usuário',
    'activePage' => 'user',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Alteração de Usuário') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('usuario.index') }}"
                                   class="btn btn-primary btn-round">{{ __('Voltar para Listagem') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('usuario.update', $usuario) }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Usuário') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nome">{{ __('Nome') }}</label>
                                    <input type="text" name="nome" id="input-nome"
                                           class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Nome') }}" value="{{ old('nome', $usuario->nome) }}"
                                           required autofocus>

                                    @include('alerts.feedback', ['field' => 'nome'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('E-mail') }}</label>
                                    <input type="email" name="email" id="input-email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('E-mail') }}" value="{{ old('email', $usuario->email) }}"
                                           required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Password') }}" value="">

                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation"
                                           class="form-control" placeholder="{{ __('Confirm Password') }}" value="">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
