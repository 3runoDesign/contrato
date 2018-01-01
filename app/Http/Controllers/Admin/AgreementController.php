<?php

namespace CONTR\Http\Controllers\Admin;

use Carbon\Carbon;
use CONTR\Forms\AgreementForm;
use CONTR\Models\Agreement;
use Illuminate\Http\Request;
use CONTR\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class AgreementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agreements = Agreement::paginate();

        return view('admin.agreements.index', compact('agreements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(AgreementForm::class, [
            'url' => route('admin.agreement.store'),
            'method' => 'POST'
        ]);

        return view('admin.agreements.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \CONTR\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
//        return \Carbon\Carbon::now()->formatLocalized('%d de %B de %Y');
        return view('admin.agreements.invoice', compact('agreement'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \CONTR\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function pdf(Agreement $agreement)
    {
        // 'admin.agreements.invoice'
        $pdf = PDF::loadView('admin.agreements.invoice', compact('agreement'));

        return $pdf
                ->setOption('margin-top', 51)
                ->setOption('margin-left', 20)
                ->setOption('margin-right', 20)
                ->setOption('margin-bottom', 30)
                ->setOption('footer-spacing', 10)
                ->setOption('header-spacing', 10)
                ->setOption('header-html', view('admin.agreements.pdf.header', compact('agreement'))->render())
                ->setOption('footer-html', view('admin.agreements.pdf.footer', compact('agreement'))->render())
            ->inline(str_slug($agreement->title, '-') . '_' . $agreement->enrolment . '.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CONTR\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function edit(Agreement $agreement)
    {
        $form = \FormBuilder::create(AgreementForm::class, [
            'url' => route('admin.agreement.update',['customer' => $agreement->id]),
            'method' => 'PUT',
            'model' => $agreement
        ]);

        return view('admin.agreements.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CONTR\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CONTR\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agreement $agreement)
    {
        //
    }
}
