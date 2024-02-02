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

    private static function getAllInfCustomers($numElements)
    {
        return DB::table('customers as c')
            ->join('countries as con', 'c.country_id', '=', 'con.id')
            ->select('c.*', 'con.name as country_name')
            ->paginate($numElements);
    }

    public static function getCustomersIndex($numElements = self::ELEMENTS)
    {
        return self::getAllInfCustomers($numElements);
    }
}
