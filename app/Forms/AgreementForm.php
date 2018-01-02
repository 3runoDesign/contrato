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
            ->add('title', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255'
            ])
//            ->add('enrolment', 'text', [
//                'label' => 'Código',
//                'rules' => 'required|max:255'
//            ])
            ->add('total_hours', 'number', [
                'label' => 'Total de horas',
                'rules' => 'required'
            ])
            ->add('price', 'number', [
                'label' => 'Valor',
                'rules' => 'required'
            ])
            ->add('description_services', 'textarea', [
                'label' => 'Descrição do(s) serviço(s)',
                'rules' => 'required',
                'value' => $descriptionServices
            ])
            ->add('event_schedule', 'textarea', [
                'label' => 'Descrição da(s) datas',
                'rules' => 'required'
            ])
            ->add('payment_terms', 'textarea', [
                'label' => 'Condições de pagamento',
                'rules' => 'required'
            ])
            ->add('customer_id', 'number', [
                'label' => 'Código do cliente',
                'rules' => 'required'
            ])
            ->add('date_agreement', 'date', [
                'label' => 'Data do contrato',
                'rules' => 'required|date',
                'value' => $formatDate
            ]);
    }
}
