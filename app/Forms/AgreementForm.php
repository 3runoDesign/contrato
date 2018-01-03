<?php

namespace CONTR\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class AgreementForm extends Form
{
    public function buildForm()
    {
        $formatDate = function( $value ){
            return ($value && $value instanceof Carbon) ? $value->format('Y-m-d') : Carbon::now()->format('Y-m-d');
        };

        $descriptionServices = function( $value ) {
            return (!is_null($value)) ? $value : '6 horas de cobertura com um fotógrafo; 2 horas de making of da noiva; 2 horas de making of da noivo; Sessão de pré-casamento; Pendrive com fotos em alta e editadas; Galeria online por 6 meses;';
        };

        $this
            ->add('customer_id', 'number', [
                'label' => 'Buscar Cliente',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-9']
            ])
            ->add('date_agreement', 'date', [
                'label' => 'Data do contrato',
                'rules' => 'required|date',
                'value' => $formatDate,
                'wrapper' => ['class' => 'form-group col-md-3']
            ])
            ->add('title', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255',
                'wrapper' => ['class' => 'form-group col-md-6']
            ])
            ->add('total_hours', 'number', [
                'label' => 'Total de horas',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-3']
            ])
            ->add('price', 'number', [
                'label' => 'Valor',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-3']
            ])
            ->add('description_services[]', 'text', [
                'label' => 'Descrição do(s) serviço(s)',
                'rules' => 'required',
//                'value' => $descriptionServices,
                'wrapper' => ['class' => 'form-group col-md-12 after-add-more']
            ]);
//            ->add('description_services', 'textarea', [
//                'label' => 'Descrição do(s) serviço(s)',
//                'rules' => 'required',
//                'value' => $descriptionServices,
//                'wrapper' => ['class' => 'form-group col-md-4']
//            ])
//            ->add('event_schedule', 'textarea', [
//                'label' => 'Descrição da(s) datas',
//                'rules' => 'required',
//                'wrapper' => ['class' => 'form-group col-md-4']
//            ])
//            ->add('payment_terms', 'textarea', [
//                'label' => 'Condições de pagamento',
//                'rules' => 'required',
//                'wrapper' => ['class' => 'form-group col-md-4']
//            ]);
    }
}
