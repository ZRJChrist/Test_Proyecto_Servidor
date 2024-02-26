<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    private const ELEMENTS = 4;
    protected $table = 'customers';
    protected $fillable = [
        'cif',
        'name',
        'email',
        'phone',
        'account_number',
        'country_id',
        'active',
    ];

    private static function getAllInfCustomers()
    {
        return DB::table('customers as c')
            ->join('countries as con', 'c.country_id', '=', 'con.id')
            ->select('c.*', 'con.name as country_name');
    }
    public static function getTaskOfCustomer($customer_id)
    {
        return DB::table('tasks as t')
            ->where('t.customer_id', '=', $customer_id)
            ->join('statuses as s', 't.status_id', '=', 's.id')
            ->join('provinces as p', 't.province_id', '=', 'p.id')
            ->select('t.*', 's.status_description', 's.iso as status_iso', 'p.name as name_province')
            ->get();
    }
    public static function getCustomersIndex($numElements = self::ELEMENTS)
    {
        return self::getAllInfCustomers()->paginate($numElements);
    }
}
