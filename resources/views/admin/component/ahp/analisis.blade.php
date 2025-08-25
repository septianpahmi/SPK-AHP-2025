@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Analisis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Analisis</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Cara mengisi perbandingan:</h5>
                        <p>
                        <ol>
                            <li>Isi perbandingan pada <strong>perbandingan</strong> sesuai dengan preferensi anda. Misal
                                anda ingin <strong>Pengahsilan</strong> lebih baik dari <strong>Tanggungan</strong>,
                                isilah
                                kolom <strong>perbandingan</strong> dengan angka lebih besar dari 2.</li>
                            <li>Jika dua kriteria memiliki nilai yang setara, isilah kolom <strong>perbandingan</strong>
                                dengan angka 1/2.<br> <strong>Contoh</strong> : Anda membandingkan
                                <strong>Penghasilan</strong> dan
                                <strong>Tanggungan</strong>, lalu Penghasilan lebih baik dari Tanggungan, tetapi
                                Penghasilan dan
                                Tanggungan memiliki nilai yang sama, maka isi kolom <strong>perbandingan</strong> dengan
                                angka 1/2.
                            </li>
                        </ol>
                        </p>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel analisis</h3>
                        </div>
                        @extends('admin.layout.modals')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('postbobot') }}" method="POST">
                                @csrf

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Kriteria 1</th>
                                            <th>Nilai Banding</th>
                                            <th>Nama Kriteria 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Penghasilan</td>
                                            <td>
                                                <select class="form-control" name="kpot">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
                                                    <option value="2">Antara 1 dan 3 (Nilai = 2)</option>
                                                    <option value="3">Sedikit lebih penting (Nilai = 3)</option>
                                                    <option value="4">Antara 3 dan 5 (Nilai = 4)</option>
                                                    <option value="5">Cukup penting (Nilai = 5)</option>
                                                    <option value="6">Antara 5 dan 7 (Nilai = 6)</option>
                                                    <option value="7">Sangat penting (Nilai = 7)</option>
                                                    <option value="8">Antara 7 dan 9 (Nilai = 8)</option>
                                                    <option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Tanggungan</td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan</td>
                                            <td>
                                                <select class="form-control" name="kpop">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Pekerjaan</td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan</td>
                                            <td>
                                                <select class="form-control" name="kpoa">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Asset</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggungan</td>
                                            <td>
                                                <select class="form-control" name="ktop">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Penghasilan</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggungan</td>
                                            <td>
                                                <select class="form-control" name="ktopk">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Pekerjaan</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggungan</td>
                                            <td>
                                                <select class="form-control" name="ktoa">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Asset</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>
                                                <select class="form-control" name="kpkp">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Penghasilan</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>
                                                <select class="form-control" name="kpkt">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Tanggungan</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>
                                                <select class="form-control" name="kpka">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Asset</td>
                                        </tr>
                                        <tr>
                                            <td>Asset</td>
                                            <td>
                                                <select class="form-control" name="kapk">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Pekerjaan</td>
                                        </tr>
                                        <tr>
                                            <td>Asset</td>
                                            <td>
                                                <select class="form-control" name="kat">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Tanggungan</td>
                                        </tr>
                                        <tr>
                                            <td>Asset</td>
                                            <td>
                                                <select class="form-control" name="kap">
                                                    <option value="1">Sama Penting (Nilai = 1)</option>
<option value="2">Antara 1 dan 3 (Nilai = 2)</option>
<option value="3">Sedikit lebih penting (Nilai = 3)</option>
<option value="4">Antara 3 dan 5 (Nilai = 4)</option>
<option value="5">Cukup penting (Nilai = 5)</option>
<option value="6">Antara 5 dan 7 (Nilai = 6)</option>
<option value="7">Sangat penting (Nilai = 7)</option>
<option value="8">Antara 7 dan 9 (Nilai = 8)</option>
<option value="9">Mutlak/ekstrem penting (Nilai = 9)</option>

                                                </select>
                                            </td>
                                            <td>Penghasilan</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block">Hitung</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-warning btn-block"
                                            onclick="kembalibobot();">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script>
                            function kembalibobot() {
                                window.location.href = "/dashboard";
                            }
                        </script>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
</div>
@include('admin.partial.footer')
