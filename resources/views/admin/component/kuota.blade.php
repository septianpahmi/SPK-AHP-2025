@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kuota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kuota</li>
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
                            <h3 class="card-title">Tabel data kuota</h3>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#kuota">
                                    Tambah kuota
                                </button>
                            </div>
                        </div>
                        @extends('admin.layout.kuota-modals')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Beasiswa</th>
                                        <th>Kelas</th>
                                        <th>Kuota</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->idBeasiswa->nama_beasiswa }}</td>
                                            <td>{{ $item->idKelas->tingkat }} {{ $item->idKelas->jurusan }}
                                                {{ $item->idKelas->kelas }}</td>
                                            <td>{{ $item->kuota }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#kuota{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button url="{{ route('kuota.delete', $item->id) }}" type="button"
                                                        class="btn btn-danger delete" data-id="{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        @foreach ($data as $item)
                            <div class="modal fade" id="kuota{{ $item->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Kuota</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('kuota.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Beasiswa</label>
                                                            <select type="text" class="form-control"
                                                                name="id_beasiswa" placeholder="Masukan nama kriteria"
                                                                required>
                                                                <option value="">Pilih Beasiswa</option>
                                                                @foreach ($beasiswa as $bea)
                                                                    <option value="{{ $bea->id }}"
                                                                        @readonly(true)>
                                                                        {{ $bea->nama_beasiswa }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <select type="text" class="form-control" name="id_kelas"
                                                                placeholder="Masukan nama kriteria" required>
                                                                <option value="" @readonly(true)>Pilih Kelas
                                                                </option>
                                                                @foreach ($kelas as $kel)
                                                                    <option value="{{ $kel->id }}">
                                                                        {{ $kel->tingkat }} {{ $kel->jurusan }}
                                                                        {{ $kel->kelas }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Kuota</label>
                                                            <input type="number" value="{{ $item->kuota }}"
                                                                class="form-control" name="kuota"
                                                                placeholder="Masukan kuota" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endforeach
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
