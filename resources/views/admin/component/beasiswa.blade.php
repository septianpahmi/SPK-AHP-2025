@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Beasiswa</li>
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
                            <h3 class="card-title">Tabel data beasiswa</h3>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#beasiswa">
                                    Tambah beasiswa
                                </button>
                                @if ($data->count() > 0)
                                    <a href="{{ route('kuota') }}" type="button" class="btn btn-primary">
                                        Kelola Kuota
                                    </a>
                                @endif
                            </div>
                        </div>
                        @extends('admin.layout.modals')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Beasiswa</th>
                                        <th>Keterangan</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_beasiswa }}</td>
                                            <td>{{ Str::limit($item->ket, 60) }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td><button type="button"
                                                    class="btn btn-sm {{ $item->status == 'Aktif' ? 'btn-success' : 'btn-danger' }}">{{ $item->status }}</button>
                                            </td>
                                            <td>
                                                <div class=" btn-group">
                                                    @if ($item->status == 'Aktif')
                                                        <button url="{{ route('beasiswa.nonaktif', $item->id) }}"
                                                            type="button" class="btn btn-sm btn-primary status"
                                                            data-id="{{ $item->id }}">
                                                            Non Aktif
                                                        </button>
                                                    @endif
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#beasiswa{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button url="{{ route('beasiswa.delete', $item->id) }}"
                                                        type="button" class="btn btn-sm btn-danger delete"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        @foreach ($data as $item)
                            <div class="modal fade" id="beasiswa{{ $item->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit beasiswa</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('beasiswa.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Beasiswa</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->nama_beasiswa }}" name="nama_beasiswa"
                                                                placeholder="Masukan nama beasiswa" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pilih Tahun:</label>
                                                           <input type="number" 
                                                                id="tahun" 
                                                                name="tahun" 
                                                                class="form-control" 
                                                                min="2025" 
                                                                required
                                                                oninvalid="this.setCustomValidity('Tahun tidak boleh kurang dari 2025')" 
                                                                oninput="this.setCustomValidity('')">
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->ket }}" name="ket"
                                                                placeholder="Masukan keterangan" required>
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


