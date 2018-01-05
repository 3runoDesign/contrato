@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Novo contrato</h3>
        </div>

        <div class="row">

            {!! Form::open([
                    'url' => route('admin.agreement.store'),
                    'id' => 'add_name',
                    'name' => 'add_name'
                ])
            !!}

                <div class="hide">
                    {!! Form::text('enrolment', '00000',  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-9">
                    {!! Form::label('customer_id', 'Buscar Cliente', ['class' => 'control-label']) !!}
                    {!! Form::number('customer_id', '',  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-3">
                    {!! Form::label('date_agreement', 'Data do contrato', ['class' => 'control-label']) !!}
                    {!! Form::date('date_agreement', \Carbon\Carbon::now()->format('Y-m-d'),  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
                    {!! Form::text('title', '',  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-3">
                    {!! Form::label('total_hours', 'Total de horas', ['class' => 'control-label']) !!}
                    {!! Form::number('total_hours', '',  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-3">
                    {!! Form::label('price', 'Valor', ['class' => 'control-label']) !!}
                    {!! Form::number('price', '',  ['class' => 'form-control']) !!}
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
                    {!! Form::text('description_services[]', '',  [
                            'class' => 'form-control',
                            'placeholder' => 'Descrição do serviço'
                        ])
                    !!}
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
                    {!! Form::text('event_schedule[]', '',  [
                            'class' => 'form-control',
                            'placeholder' => 'Descrição da data'
                        ])
                    !!}
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
                    {!! Form::text('payment_terms[]', '',  [
                            'class' => 'form-control',
                            'placeholder' => 'Descrição da negociação'
                        ])
                    !!}
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



            $('*[data-dynamic-layout]').each(function (key, item) {
                var layout = $(item).data('dynamic-layout');
                controllerCount[layout] = 0;
            });


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

