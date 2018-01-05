<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @php
            $navbar = Navbar::withBrand(config('app.name'), '#')->inverse();

            if (Auth::check()) {
                $arrayLinks = [ // ul
                    [ // li
                        'Clientes',
                        [ // ul
                            [ // li
                                'link' => route('admin.customer.index'),
                                'title' => 'Lista de clientes'
                            ],
                            [ // li
                                'link' => route('admin.customer.create'),
                                'title' => 'Novo cliente'
                            ]
                        ]
                    ],
                    [ // li
                        'Contrato',
                        [ // ul
                            [ // li
                                'link' => route('admin.agreement.index'),
                                'title' => 'Lista de contratos'
                            ],
                            [ // li
                                'link' => route('admin.agreement.create'),
                                'title' => 'Novo contrato'
                            ]
                        ]
                    ]
                ];

                $arrayLinksRight =
                [ // ul
                    [ // li
                        Auth::user()->name,
                        [ // ul
                            [ // li
                                'link' => route('logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-logout\").submit();",
                                ]
                            ]
                        ]
                    ]
                ];

                $navbar->withContent(Navigation::links($arrayLinks));
                $navbar->withContent(Navigation::links($arrayLinksRight)->right());

                $formLogout = FormBuilder::plain([
                    'id' => 'form-logout',
                    'url' => route('logout'),
                    'method' => 'POST',
                    'style' => 'display:none'
                ]);
            }


        @endphp

        {!! $navbar !!}

        @if(Auth::check())
            {!! form($formLogout) !!}
        @endif

        @if(Session::has('message'))
            <div class="container hidden-print">
                {!! Alert::success(Session::get('message'))->close() !!}
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="hidden-print">
        <div class="container">
            <p>
                <strong>ContratoFoto</strong> - Copyright {{ \Carbon\Carbon::now()->year }} - {{ config('contrato.contratado.business') }}
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}"></script>
    @stack('scripts')
</body>
</html>
