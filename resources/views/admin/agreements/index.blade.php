@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Listagem de contratos</h3>

            {!! Button::primary('Novo contrato')->asLinkTo(route('admin.agreement.create')) !!}
        </div>

        <div class="row">
            {!!
                Table::withContents($agreements->items())
                       ->striped()
                       ->callback('Ações', function($field, $model){
                            $linkEdit = route('admin.agreement.edit', ['agreement ' => $model->id]);
                            $linkShow = route('admin.agreement.show', ['agreement ' => $model->id]);

                            return
                            ButtonGroup::links([
                                Button::primary(Icon::pencil() . ' Editar')->asLinkTo($linkEdit),
                                Button::primary(Icon::eyeOpen() . ' Ver')->asLinkTo($linkShow)
                            ]);
                       })
            !!}

            {{ $agreements->links() }}
        </div>
    </div>
@endsection

