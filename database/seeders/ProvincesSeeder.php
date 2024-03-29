<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            [1, 'Álava'],
            [2, 'Albacete'],
            [3, 'Alicante'],
            [4, 'Almería'],
            [5, 'Ávila'],
            [6, 'Badajoz'],
            [7, 'Illes Balears'],
            [8, 'Barcelona'],
            [9, 'Burgos'],
            [10, 'Cáceres'],
            [11, 'Cádiz'],
            [12, 'Castellón'],
            [13, 'Ciudad Real'],
            [14, 'Córdoba'],
            [15, 'A Coruña'],
            [16, 'Cuenca'],
            [17, 'Girona'],
            [18, 'Granada'],
            [19, 'Guadalajara'],
            [20, 'Gipuzkoa'],
            [21, 'Huelva'],
            [22, 'Huesca'],
            [23, 'Jaén'],
            [24, 'León'],
            [25, 'Lleida'],
            [26, 'La Rioja'],
            [27, 'Lugo'],
            [28, 'Madrid'],
            [29, 'Málaga'],
            [30, 'Murcia'],
            [31, 'Navarra'],
            [32, 'Ourense'],
            [33, 'Asturias'],
            [34, 'Palencia'],
            [35, 'Las Palmas'],
            [36, 'Pontevedra'],
            [37, 'Salamanca'],
            [38, 'Santa Cruz de Tenerife'],
            [39, 'Cantabria'],
            [40, 'Segovia'],
            [41, 'Sevilla'],
            [42, 'Soria'],
            [43, 'Tarragona'],
            [44, 'Teruel'],
            [45, 'Toledo'],
            [46, 'Valencia'],
            [47, 'Valladolid'],
            [48, 'Bizkaia'],
            [49, 'Zamora'],
            [50, 'Zaragoza'],
            [51, 'Ceuta'],
            [52, 'Melilla'],
        ];

        foreach ($provinces as $province) {
            DB::table('provinces')->insert([
                'id' => $province[0],
                'name' => $province[1],
            ]);
        }
    }
}
