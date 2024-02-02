<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'id' => 1,
                'cif' => '54288113V',
                'name' => 'Sergio Cruz Rosado',
                'email' => 'sergio@gmail.com',
                'account_number' => 'ES9420958016627785059700',
                'country_id' => 12
            ],
            [
                'id' => 2,
                'cif' => '57861625L',
                'name' => 'Jose Angel Araujo',
                'email' => 'jose@gmail.com',
                'account_number' => 'ES8701827925159693449407',
                'country_id' => 12
            ],
            [
                'id' => 3,
                'cif' => '11123846B',
                'name' => 'Maria Nieves Salas',
                'email' => 'maria@gmail.com',
                'account_number' => 'ES4620958539291442239981',
                'country_id' => 12
            ],
        ];
        DB::table('customers')->insert($customers);
    }
}
