<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Tasks extends Model
{
    use HasFactory;
    private const ELEMENTS = 4;
    protected $table = 'tasks';

    protected $fillable = [
        'operator_id',
        'customer_id',
        'contact_name',
        'contact_phone',
        'email',
        'title',
        'description',
        'address',
        'city',
        'postal_code',
        'province_id',
        'status_id',
        'scheduled_at',
        'pre_notes',
        'later_notes',
        'pdf_file',
    ];
    /**
     * @Author ZRJChrist
     * @param int $numElements  Numero de elementos que se mostraran por pagina
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    private static function getAllInfTasks()
    {
        $query = DB::table('tasks as t')
            ->join('statuses as s', 't.status_id', '=', 's.id')
            ->join('provinces as p', 't.province_id', '=', 'p.id')
            ->orderBy('created_at', 'desc')
            ->select('t.*', 's.status_description', 's.iso as status_iso', 'p.name as name_province');

        return User::isAdmin() ?
            $query :
            $query->where('operator_id', Auth::user()->id);
    }
    /**
     * @Author ZRJChrist
     * @param $id Id Task
     * @return Illuminate\Support\Collection
     */
    private static function getAllInfOneTask($id)
    {
        return DB::table('tasks as t')
            ->join('statuses as s', 't.status_id', '=', 's.id')
            ->join('provinces as p', 't.province_id', '=', 'p.id')
            ->join('customers as c', 't.customer_id', '=', 'c.id')
            ->join('users as u', 't.operator_id', '=', 'u.id')
            ->join('countries as con', 'c.country_id', '=', 'con.id')
            ->select(
                't.*',
                'c.id as customer_id',
                'c.name as customer_name',
                'c.cif as customer_cif',
                'c.phone as customer_phone',
                'c.email as customer_email',
                'u.name as operator_name',
                'con.iso3 as iso_country',
                's.status_description',
                's.iso as iso_status',
                'p.name as name_province'
            )
            ->where('t.id', $id)
            ->get()[0];
    }
    /**
     * Funcion que devuelve que devuelve los datos necesarios 
     * para listar los elementos en la vista de index
     * @Author ZRJChrist
     * @param int $numElements  Numero de elementos que se mostraran por pagina | valor por defecto self::ELEMENTS = 4
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getTasksIndex(int $numElements = self::ELEMENTS)
    {
        return self::getAllInfTasks()->paginate($numElements);
    }

    public static function getTaskShow($id)
    {
        return self::getAllInfOneTask($id);
    }
}
