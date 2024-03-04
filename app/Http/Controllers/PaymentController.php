<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentCreateRequest;
use App\Models\Customer;
use App\Models\Payment;
use App\Providers\RouteServiceProvider;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payments.index')->with([
            'payments' => Payment::getPaymentsIndex(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.create')->with([
            'customers' => Customer::select('id', 'name')->where('active', '=', 1)->get(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentCreateRequest $request)
    {
        $payment = new Payment();
        $payment->customer_id = $request->customer_id;
        $payment->concept = $request->concept;
        $payment->amount = floatval($request->amount);
        $payment->paid = false;
        $payment->currency = DB::table('countries as c')->join('customers as  ct', 'c.id', 'ct.country_id')->where('ct.id', $payment->customer_id)->select('currency')->get()->first()->currency;
        $payment->save();
        $invoice = new Invoice($payment);
        $namepdf = $invoice->createPDF();
        $invoice->sendEmail($namepdf);
        return redirect(RouteServiceProvider::PAYMENTS);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $customerFolder = 'public/customer_' . $payment->customer_id;
        $pdfFileName = 'payment_' . $payment->id . '.pdf';
        $filePath = storage_path('app/' . $customerFolder . '/' . $pdfFileName);
        if (file_exists($filePath)) {
            return Response::download($filePath, 'payment.pdf');
        } else {
            abort(404, 'File not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit')->with([
            'customers' => Customer::select('id', 'name')->where('active', '=', 1)->get(),
            'payment' => $payment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);
        $refererParts = explode('/', $request->header('referer'));
        $lastPart = end($refererParts);
        $message = "Your quota with id: {$payment->id} has been updated. I attach the detail.";
        if ($lastPart == 'edit') {
            $payment->amount = $request->amount;
            $payment->concept = $request->concept;
            $payment->notes = $request->notes;
        }
        $payment->paid = $request->paid;
        if ($request->paid == 1) {
            $message = "Your quota with id: {$payment->id} has been paid. I attach the detail.";
            $payment->payment_date = new DateTime();
        }
        $payment->save();

        $invoice = new Invoice($payment);
        $namepdf = $invoice->createPDF();
        $invoice->sendEmail($namepdf, 'Fee Invoice', $message);
        return redirect(RouteServiceProvider::PAYMENTS);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect(RouteServiceProvider::PAYMENTS);
    }
}
