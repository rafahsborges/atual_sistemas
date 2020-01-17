<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            {{ __('FW') }}
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('Financeiro Web') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a href="{{ route('home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            {{--<li class="@if ($activePage == 'planos') active @endif">
                <a href="{{ route('planos') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Planos') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'clientes') active @endif">
                <a href="{{ route('clientes') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Clientes') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'contratos') active @endif">
                <a href="{{ route('contratos') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Contratos') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'baixas') active @endif">
                <a href="{{ route('baixas') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Baixas') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'remessas') active @endif">
                <a href="{{ route('remessas') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Remessas') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'contas-a-receber') active @endif">
                <a href="{{ route('contas-a-receber') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Contas a Receber') }}</p>
                </a>
            </li>--}}
            <li>
                <a data-toggle="collapse" href="#laravelExamples">
                    <i class="fab fa-laravel"></i>
                    <p>
                        {{ __("Laravel Examples") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="@if ($activePage == 'profile') active @endif">
                            <a href="{{ route('profile.edit') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p> {{ __("User Profile") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'usuarios') active @endif">
                            <a href="{{ route('usuario.index') }}">
                                <i class="now-ui-icons design_bullet-list-67"></i>
                                <p> {{ __("User Management") }} </p>
                            </a>
                        </li>
                    </ul>
                </div>
            <li class="@if ($activePage == 'icons') active @endif">
                <a href="{{ route('page.index','icons') }}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'maps') active @endif">
                <a href="{{ route('page.index','maps') }}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class=" @if ($activePage == 'notifications') active @endif">
                <a href="{{ route('page.index','notifications') }}">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class=" @if ($activePage == 'table') active @endif">
                <a href="{{ route('page.index','table') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'typography') active @endif">
                <a href="{{ route('page.index','typography') }}">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'upgrade') active @endif active-pro">
                <a href="{{ route('page.index','upgrade') }}">
                    <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
