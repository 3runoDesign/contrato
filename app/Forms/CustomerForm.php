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
            return ($value && $value instanceof Carbon) ? $value->format('Y-m-d') : Carbon::now()->format('Y-m-d');
        };

        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255',
                'wrapper' => ['class' => 'form-group col-md-9']
            ])
            ->add('gender', 'choice', [
                'choices' => [
                    1 => "Homem",
                    0 => "Mulher",
                ],
                'label' => 'Gênero',
                'wrapper' => ['class' => 'form-group col-md-3']
            ])
            ->add('cpf', 'text', [
                'label' => 'CPF',
                'rules' => 'required|cpf',
                'wrapper' => ['class' => 'form-group col-md-6']
            ])
            ->add('rg', 'text', [
                'label' => 'RG',
                'rules' => 'required|max:255',
                'wrapper' => ['class' => 'form-group col-md-6']
            ])
            ->add('birthday', 'date', [
                'label' => 'Aniversário',
                'rules' => 'required|date',
                'value' => $formatDate,
                'wrapper' => ['class' => 'form-group col-md-4']
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'rules' => 'required|email',
                'wrapper' => ['class' => 'form-group col-md-4']
            ])
            ->add('phone', 'text', [
                'label' => 'Telefone (Whatsapp)',
                'wrapper' => ['class' => 'form-group col-md-4']
            ])

            // Endereço
            ->add('cep', 'text', [
                'label' => 'CEP',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-4']
            ])
            ->add('address', 'text', [
                'label' => 'Lougradouro',
                'rules' => '',
                'wrapper' => ['class' => 'form-group col-md-8']
            ])
            ->add('building_number', 'text', [
                'label' => 'Número',
                'rules' => '',
                'wrapper' => ['class' => 'form-group col-md-1']
            ])
            ->add('district', 'text', [
                'label' => 'Bairro',
                'wrapper' => ['class' => 'form-group col-md-2']
            ])
            ->add('complement', 'text', [
                'label' => 'Complemento',
                'wrapper' => ['class' => 'form-group col-md-5']
            ])
            ->add('city', 'text', [
                'label' => 'Cidade',
                'wrapper' => ['class' => 'form-group col-md-3']
            ])
            ->add('uf', 'text', [
                'label' => 'Estado',
                'wrapper' => ['class' => 'form-group col-md-1']
            ])

            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'wrapper' => ['class' => 'form-group col-md-12']
            ]);


    }
}
