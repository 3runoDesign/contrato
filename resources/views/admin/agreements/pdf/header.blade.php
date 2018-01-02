<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
</head>
<body>

<header class="header-main">
    <div class="container">
        <div class="row">
            <div class="info-business pull-left">
                <img src="{{ config('contrato.contratado.logo') }}" width="150" class="logo"/>
                <p>
                    {{ config('contrato.contratado.business') }}
                    <br/>
                    {{ config('contrato.contratado.email_business') }}
                </p>
            </div>
            <div class="pull-right">
                <h1 class="agreement-id">
                    #{{ $agreement->enrolment }}
                    <span>Número do contrato</span>
                </h1>

                <p style="text-align: right">
                     {!! $agreement->date_agreement->formatLocalized('%d de <span>' . trans('dates.' . strtolower($agreement->date_agreement->formatLocalized('%B'))) . '</span> de %Y') !!}
                </p>
            </div>
        </div>
    </div>
</header>

</body>
</html>