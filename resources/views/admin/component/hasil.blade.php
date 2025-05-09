@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hasil Analisis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Hasil Analisis</li>
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
                            <h3 class="card-title">Tabel Hasil Analisis</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Beasiswa</th>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                        <th>Nilai Ahp</th>
                                        <th>Rangking</th>
                                        <th>Verifikasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($datahasil as $DH)
                                        @if ($DH->idPeserta->status == 'Lolos')
                                            <th>{{ $DH->idSiswa->name }}</th>
                                            <td>{{ $DH->idBeasiswa->nama_beasiswa }}</td>
                                            <td>{{ $DH->idKelas->tingkat }} {{ $DH->idKelas->jurusan }}
                                                {{ $DH->idKelas->kelas }}</td>
                                            <td>{{ $DH->idPeserta->status }}</td>
                                            <td>{{ $DH->ahp }}</td>
                                            <td>
                                                <?php
                                                echo $no++;
                                                ?>
                                            </td>
                                            <td>{{ $DH->status }}</td>
                                            <td>
                                                @if (Auth::user()->role == 'kepsek')
                                                    <div class="btn-group">
                                                        @if ($DH->status == 'Diproses')
                                                            <button url="{{ route('hasil.lolosverifikasi', $DH->id) }}"
                                                                type="button" class="btn btn-success status"
                                                                data-id="{{ $DH->id }}">
                                                                Verifikasi
                                                            </button>
                                                            <button url="{{ route('hasil.nonverifikasi', $DH->id) }}"
                                                                type="button" class="btn btn-danger status"
                                                                data-id="{{ $DH->id }}">
                                                                Tolak Verifikasi
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if (Auth::user()->role == 'komite')
                                                    <div class="btn-group">
                                                        @if ($DH->status == 'Menunggu Diajukan' || $DH->idPeserta->status == 'Tidak Lolos Verifikasi')
                                                            <button url="{{ route('hasil.ajukan', $DH->id) }}"
                                                                type="button" class="btn btn-primary status"
                                                                data-id="{{ $DH->id }}">
                                                                <i class="fas fa-share"></i> Ajukan
                                                            </button>
                                                        @endif
                                                        @if ($DH->status == 'Menunggu Diajukan')
                                                            <button url="{{ route('hasil.delete', $DH->id) }}"
                                                                type="button" class="btn btn-danger delete"
                                                                data-id="{{ $DH->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endif

                                            </td>
                                            </tr>
                                        @endif
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
