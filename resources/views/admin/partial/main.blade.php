<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box">
                        <div class="info-box-icon">
                            <img src="images/lg.png" alt="AdminLTE Logo" class="brand-image img-circle"
                                style="height: 50px;width: 50px">
                        </div>
                        <div class="info-box-content">
                            <span class="info-box-number">Selamat Datang,</span>
                            <span class="info-box-text">{{ Auth::user()->name }}</span>
                        </div>
                        <!-- /.info-box-content -->
                        <div class="info-box-content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="btn btn-default info-box-number"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Sign
                                    Out</a>

                            </form>
                        </div>
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-number">
                                <h5><b><i>SPKAHP</i></b></h5>
                            </span>
                            <span class="info-box-text">v1.0</span>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role == 'TU' || Auth::user()->role == 'komite' || Auth::user()->role == 'kepsek')
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Siswa</span>
                                <span class="info-box-number">{{ $siswa }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-paste"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Beasiswa</span>
                                <span class="info-box-number">{{ $beasiswa }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fas fa-server"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Kriteria</span>
                                <span class="info-box-number">{{ $kriteria }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-cubes"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sub Kriteria</span>
                                <span class="info-box-number">{{ $sub }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                @endif
                @if (Auth::user()->role == 'siswa')

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-bullhorn"></i> Pengumuman Beasiswa</h3>

                                <div class="card-tools">

                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            @foreach ($data as $item)
                                <div class="card-body">
                                    <h3><b>{{ $item->idBeasiswa->nama_beasiswa }}</b></h3>
                                    {{ $item->idBeasiswa->ket }} 
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        @if (isset($dataSiswa) && $dataSiswa->status == 'Draft')
                                            <button type="button"
                                                class="btn btn-outline-warning">{{ $dataSiswa->status }}</button>
                                        @endif
                                        @if (isset($dataSiswa) && $dataSiswa->status == 'Submit')
                                            <button type="button" class="btn btn-outline-primary">Berhasil
                                                {{ $dataSiswa->status }}</button>
                                        @endif
                                        @if (isset($dataSiswa) && $dataSiswa->status == 'Sudah Dinilai')
                                            <button type="button"
                                                class="btn btn-outline-success">{{ $dataSiswa->status }}</button>
                                        @endif
                                        @if (!isset($dataSiswa) || (isset($dataSiswa) && $dataSiswa->status == 'Draft'))
                                            <a href="{{ route('pendaftaran', $item->id) }}" type="button"
                                                class="btn btn-primary">Daftar Sekarang</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Status Pendaftaran</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            @if ($peserta)

                                <div class="card-body">
                                    <div class="timeline">
                                        @if ($peserta->status == 'Mendaftar')
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a
                                                            href="#">{{ Auth::user()->name }}</a> melakukan
                                                        pendaftaran
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-blue"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a href="#">Komite</a>
                                                        memeriksa pendaftaran anda.</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-clock bg-blue"></i>
                                            </div>
                                        @endif
                                        @if ($peserta->status == 'Ditolak')
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a
                                                            href="#">{{ Auth::user()->name }}</a> melakukan
                                                        pendaftaran
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a href="#">Komite</a>
                                                        menolak pendaftaran anda.</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-times bg-red"></i>
                                            </div>
                                        @endif
                                        @if ($peserta->status == 'Diproses')
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a
                                                            href="#">{{ Auth::user()->name }}</a> melakukan
                                                        pendaftaran
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a href="#">Komite</a>
                                                        menyetujui
                                                        pendaftaran anda.</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-blue"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border">Berkas diproses <a
                                                            href="#">Tata
                                                            Usaha</a></h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-clock bg-blue"></i>
                                            </div>
                                        @endif
                                        @if (isset($hasil) && ($hasil->status == 'Menunggu Diajukan' || $hasil->status == 'Diproses'))
                                            @if ($peserta->status == 'Lolos')
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border"><a
                                                                href="#">{{ Auth::user()->name }}</a> melakukan
                                                            pendaftaran
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-folder bg-green"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border"><a
                                                                href="#">Komite</a>
                                                            menyetujui
                                                            pendaftaran anda.</h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-folder bg-green"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border">Berkas berhasil diproses
                                                            <a href="#">Tata
                                                                Usaha</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-folder bg-blue"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border">Berkas diserahkan dan
                                                            diproses
                                                            oleh
                                                            <a href="#">Kepala Sekolah</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-clock bg-blue"></i>
                                                </div>
                                            @endif
                                        @endif
                                        @if (isset($hasil) && ($hasil->status == 'Menunggu Diajukan' || $hasil->status == 'Diproses'))
                                            @if ($peserta->status == 'Tidak Lolos')
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border"><a
                                                                href="#">{{ Auth::user()->name }}</a> melakukan
                                                            pendaftaran
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-folder bg-green"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border"><a
                                                                href="#">Komite</a>
                                                            menyetujui
                                                            pendaftaran anda.</h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-folder bg-green"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border">Berkas berhasil diproses
                                                            <a href="#">Tata
                                                                Usaha</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-times bg-red"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header no-border"><a href="#">Tata
                                                                Usaha</a> Anda dinyatakan tidak lolos
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-times bg-red"></i>
                                                </div>
                                            @endif
                                        @endif

                                        @if (isset($hasil) && $hasil->status == 'Lolos Verifikasi')
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a
                                                            href="#">{{ Auth::user()->name }}</a> melakukan
                                                        pendaftaran
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a href="#">Komite</a>
                                                        menyetujui
                                                        pendaftaran anda.</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border">Berkas berhasil diproses <a
                                                            href="#">Tata
                                                            Usaha</a></h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border">Berkas disetujui <a
                                                            href="#">Kepala
                                                            Sekolah</a></h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-check bg-green"></i>
                                            </div>
                                        @endif
                                        @if (isset($hasil) && $hasil->status == 'Tidak Lolos Verifikasi')
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a
                                                            href="#">{{ Auth::user()->name }}</a> melakukan
                                                        pendaftaran
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border"><a href="#">Komite</a>
                                                        menyetujui
                                                        pendaftaran anda.</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-green"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border">Berkas berhasil diproses <a
                                                            href="#">Tata
                                                            Usaha</a></h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border">Berkas ditolak <a
                                                            href="#">Kepala
                                                            Sekolah</a></h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-folder bg-blue"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header no-border">Berkas akan diajukan ulang
                                                        oleh <a href="#">Komite</a></h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-clock bg-blue"></i>
                                            </div>
                                        @endif

                                    </div>
                                    Ket: <br>
                                    <i class="btn btn-success"></i> Disetujui/Berhasil <br>
                                    <i class="btn btn-primary"></i> Diproses <br>
                                    <i class="btn btn-danger"></i> Ditolak/Gagal
                                </div>
                            @else
                                <div class="card-body">
                                    <div>
                                        <a>Anda melakukan Pendaftaran</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
    </section>

</div>
