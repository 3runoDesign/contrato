<?php

namespace CONTR\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class AgreementForm extends Form
{
    public function buildForm()
    {
        $formatDate = function( $value ){
            return ($value && $value instanceof Carbon) ? $value->format('Y-m-d') : $value;
        };

        $this
            ->add('title', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255'
            ])
            ->add('enrolment', 'text', [
                'label' => 'Código',
                'rules' => 'required|max:255'
            ])
            ->add('date_agreement', 'date', [
                'label' => 'Data do contrato',
                'rules' => 'required|date',
                'value' => $formatDate
            ])
            ->add('date_event', 'date', [
                'label' => 'Data do evento',
                'rules' => 'required|date',
                'value' => $formatDate
            ]);
    }
}
