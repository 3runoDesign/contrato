@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h3>Listagem de clientes</h3>
        </div>

        <div class="row">
            {!!
                Table::withContents($customers->items())
                       ->striped()
                       ->callback('Ações', function($field, $model){
                            $linkEdit = route('admin.customer.edit', ['customer ' => $model->id]);
                            $linkShow = route('admin.customer.show', ['customer ' => $model->id]);

                            return
                            ButtonGroup::withContents([
                                Button::primary(Icon::pencil() . ' Editar')->asLinkTo($linkEdit),
                                Button::primary(Icon::eyeOpen() . ' Ver')->asLinkTo($linkShow)
                            ]);
                       })
            !!}

            {{ $customers->links() }}
        </div>
    </div>
@endsection

