<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ArriendosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('arriendos')->insert([
            ['rut_cliente' => '12345678-9',
            'patente_vehiculo' => '123ABC',
            'fecha_incio' => Carbon::parse('2024-07-01'),
            'fecha_termino' => Carbon::parse('2024-07-10'),
            'imagen_entrega' => 'images/rayo.jpeg',
            'imagen_recepcion' => 'images/rayo.jpeg'],
        ]);
    }
}
