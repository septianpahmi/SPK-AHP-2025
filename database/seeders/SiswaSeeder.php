<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            ['name' => 'A. LATIP', 'nis' => '242510001'],
            ['name' => 'AHMAD AHPAS SAEPUDIN', 'nis' => '242510002'],
            ['name' => 'ATEP', 'nis' => '242510003'],
            ['name' => 'BADAR', 'nis' => '242510004'],
            ['name' => 'DEDEH SITI SOLIHAH', 'nis' => '242510005'],
            ['name' => 'DENI SAPUTRA', 'nis' => '242510006'],
            ['name' => 'DIKA SETIAWAN', 'nis' => '242510007'],
            ['name' => 'DONI', 'nis' => '242510008'],
            ['name' => 'FATIMAH YULIANTI', 'nis' => '242510009'],
            ['name' => 'FAZAR FAUZI', 'nis' => '242510010'],
        ];

        $usedEmails = [];

        foreach ($siswas as $siswa) {
            // generate email unik
            $baseEmail = Str::slug($siswa['name'], '.');
            $email = $baseEmail . '@gmail.com';

            $counter = 1;
            while (in_array($email, $usedEmails)) {
                $email = $baseEmail . $counter . '@gmail.com';
                $counter++;
            }
            $usedEmails[] = $email;

            User::create([
                'name'       => $siswa['name'],
                'nis'        => $siswa['nis'],
                'email'      => $email,
                'role'       => 'siswa',
                'password'   => Hash::make('12345678'),
                'kode_akses' => null,               // bisa diisi kalau dipakai
                'status'     => 'Tidak lengkap',    // default saat register
                'aktivasi'   => 'Tidak aktif',      // default sebelum diaktifkan TU
            ]);
        }
    }
}
