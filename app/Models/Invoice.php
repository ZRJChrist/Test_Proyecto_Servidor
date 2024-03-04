<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentCreated;
use Illuminate\Support\Facades\Storage;

class Invoice extends Model
{
    protected $guarded = [];
    protected $payment;
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }
    public function createPDF()
    {
        $dataPDF = [];
        $dataPDF['customer'] = Customer::find($this->payment->customer_id);
        $dataPDF['payment'] = $this->payment;
        $dataPDF['amountLocal'] = self::calculateEuroAmount($this->payment->amount, $this->payment->currency);
        $pdf = PDF::loadView('pdf.payment', ['invoice' => $dataPDF]);

        $nameFolder = 'customer_' . $this->payment->customer_id;
        $customerFolder = 'public/' . $nameFolder;
        if (!Storage::exists($customerFolder)) {
            Storage::makeDirectory($customerFolder, 0777, true);
        }
        $pdfFileName = 'payment_' . $this->payment->id . '.pdf';

        $path_storeage = storage_path('app/' . $customerFolder);

        $pdf->save($path_storeage . '/' . $pdfFileName);

        return $nameFolder . '/' . $pdfFileName;
    }
    public function calculateEuroAmount($amount, $amountLocal)
    {
        $response = Http::get("https://api.currencyfreaks.com/v2.0/rates/latest", [
            'apikey' => '25ae1c8260234f119d7607f1e860b298',
            'symbols' => "EUR,{$amountLocal}",
        ]);

        if ($response->successful()) {
            $exchangeRates = $response->json()['rates'];

            $exchangeRateToEUR = $exchangeRates['EUR'];
            $exchangeRateToLocal = $exchangeRates[$amountLocal];

            $amountInUSD = $amount / $exchangeRateToEUR;
            $amountInLocal = $amountInUSD * $exchangeRateToLocal;
            return $amountInLocal;
        } else {
            return $amount;
        }
    }
    public function sendEmail($pdfFileName, string $subject = 'Fee Invoice', string $message_email = 'A new quota has been created. Attached is the detail.')
    {
        $customer = Customer::findOrFail($this->payment->customer_id);
        $toEmail = $customer->email;
        Mail::to($toEmail)
            ->send(new PaymentCreated($subject, $message_email, $pdfFileName));
    }
}
