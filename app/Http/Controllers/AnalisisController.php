<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Kelas;
use App\Models\Kuota;
use App\Models\Peserta;
use App\Models\Beasiswa;
use App\Models\Comparisons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataSiswa;

class AnalisisController extends Controller
{
    public function index()
    {
        return view('admin.component.ahp.analisis');
    }

    public function postbobot(Request $request)
    {
        $pk = 1;
        $po = 1;
        $ta = 1;
        $as = 1;
        //pekerjaan
        $pkp = $request->kpkp;
        $pkt = $request->kpkt;
        $pka = $request->kpka;
        //penghasilan
        $pop = $request->kpop;
        $pot = $request->kpot;
        $poa = $request->kpoa;
        //tanggungan
        $topk = $request->ktopk;
        $top = $request->ktop;
        $toa = $request->ktoa;
        //asset
        $apk = $request->kapk;
        $at = $request->kat;
        $ap = $request->kap;

        (float) $k1 = $as;
        (float) $k2 = $pkp / $pop;
        (float) $k3 = $pkt / $topk;
        (float) $k4 = $pka / $apk;
        (float) $k5 = $pop / $pkp;
        (float) $k6 = $ta;
        (float) $k7 = $pot / $top;
        (float) $k8 = $poa / $ap;
        (float) $k9 = $topk / $pkt;
        (float) $k10 = $top / $pot;
        (float) $k11 = $pk;
        (float) $k12 = $toa / $at;
        (float) $k13 = $apk / $pka;
        (float) $k14 = $ap / $poa;
        (float) $k15 = $at / $toa;
        (float) $k16 = $po;
        (float) $k17 = $k1 + $k5 + $k9 + $k13;
        (float) $k18 = $k2 + $k6 + $k10 + $k14;
        (float) $k19 = $k3 + $k7 + $k11 + $k15;
        (float) $k20 = $k4 + $k8 + $k12 + $k16;
        return view('admin.component.ahp.index', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
        ]);
    }

    public function postmatriks(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;

        (float) $k1 = $t1 / $t17;
        (float) $k2 = $t2 / $t18;
        (float) $k3 = $t3 / $t19;
        (float) $k4 = $t4 / $t20;
        (float) $k5 = $t5 / $t17;
        (float) $k6 = $t6 / $t18;
        (float) $k7 = $t7 / $t19;
        (float) $k8 = $t8 / $t20;
        (float) $k9 = $t9 / $t17;
        (float) $k10 = $t10 / $t18;
        (float) $k11 = $t11 / $t19;
        (float) $k12 = $t12 / $t20;
        (float) $k13 = $t13 / $t17;
        (float) $k14 = $t14 / $t18;
        (float) $k15 = $t15 / $t19;
        (float) $k16 = $t16 / $t20;

        $k17 = $k1 + $k5 + $k9 + $k13;
        $k18 = $k2 + $k6 + $k10 + $k14;
        $k19 = $k3 + $k7 + $k11 + $k15;
        $k20 = $k4 + $k8 + $k12 + $k16;

        return view('admin.component.ahp.index2', [
            'k1' => number_format($k1, 2),
            'k2' => number_format($k2, 2),
            'k3' => number_format($k3, 2),
            'k4' => number_format($k4, 2),
            'k5' => number_format($k5, 2),
            'k6' => number_format($k6, 2),
            'k7' => number_format($k7, 2),
            'k8' => number_format($k8, 2),
            'k9' => number_format($k9, 2),
            'k10' => number_format($k10, 2),
            'k11' => number_format($k11, 2),
            'k12' => number_format($k12, 2),
            'k13' => number_format($k13, 2),
            'k14' => number_format($k14, 2),
            'k15' => number_format($k15, 2),
            'k16' => number_format($k16, 2),
            'k17' => round($k17),
            'k18' => round($k18),
            'k19' => round($k19),
            'k20' => round($k20),
        ]);
    }

    public function postmatriks2(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;

        (float) $k1 = $t1;
        (float) $k2 = $t2;
        (float) $k3 = $t3;
        (float) $k4 = $t4;
        (float) $k5 = $t5;
        (float) $k6 = $t6;
        (float) $k7 = $t7;
        (float) $k8 = $t8;
        (float) $k9 = $t9;
        (float) $k10 = $t10;
        (float) $k11 = $t11;
        (float) $k12 = $t12;
        (float) $k13 = $t13;
        (float) $k14 = $t14;
        (float) $k15 = $t15;
        (float) $k16 = $t16;
        $k17 = $t17;
        $k18 = $t18;
        $k19 = $t19;
        $k20 = $t20;
        $k21 = ($k1 + $k2 + $k3 + $k4) / 4;
        $k22 = ($k5 + $k6 + $k7 + $k8) / 4;
        $k23 = ($k9 + $k10 + $k11 + $k12) / 4;
        $k24 = ($k13 + $k14 + $k15 + $k16) / 4;
        $k25 = $k1 + $k2 + $k3 + $k4;
        $k26 = $k5 + $k6 + $k7 + $k8;
        $k27 = $k9 + $k10 + $k11 + $k12;
        $k28 = $k13 + $k14 + $k15 + $k16;
        $k29 = $k17 + $k18 + $k19 + $k20;
        return view('admin.component.ahp.index3', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => $k26,
            'k27' => $k27,
            'k28' => $k28,
            'k29' => $k29,
        ]);
    }

    public function cekkonsistensi(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;
        $t21 = $request->k21;
        $t22 = $request->k22;
        $t23 = $request->k23;
        $t24 = $request->k24;
        $t25 = $request->k25;
        $t26 = $request->k26;
        $t27 = $request->k27;
        $t28 = $request->k28;

        (float) $k1 = $t1;
        (float) $k2 = $t2;
        (float) $k3 = $t3;
        (float) $k4 = $t4;
        (float) $k5 = $t5;
        (float) $k6 = $t6;
        (float) $k7 = $t7;
        (float) $k8 = $t8;
        (float) $k9 = $t9;
        (float) $k10 = $t10;
        (float) $k11 = $t11;
        (float) $k12 = $t12;
        (float) $k13 = $t13;
        (float) $k14 = $t14;
        (float) $k15 = $t15;
        (float) $k16 = $t16;

        $k17 = $t17;
        $k18 = $t18;
        $k19 = $t19;
        $k20 = $t20;
        $k21 = $t21;
        $k22 = $t22;
        $k23 = $t23;
        $k24 = $t24;
        $k25 = $t25;
        $k26 = $t26;
        $k27 = $t27;
        $k28 = $t28;

        $hs1 = ($k21 + $k25);
        $hs2 = ($k22 + $k26);
        $hs3 = ($k23 + $k27);
        $hs4 = ($k24 + $k28);
        $hs5 = ($hs1 + $hs2 + $hs3 + $hs4);

        // Menghitung lambda max 
        $lambdamax = ($hs5) / 4;

        // Menghitung CI
        $ci = ($lambdamax - 4) / (4 - 1);

        // Menghitung CR
        $cr = $ci / 0.90;
        $data = Beasiswa::all();
        return view('admin.component.ahp.index4', [
            'data' => $data,
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => $k26,
            'k27' => $k27,
            'k28' => $k28,
            'hs1' => $hs1,
            'hs2' => $hs2,
            'hs3' => $hs3,
            'hs4' => $hs4,
            'hs5' => $hs5,
            'cr' => $cr,
        ]);
    }

    public function posthasilrekomendasi(Request $request)
    {
        $id = $request->beasiswa;
        $penghasilan = Comparisons::select('penghasilan')->where('id_beasiswa', $id)->orderBy('id_siswa', 'asc')->get();
        $tanggungan = Comparisons::select('tanggungan')->where('id_beasiswa', $id)->orderBy('id_siswa', 'asc')->get();
        $pekerjaan = Comparisons::select('pekerjaan')->where('id_beasiswa', $id)->orderBy('id_siswa', 'asc')->get();
        $asset = Comparisons::select('asset')->where('id_beasiswa', $id)->orderBy('id_siswa', 'asc')->get();

        // variabel penampung nilai kedalam array
        $datahargaarr = [];
        $datalantaiarr = [];
        $dataluasarr = [];
        $datakamararr = [];

        // buat masukin data kedalam bentuk array
        foreach ($penghasilan as $itemh) {
            $datahargaarr[] = $itemh->penghasilan;
        }

        foreach ($tanggungan as $iteml) {
            $datalantaiarr[] = $iteml->tanggungan;
        }

        foreach ($pekerjaan as $items) {
            $dataluasarr[] = $items->pekerjaan;
        }

        foreach ($asset as $itemk) {
            $datakamararr[] = $itemk->asset;
        }

        // buat manggil data arraynya
        // dd($datahargaarr, $datalantaiarr, $dataluasarr, $datakamararr, $datagarasiarr);

        $t31 = $request->k25;
        $t32 = $request->k26;
        $t33 = $request->k27;
        $t34 = $request->k28;

        // kriteria harga
        $hasilh = [];
        $hasiljmlh = 0;
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datahargaarr) * sizeof($datahargaarr)) + (sizeof($datahargaarr) - 1); $m++) {
            if ($i < sizeof($datahargaarr)) {
                $hasilh[$n] = $datahargaarr[$i] / $datahargaarr[$j];
                $i++;
                $n++;
            } else if ($j < sizeof($datahargaarr)) {
                $j++;
                $i = 0;
            } else {
                // Do nothing
            }
        }

        // Jumlah kolom dan baris
        $barish = sizeof($datahargaarr);
        $kolomh = sizeof($datahargaarr);
        $data2Dh = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barish; $i++) {
            for ($j = 0; $j < $kolomh; $j++) {
                $data2Dh[$i][$j] = $hasilh[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmlh = array();
        for ($i = 0; $i < $kolomh; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barish; $j++) {
                $jumlah += $data2Dh[$j][$i];
            }
            $hasiljmlh[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgh = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datahargaarr) * sizeof($datahargaarr)) + (sizeof($datahargaarr) - 1); $m++) {
            if ($i < sizeof($datahargaarr)) {
                $hasilbgh[$z] = $hasilh[$z] / $hasiljmlh[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barish; $i++) {
            for ($j = 0; $j < $kolomh; $j++) {
                $data2Dbgh[$i][$j] = $hasilbgh[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltmh = [];
        $i = 0;
        for ($j = 0; $j < $barish; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $kolomh; $i++) {
                $jumlah += $data2Dbgh[$j][$i];
            }
            $hasiltmh[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            $jumlah = $hasiltmh[$i] / sizeof($datahargaarr);
            $hasilpmh[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            $jumlah = $hasilpmh[$i] * $t34;
            $hasilppmh[] = $jumlah;
        }


        // kriteria lantai
        $hasill = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datalantaiarr) * sizeof($datalantaiarr)) + (sizeof($datalantaiarr) - 1); $m++) {
            if ($i < sizeof($datalantaiarr)) {
                $hasill[$n] = $datalantaiarr[$i] / $datalantaiarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datalantaiarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $barisl = sizeof($datalantaiarr);
        $koloml = sizeof($datalantaiarr);
        $data2Dl = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barisl; $i++) {
            for ($j = 0; $j < $koloml; $j++) {
                $data2Dl[$i][$j] = $hasill[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmll = array();
        for ($i = 0; $i < $koloml; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barisl; $j++) {
                $jumlah += $data2Dl[$j][$i];
            }
            $hasiljmll[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgl = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datalantaiarr) * sizeof($datalantaiarr)) + (sizeof($datalantaiarr) - 1); $m++) {
            if ($i < sizeof($datalantaiarr)) {
                $hasilbgl[$z] = $hasill[$z] / $hasiljmll[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barisl; $i++) {
            for ($j = 0; $j < $koloml; $j++) {
                $data2Dbgl[$i][$j] = $hasilbgl[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltml = [];
        $i = 0;
        for ($j = 0; $j < $barisl; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $koloml; $i++) {
                $jumlah += $data2Dbgl[$j][$i];
            }
            $hasiltml[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datalantaiarr); $i++) {
            $jumlah = $hasiltml[$i] / sizeof($datalantaiarr);
            $hasilpml[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datalantaiarr); $i++) {
            $jumlah = $hasilpml[$i] * $t31;
            $hasilppml[] = $jumlah;
        }

        // kriteria luas
        $hasils = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($dataluasarr) * sizeof($dataluasarr)) + (sizeof($dataluasarr) - 1); $m++) {
            if ($i < sizeof($dataluasarr)) {
                $hasils[$n] = $dataluasarr[$i] / $dataluasarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($dataluasarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $bariss = sizeof($dataluasarr);
        $koloms = sizeof($dataluasarr);
        $data2Ds = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $bariss; $i++) {
            for ($j = 0; $j < $koloms; $j++) {
                $data2Ds[$i][$j] = $hasils[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmls = array();
        for ($i = 0; $i < $koloms; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $bariss; $j++) {
                $jumlah += $data2Ds[$j][$i];
            }
            $hasiljmls[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgs = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($dataluasarr) * sizeof($dataluasarr)) + (sizeof($dataluasarr) - 1); $m++) {
            if ($i < sizeof($dataluasarr)) {
                $hasilbgs[$z] = $hasils[$z] / $hasiljmls[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $bariss; $i++) {
            for ($j = 0; $j < $koloms; $j++) {
                $data2Dbgs[$i][$j] = $hasilbgs[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltms = [];
        $i = 0;
        for ($j = 0; $j < $bariss; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $koloms; $i++) {
                $jumlah += $data2Dbgs[$j][$i];
            }
            $hasiltms[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($dataluasarr); $i++) {
            $jumlah = $hasiltms[$i] / sizeof($dataluasarr);
            $hasilpms[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($dataluasarr); $i++) {
            $jumlah = $hasilpms[$i] * $t33;
            $hasilppms[] = $jumlah;
        }

        // kriteria kamar
        $hasilk = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datakamararr) * sizeof($datakamararr)) + (sizeof($datakamararr) - 1); $m++) {
            if ($i < sizeof($datakamararr)) {
                $hasilk[$n] = $datakamararr[$i] / $datakamararr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datakamararr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $barisk = sizeof($datakamararr);
        $kolomk = sizeof($datakamararr);
        $data2Dk = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barisk; $i++) {
            for ($j = 0; $j < $kolomk; $j++) {
                $data2Dk[$i][$j] = $hasilk[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmlk = array();
        for ($i = 0; $i < $kolomk; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barisk; $j++) {
                $jumlah += $data2Dk[$j][$i];
            }
            $hasiljmlk[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgk = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datakamararr) * sizeof($datakamararr)) + (sizeof($datakamararr) - 1); $m++) {
            if ($i < sizeof($datakamararr)) {
                $hasilbgk[$z] = $hasilk[$z] / $hasiljmlk[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barisk; $i++) {
            for ($j = 0; $j < $kolomk; $j++) {
                $data2Dbgk[$i][$j] = $hasilbgk[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltmk = [];
        $i = 0;
        for ($j = 0; $j < $barisk; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $kolomk; $i++) {
                $jumlah += $data2Dbgk[$j][$i];
            }
            $hasiltmk[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datakamararr); $i++) {
            $jumlah = $hasiltmk[$i] / sizeof($datakamararr);
            $hasilpmk[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datakamararr); $i++) {
            $jumlah = $hasilpmk[$i] * $t32;
            $hasilppmk[] = $jumlah;
        }

        $idPes = DB::table('pesertas')
            ->pluck('id');
        $tipe = DB::table('pesertas')
            ->select('id_siswa')
            ->get();
        $beasiswa = DB::table('pesertas')
            ->select('id_beasiswa')
            ->get();
        $penghasilant = DB::table('pesertas')
            ->select('penghasilan')
            ->get();
        $tanggungant = DB::table('pesertas')
            ->select('tanggungan')
            ->get();
        $pekerjaant = DB::table('pesertas')
            ->select('pekerjaan')
            ->get();
        $asset = DB::table('pesertas')
            ->select('asset')
            ->get();
        $kelas = DB::table('pesertas')
            ->select('id_kelas')
            ->get();
        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            $hasiljumlah[] = $hasilppmh[$i] + $hasilppml[$i] + $hasilppmk[$i] + $hasilppms[$i];
        }
        $pesertaGroupedByKelas = DB::table('pesertas')
            ->select('id_siswa', 'id_kelas')
            ->get()
            ->groupBy('id_kelas');
        $kuota = DB::table('kuotas')
            ->select('id_kelas', 'kuota')
            ->distinct()
            ->get()
            ->keyBy('id_kelas');


        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            if (isset($tipe[$i], $penghasilant[$i], $tanggungant[$i], $pekerjaant[$i], $asset[$i], $hasiljumlah[$i])) {
                Hasil::create([
                    'id_siswa' => $tipe[$i]->id_siswa,
                    'id_beasiswa' => $beasiswa[$i]->id_beasiswa,
                    'id_peserta' => $idPes[$i],
                    'id_kelas' => $kelas[$i]->id_kelas,
                    'penghasilan' => $penghasilant[$i]->penghasilan,
                    'tanggungan' => $tanggungant[$i]->tanggungan,
                    'pekerjaan' => $pekerjaant[$i]->pekerjaan,
                    'asset' => $asset[$i]->asset,
                    'ahp' => $hasiljumlah[$i]
                ]);

                foreach ($pesertaGroupedByKelas as $idKelas => $pesertaKelas) {
                    // Dapatkan kuota untuk kelas ini
                    $kuotaKelas = $kuota[$idKelas]->kuota ?? 0;

                    // Iterasi setiap peserta dalam kelas ini
                    foreach ($pesertaKelas as $index => $peserta) {
                        if ($index < $kuotaKelas) {
                            // Jika peserta masuk dalam kuota, update status menjadi 'Lolos'
                            DB::table('pesertas')
                                ->where('id_siswa', $peserta->id_siswa)
                                ->update(['status' => 'Lolos']);
                        } else {
                            // Jika peserta tidak masuk dalam kuota, update status menjadi 'Tidak Lolos'
                            DB::table('pesertas')
                                ->where('id_siswa', $peserta->id_siswa)
                                ->update(['status' => 'Tidak Lolos']);
                        }
                        DB::table('data_siswas')
                            ->where('id_user', $peserta->id_siswa)
                            ->update(['status' => 'Sudah Dinilai']);
                    }
                }
            }
        }

        $datahasil = Hasil::where('id_beasiswa', $id)->get();

        $datamax = DB::table('hasils')
            ->orderBy('ahp', 'desc')
            ->limit(1)
            ->get();

        return view('admin.component.ahp.hasil', [
            'data_hasil' => $datahasil,
            'data_max' => $datamax
        ]);
    }
}
