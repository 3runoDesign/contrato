@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3 class="pull-left">Editar contrato</h3>

            <div class="pull-right">
                @php
                    $linkPrintScreen = route('admin.agreement.show', ['agreement ' => $agreement->id]);
                    $linkPrintPDF = route('admin.agreement.pdf', ['agreement ' => $agreement->id]);
                @endphp

                {!!
                    ButtonGroup::links([
                        Button::primary(Icon::eyeOpen() . ' Em tela')->asLinkTo($linkPrintScreen)->withAttributes(['target' => '_blank']),
                        Button::primary(Icon::eyeOpen() . ' PDF')->asLinkTo($linkPrintPDF)->withAttributes(['target' => '_blank'])
                    ])
                !!}
            </div>
            <br>
            <br><br>
            <br>
        </div>

        <div class="row">
            {!! Form::open([
                    'url' => route('admin.agreement.update',['customer' => $agreement->id]),
                    'id' => 'add_name',
                    'name' => 'add_name',
                    'method' => 'PUT'
                ])
            !!}

            <div class="form-group col-md-9">
                {!! Form::label('customer_id', 'Buscar Cliente', ['class' => 'control-label']) !!}
                {!! Form::number('customer_id', $agreement->customer_id,  ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('date_agreement', 'Data do contrato', ['class' => 'control-label']) !!}
                {!! Form::date('date_agreement', $agreement->date_agreement->format('Y-m-d'),  ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
                {!! Form::text('title', $agreement->title,  ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('total_hours', 'Total de horas', ['class' => 'control-label']) !!}
                {!! Form::number('total_hours', $agreement->total_hours,  ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('price', 'Valor', ['class' => 'control-label']) !!}
                {!! Form::number('price', $agreement->price,  ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-12" id="dynamic_field">

                {!! Form::label('services', 'Serviços', ['class' => 'control-label']) !!}
                {!!
                    Button::success('Mais serviços')
                            ->withAttributes([
                                'class' => 'pull-right btn-add',
                                'id' => 'add-service',
                                'data-dynamic-layout' => 'service'
                            ])
                 !!}
                <hr>
                @foreach(explode(';', $agreement->description_services) as $key => $item)
                    <div class="input-group" id="input-group-service_{{ $key+1 }}">
                        <input name="description_services[]" type="text" value="{{ $item }}" class="form-control">
                        <span class="input-group-btn">
                            {!!  Button::danger('x')->withAttributes(['class' => 'btn-remove']) !!}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="form-group col-md-12" id="dynamic_field">
                {!! Form::label('event_schedule', 'Agenda', ['class' => 'control-label']) !!}
                {!!
                    Button::success('Mais datas')
                            ->withAttributes([
                                'class' => 'pull-right btn-add',
                                'id' => 'add-schedule',
                                'data-dynamic-layout' => 'schedule'
                            ])
                 !!}
                <hr>
                @foreach(explode(';', $agreement->event_schedule) as $key => $item)
                    <div class="input-group" id="input-group-schedule_{{ $key+1 }}">
                        <input name="event_schedule[]" type="text" value="{{ $item }}" class="form-control">
                        <span class="input-group-btn">
                            {!!  Button::danger('x')->withAttributes(['class' => 'btn-remove']) !!}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="form-group col-md-12" id="dynamic_field">
                {!! Form::label('payment_terms', 'Negociação', ['class' => 'control-label']) !!}
                {!!
                    Button::success('Mais negociação')
                            ->withAttributes([
                                'class' => 'pull-right btn-add',
                                'id' => 'add-payment-terms',
                                'data-dynamic-layout' => 'payment_terms'
                            ])
                 !!}
                <hr>
                @foreach(explode(';', $agreement->payment_terms) as $key => $item)
                    <div class="input-group" id="input-group-payment_terms_{{ $key+1 }}">
                        <input name="payment_terms[]" type="text" value="{{ $item }}" class="form-control">
                        <span class="input-group-btn">
                            {!!  Button::danger('x')->withAttributes(['class' => 'btn-remove']) !!}
                        </span>
                    </div>
                @endforeach

            </div>

            {!! Form::submit('Click Me!') !!}


            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        (function ($) {
            var controllerCount = {};

            var appendLayout= function(layout, key) {
                switch (layout){
                    case 'service':
                        return "<div class=\"input-group\" id=input-group-" + layout + "_" + key + ">\n" +
                            "      <input placeholder=\"Descrição do serviço\" name=\"description_services[]\" type=\"text\" value=\"\" class=\"form-control\">\n" +
                            "      <span class=\"input-group-btn\">\n" +
                            "        {!!  Button::danger('x')->withAttributes(['class' => 'btn-remove']) !!}\n" +
                            "      </span>\n" +
                            "    </div>";
                    case 'schedule':
                        return "<div class=\"input-group\" id=input-group-" + layout + "_" + key + ">\n" +
                            "      <input placeholder=\"Descrição da data\" name=\"event_schedule[]\" type=\"text\" value=\"\" class=\"form-control\">\n" +
                            "      <span class=\"input-group-btn\">\n" +
                            "        {!!  Button::danger('x')->withAttributes(['class' => 'btn-remove']) !!}\n" +
                            "      </span>\n" +
                            "    </div>";
                    case 'payment_terms':
                        return "<div class=\"input-group\" id=input-group-" + layout + "_" + key + ">\n" +
                            "      <input placeholder=\"Descrição da negociação\" name=\"payment_terms[]\" type=\"text\" value=\"\" class=\"form-control\">\n" +
                            "      <span class=\"input-group-btn\">\n" +
                            "        {!!  Button::danger('x')->withAttributes(['class' => 'btn-remove']) !!}\n" +
                            "      </span>\n" +
                            "    </div>";
                }
            };

            controllerCount['service'] = {{ count(explode(';', $agreement->description_services)) }};
            controllerCount['schedule'] = {{ count(explode(';', $agreement->event_schedule)) }};
            controllerCount['payment_terms'] = {{ count(explode(';', $agreement->payment_terms)) }};


            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                var currentLayout = $(this).data('dynamic-layout');

                controllerCount[currentLayout] = controllerCount[currentLayout] + 1;
                $(this).parent('#dynamic_field').append(appendLayout(currentLayout, controllerCount[currentLayout]));
            });


            $(document).on('click', '.btn-remove', function() {
                $($(this).parent('.input-group-btn').parent('.input-group')).remove();
            });

        })(jQuery);
    </script>
@endpush