@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                            <h3 class="card-title">Tabel data users</h3>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#users">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        @extends('admin.layout.modals')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Kode Akses</th>
                                        <th>Aktivasi</th>
                                        <th>Data Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td><button type="button"
                                                    class="btn btn-sm btn-primary">{{ $item->role }}</button>
                                            </td>
                                            <td>{{ $item->kode_akses }}</td>
                                            <td><button type="button"
                                                    class="btn btn-sm {{ $item->aktivasi == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }}">{{ $item->aktivasi }}</button>
                                            </td>
                                            <td><button type="button"
                                                    class="btn btn-sm {{ $item->status == 'Lengkap' ? 'btn-outline-success' : 'btn-outline-danger' }}">{{ $item->status }}</button>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-block">
                                                    @if ($item->aktivasi == 'Tidak aktif')
                                                        <button url="{{ route('users.aktif', $item->id) }}"
                                                            type="button" class="btn  btn-success status"
                                                            data-id="{{ $item->id }}">
                                                            Aktifasi
                                                        </button>
                                                    @endif
                                                    @if ($item->aktivasi == 'Aktif')
                                                        <button url="{{ route('users.nonaktif', $item->id) }}"
                                                            type="button" class="btn  btn-warning status"
                                                            data-id="{{ $item->id }}">
                                                            Non Aktif
                                                        </button>
                                                    @endif
                                                    <button type="button" class="btn  btn-info" data-toggle="modal"
                                                        data-target="#users{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button url="{{ route('users.delete', $item->id) }}" type="button"
                                                        class="btn  btn-danger delete" data-id="{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        @foreach ($data as $item)
                            <div class="modal fade" id="users{{ $item->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Users</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ $item->name }}"
                                                                placeholder="Masukan nama lengkap" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ $item->email }}" placeholder="Masukan email"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- select -->
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="form-control" name="role"
                                                                value="{{ $item->role }}" required>
                                                                <option value="komite">Komite</option>
                                                                <option value="TU">Tata Usaha</option>
                                                                <option value="kepsek">Kepala Sekolah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="text" class="form-control" name="password"
                                                                value="{{ $item->kode_akses }}"
                                                                placeholder="Masukan password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
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
