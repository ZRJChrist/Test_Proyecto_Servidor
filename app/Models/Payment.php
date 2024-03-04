<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    const ELEMENTS = 4;

    public static function getPaymentsIndex($numElements = self::ELEMENTS)
    {
        return DB::table('payments as t')
            ->join('customers as c', 'c.id', 't.customer_id')
            ->select('t.*', 'c.name', 'c.phone', 'c.email')
            ->orderBy('created_at', 'desc')
            ->paginate($numElements);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
