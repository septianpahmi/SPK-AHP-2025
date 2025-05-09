@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hasil</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('analisis') }}">Analisis</a></li>
                        <li class="breadcrumb-item active">Hasil</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Hasil</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Beasiswa</th>
                                        <th>Pekerjaan</th>
                                        <th>Penghasilan</th>
                                        <th>Tanggungan</th>
                                        <th>Asset</th>
                                        <th>Nilai Ahp</th>
                                        <th>Rangking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data_hasil as $DH)
                                        <td>{{ $DH->idSiswa->name }}</td>
                                        <td>{{ $DH->idBeasiswa->nama_beasiswa }}</td>
                                        <td>{{ $DH->pekerjaan }}</td>
                                        <td>{{ $DH->penghasilan }}</td>
                                        <td>{{ $DH->tanggungan }}</td>
                                        <td>{{ $DH->asset }}</td>
                                        <td>{{ $DH->ahp }}</td>
                                        <td>
                                            <?php
                                            echo $no++;
                                            ?>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
