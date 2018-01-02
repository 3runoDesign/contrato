<?php

namespace CONTR\Http\Controllers\Admin;

use CONTR\Forms\CustomerForm;
use CONTR\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use CONTR\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate();

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(CustomerForm::class, [
            'url' => route('admin.customer.store'),
            'method' => 'POST'
        ]);

        return view('admin.customers.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(CustomerForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $result = Customer::createFully($data);
        $request->session()->flash('message',"Usuário {$result['customer']->name} criado com sucesso.)");
//        $request->session()->flash('customer_created',[
//            'id' => $result['customer']->id,
//            'password' => $result['password']
//        ]);
        return redirect()->route('admin.agreement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \CONTR\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CONTR\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $form = \FormBuilder::create(CustomerForm::class, [
            'url' => route('admin.customer.update',['customer' => $customer->id]),
            'method' => 'PUT',
            'model' => $customer
        ]);

        return view('admin.customers.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CONTR\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CONTR\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
