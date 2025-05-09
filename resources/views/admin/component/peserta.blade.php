@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peserta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peserta</li>
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
                            <h3 class="card-title">Tabel data peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Beasiswa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        @if (
                                            (Auth::user()->role == 'TU' && $item->status == 'Diproses') ||
                                                (Auth::user()->role == 'TU' && $item->status == 'Lolos') ||
                                                (Auth::user()->role == 'TU' && $item->status == 'Tidak Lolos'))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->idSiswa->name }}</td>
                                                <td>{{ $item->idKelas->tingkat }} {{ $item->idKelas->jurusan }}
                                                    {{ $item->idKelas->kelas }}</td>
                                                <td>{{ $item->idBeasiswa->nama_beasiswa }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('peserta.detail', $item->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <button url="{{ route('peserta.delete', $item->id) }}"
                                                            type="button" class="btn btn-danger delete"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if (Auth::user()->role == 'komite')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->idSiswa->name }}</td>
                                                <td>{{ $item->idKelas->tingkat }} {{ $item->idKelas->jurusan }}
                                                    {{ $item->idKelas->kelas }}</td>
                                                <td>{{ $item->idBeasiswa->nama_beasiswa }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('peserta.detail', $item->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <button url="{{ route('peserta.delete', $item->id) }}"
                                                            type="button" class="btn btn-danger delete"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </div>
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
