@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Dados do contrato</h3>

            @php
                $linkEdit = route('admin.customer.edit', ['customer' => $customer->id]);
                $linkDelete = route('admin.customer.destroy', ['customer' => $customer->id]);

                $formDelete = FormBuilder::plain([
                    'id' => 'form-delete',
                    'url' => $linkDelete,
                    'method' => 'DELETE',
                    'style' => 'display:none'
                ])
            @endphp

            {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
            {!!
            Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"
                ])
            !!}
            {!! form($formDelete) !!}
        </div>

        <div class="row">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$customer->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$customer->name}}</td>
                </tr>
                <tr>
                    <th scope="row">CPF</th>
                    <td>{{$customer->cpf}}</td>
                </tr>
                <tr>
                    <th scope="row">RG</th>
                    <td>{{$customer->rg}}</td>
                </tr>
                <tr>
                    <th scope="row">Gênero</th>
                    <td>{{ $customer->get_gender_formatted() }}</td>
                </tr>
                    <th scope="row">Telefone/Celular</th>
                    <td>{{ $customer->phone }}</td>
                </tr>
                <tr>
                    <th scope="row">e-Mail</th>
                    <td>{{$customer->email}}</td>
                </tr>
                <tr>
                    <th scope="row">CEP</th>
                    <td>{{$customer->cep}}</td>
                </tr>
                <tr>
                    <th scope="row">Lougradouro</th>
                    <td>{{$customer->address}}</td>
                </tr>
                <tr>
                    <th scope="row">Número</th>
                    <td>{{$customer->building_number}}</td>
                </tr>
                <tr>
                    <th scope="row">Complemento</th>
                    <td>{{$customer->complement}}</td>
                </tr>
                <tr>
                    <th scope="row">Bairro</th>
                    <td>{{$customer->district}}</td>
                </tr>
                <tr>
                    <th scope="row">Cidade</th>
                    <td>{{ $customer->city . '-' . $customer->uf }}</td>
                </tr>
                <tr>
                    <th scope="row">Aniversário</th>
                    <td>{{$customer->birthday->format('d/m/Y')}}</td>
                </tr>
                <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$customer->description}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

