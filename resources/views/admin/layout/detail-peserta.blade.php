@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Peserta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Peserta</li>
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
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-user"></i> Detail peserta beasiswa.
                                    <small class="float-right">Tanggal pendaftaran:
                                        {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-2 invoice-col">
                                <br><b>Informasi Siswa</b>
                                <address>
                                    NIS<br>
                                    Nama<br>
                                    Jenis Kelamin<br>
                                    Tempat, Tanggal Lahir<br>
                                    Kelas<br>
                                </address>
                            </div>
                            <div class=" invoice-col">
                                <br>
                                <br>
                                <address>
                                    :<br>
                                    :<br>
                                    :<br>
                                    :<br>
                                    :<br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 invoice-col">
                                <br>
                                <br>
                                <address>
                                    {{ $siswa->nis }}<br>
                                    {{ $siswa->nama }}<br>
                                    {{ $siswa->gender }}<br>
                                    {{ $siswa->tempat_lahir }}, {{ date('d M Y', strtotime($siswa->tgl_lahir)) }}<br>
                                    {{ $siswa->idKelas->tingkat }} {{ $siswa->idKelas->jurusan }}
                                    {{ $siswa->idKelas->kelas }}<br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-2 invoice-col">
                                <br><b>Informasi Wali Siswa</b>
                                <address>
                                    Nama Ayah<br>
                                    Nama Ibu<br>
                                    Alamat<br>
                                </address>
                            </div>
                            <div class=" invoice-col">
                                <br>
                                <br>
                                <address>
                                    :<br>
                                    :<br>
                                    :<br>
                                </address>
                            </div>
                            <div class="col-sm-2 invoice-col">
                                <br>
                                <br>
                                <address>
                                    {{ $siswa->nama_ayah }}<br>
                                    {{ $siswa->nama_ibu }}<br>
                                    {{ $siswa->alamat }}<br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Nama Beasiswa</th>
                                            <th>PKO</th>
                                            <th>PO</th>
                                            <th>TO</th>
                                            <th>ASSET</th>
                                            <th>SKTM</th>
                                            <th>Dokumen lainnya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->idBeasiswa->nama_beasiswa }}</td>
                                            @if ($data->pekerjaan == 5)
                                                <td>
                                                    Tidak Bekerja</td>
                                            @elseif($data->pekerjaan == 4)
                                                <td>
                                                    Lainnya/ Pekerja Harian</td>
                                            @elseif($data->pekerjaan == 3)
                                                <td>
                                                    Pegawai Swasta</td>
                                            @elseif($data->pekerjaan == 2)
                                                <td>PNS/TNI/POLRI</td>
                                            @endif

                                            @if ($data->penghasilan == 5)
                                                <td>
                                                    < Rp. 1.000.000</td>
                                                    @elseif($data->penghasilan == 4)
                                                <td>
                                                    Rp. 1.000.000 - Rp. 2.000.000</td>
                                            @elseif($data->penghasilan == 3)
                                                <td>
                                                    Rp. 2.000.000 - Rp. 3.000.000</td>
                                            @elseif($data->penghasilan == 2)
                                                <td>> Rp. 3.000.000</td>
                                            @endif

                                            @if ($data->tanggungan == 5)
                                                <td>
                                                    > 4 Tanggungan</td>
                                            @elseif($data->tanggungan == 4)
                                                <td>
                                                    4 Tanggungan</td>
                                            @elseif($data->tanggungan == 3)
                                                <td>
                                                    3 Tanggungan</td>
                                            @elseif($data->tanggungan == 2)
                                                <td>
                                                    < 2 Tanggungan</td>
                                            @endif

                                            @if ($data->asset == 5)
                                                <td>
                                                    Tidak memiliki kendaraan</td>
                                            @elseif($data->asset == 4)
                                                <td>
                                                    Motor</td>
                                            @elseif($data->asset == 3)
                                                <td>
                                                    Mobil</td>
                                            @elseif($data->asset == 2)
                                                <td>
                                                    Rumah</td>
                                            @endif
                                            <td>
                                                <iframe src="/file/sktm/{{ $data->sktm }}" height="100px"
                                                    width="100px" frameborder="0"></iframe>
                                                <a href="/file/sktm/{{ $data->sktm }}" download>Download</a>
                                            </td>
                                            <td>

                                                <iframe src="/file/dok_lainnya/{{ $data->dok_lainnya }}" height="100px"
                                                    width="100px" frameborder="0"></iframe>
                                                <a href="/file/dok_lainnya/{{ $data->dok_lainnya }}"
                                                    download>Download</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ route('peserta') }}" rel="noopener" class="btn btn-default"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                                @if (Auth::user()->role == 'komite' && $data->status == 'Mendaftar')
                                    <button url="{{ route('peserta.disapprove', $data->id) }}" type="button"
                                        class="btn btn-danger float-right status" data-id="{{ $data->id }}">
                                        Tolak Pengajuan
                                    </button>
                                    <button url="{{ route('peserta.approve', $data->id) }}" type="button"
                                        class="btn btn-success float-right status" data-id="{{ $data->id }}"
                                        style="margin-right: 5px;">
                                        Terima Pengajuan
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@include('admin.partial.footer')
