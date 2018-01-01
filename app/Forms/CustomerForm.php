<?php

namespace CONTR\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {
//        $id = $this->getData('id');

        $formatDate = function( $value ){
            return ($value && $value instanceof Carbon) ? $value->format('Y-m-d') : $value;
        };

        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255'
            ])
            ->add('cpf', 'text', [
                'label' => 'CPF',
                'rules' => 'required|cpf'
            ])
            ->add('rg', 'text', [
                'label' => 'RG',
                'rules' => 'required|max:255'
            ])
            ->add('gender', 'choice', [
                'choices' => [
                    1 => "Homem",
                    0 => "Mulher",
                ],
                'label' => 'Gênero',
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'rules' => 'required|email'
            ])
            ->add('phone', 'text', [
                'label' => 'Telefone (Whatsapp)',
            ])

            ->add('cep', 'text', [
                'label' => 'CEP',
                'rules' => 'required'
            ])
            ->add('address', 'text', [
                'label' => 'Lougradouro',
                'rules' => ''
            ])
            ->add('building_number', 'text', [
                'label' => 'Número',
                'rules' => ''
            ])
            ->add('complement', 'text', [
                'label' => 'Complemento',
            ])
            ->add('district', 'text', [
                'label' => 'Bairro',
            ])
            ->add('city', 'text', [
                'label' => 'Cidade',
            ])
            ->add('uf', 'text', [
                'label' => 'Estado',
            ])

            ->add('birthday', 'date', [
                'label' => 'Aniversário',
                'rules' => 'required|date',
                'value' => $formatDate
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
            ]);
    }
}
