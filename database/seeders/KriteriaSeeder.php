<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Penghasilan Orang Tua', 'Tanggungan Keluarga', 'Pekerjaan Orang Tua', 'Kepemilikan Asset'] as $nama) {
            Kriteria::create([
                'nama_kriteria' => $nama
            ]);
        }
    }
}
