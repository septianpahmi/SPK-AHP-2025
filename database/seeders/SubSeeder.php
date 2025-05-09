<?php

namespace Database\Seeders;

use App\Models\Subkriteria;
use Illuminate\Database\Seeder;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subKriteria = [
            [
                'subkriteria' => '< 1000000',
                'nilai' => '5',
                'id_kriteria' => '1',
            ],
            [
                'subkriteria' => '1000000 - 2000000',
                'nilai' => '4',
                'id_kriteria' => '1',
            ],
            [
                'subkriteria' => '2000000 - 3000000',
                'nilai' => '3',
                'id_kriteria' => '1',
            ],
            [
                'subkriteria' => '> 3000000',
                'nilai' => '2',
                'id_kriteria' => '1',
            ],
            [
                'subkriteria' => '> 4',
                'nilai' => '5',
                'id_kriteria' => '2',
            ],
            [
                'subkriteria' => '4',
                'nilai' => '4',
                'id_kriteria' => '2',
            ],
            [
                'subkriteria' => '3',
                'nilai' => '3',
                'id_kriteria' => '2',
            ],
            [
                'subkriteria' => '<= 2',
                'nilai' => '2',
                'id_kriteria' => '2',
            ],
            [
                'subkriteria' => 'Tidak Bekerja',
                'nilai' => '5',
                'id_kriteria' => '3',
            ],
            [
                'subkriteria' => 'Lainnya/ Pekerja Buruh',
                'nilai' => '4',
                'id_kriteria' => '3',
            ],
            [
                'subkriteria' => 'Pegawai Swasta',
                'nilai' => '3',
                'id_kriteria' => '3',
            ],
            [
                'subkriteria' => 'PNS/TNI/POLRI',
                'nilai' => '2',
                'id_kriteria' => '3',
            ],
            [
                'subkriteria' => 'Tidak memiliki kendaraan',
                'nilai' => '5',
                'id_kriteria' => '4',
            ],
            [
                'subkriteria' => 'Motor',
                'nilai' => '4',
                'id_kriteria' => '4',
            ],
            [
                'subkriteria' => 'Mobil',
                'nilai' => '3',
                'id_kriteria' => '4',
            ],
            [
                'subkriteria' => 'Rumah',
                'nilai' => '2',
                'id_kriteria' => '4',
            ],
        ];

        foreach ($subKriteria as $item) {
            Subkriteria::create($item);
        }
    }
}
