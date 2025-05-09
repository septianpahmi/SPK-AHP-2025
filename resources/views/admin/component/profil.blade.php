@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
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
                            <h3 class="card-title">Tabel data siswa</h3>
                            {{-- <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#siswa">
                                    Tambah
                                </button>
                            </div> --}}
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Kelas</th>
                                        <th>TTL</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nis }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->idKelas->tingkat }} {{ $item->idKelas->jurusan }}
                                                {{ $item->idKelas->kelas }}</td>
                                            <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</td>
                                            <td>{{ $item->nama_ayah }}</td>
                                            <td>{{ $item->nama_ibu }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#siswa{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button url="{{ route('profil.delete', $item->id) }}"
                                                        type="button" class="btn btn-danger delete"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        <div class="modal fade" id="siswa">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Siswa</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('profil-siswa.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5 class="mt-2 mb-2"><b>Infromasi Siswa</b></h5>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>NIS</label>
                                                        <input type="text" class="form-control" name="nis"
                                                            placeholder="Masukan NIS" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Siswa</label>
                                                        <select class="form-control" name="nama">
                                                            @foreach ($user as $sis)
                                                                <option value="{{ $sis->name }}">
                                                                    {{ $sis->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender">
                                                            <option value="Laki - Laki">
                                                                Laki - Laki</option>
                                                            <option value="Perempuan">
                                                                Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <select class="form-control" name="id_kelas">
                                                            @foreach ($kelas as $kl)
                                                                <option value="{{ $kl->id }}">
                                                                    {{ $kl->tingkat }} {{ $kl->jurusan }}
                                                                    {{ $kl->kelas }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Semester</label>
                                                        <input type="text" class="form-control" name="semester"
                                                            placeholder="Masukan semester" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tahun Masuk</label>
                                                        <input type="text" class="form-control" name="tahun_masuk"
                                                            placeholder="Masukan tahun masuk" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" class="form-control" name="tempat_lahir"
                                                            placeholder="Masukan tempat lahir" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control" name="tgl_lahir"
                                                            placeholder="Masukan tanggal lahir" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h5 class="mt-2 mb-2"><b>Infromasi Wali Siswa</b></h5>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Ayah</label>
                                                        <input type="text" class="form-control" name="nama_ayah"
                                                            placeholder="Masukan nama ayah" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Ayah</label>
                                                        <input type="text" class="form-control"
                                                            name="pekerjaan_ayah" placeholder="Masukan pekerjaan ayah"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Ibu</label>
                                                        <input type="text" class="form-control" name="nama_ibu"
                                                            placeholder="Masukan nama ibu" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan ibu</label>
                                                        <input type="text" class="form-control"
                                                            name="pekerjaan_ibu" placeholder="Masukan pekerjaan ibu"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Anak Ke</label>
                                                        <input type="text" class="form-control" name="anak_ke"
                                                            placeholder="Masukan anak keberapa" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara kandung</label>
                                                        <input type="text" class="form-control" name="saudara"
                                                            placeholder="Masukan jumlah saudara kandung" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea type="text" class="form-control" name="alamat" placeholder="Masukan alamat" required></textarea>
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
                        </div>
                        @foreach ($data as $item)
                            <div class="modal fade" id="siswa{{ $item->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit data siswa</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('profil.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h5 class="mt-2 mb-2"><b>Infromasi Siswa</b></h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>NIS</label>
                                                            <input type="text" class="form-control" name="nis"
                                                                value="{{ $item->nis }}" placeholder="Masukan NIS"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Siswa</label>
                                                            <select class="form-control" name="nama">
                                                                @foreach ($user as $sis)
                                                                    <option value="{{ $sis->name }}">
                                                                        {{ $sis->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select class="form-control" name="gender">
                                                                <option value="Laki - Laki">
                                                                    Laki - Laki</option>
                                                                <option value="Perempuan">
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <select class="form-control" name="id_kelas">
                                                                @foreach ($kelas as $kl)
                                                                    <option value="{{ $kl->id }}">
                                                                        {{ $kl->tingkat }} {{ $kl->jurusan }}
                                                                        {{ $kl->kelas }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Semester</label>
                                                            <input type="text" class="form-control"
                                                                name="semester" value="{{ $item->semester }}"
                                                                placeholder="Masukan semester" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tahun Masuk</label>
                                                            <input type="text" class="form-control"
                                                                name="tahun_masuk" value="{{ $item->tahun_masuk }}"
                                                                placeholder="Masukan tahun masuk" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir" value="{{ $item->tempat_lahir }}"
                                                                placeholder="Masukan tempat lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" class="form-control"
                                                                name="tgl_lahir" value="{{ $item->tgl_lahir }}"
                                                                placeholder="Masukan tanggal lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <h5 class="mt-2 mb-2"><b>Infromasi Wali Siwa</b></h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Ayah</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_ayah" value="{{ $item->nama_ayah }}"
                                                                placeholder="Masukan nama ayah" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pekerjaan Ayah</label>
                                                            <input type="text" class="form-control"
                                                                name="pekerjaan_ayah"
                                                                value="{{ $item->pekerjaan_ayah }}"
                                                                placeholder="Masukan pekerjaan ayah" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Ibu</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_ibu" value="{{ $item->nama_ibu }}"
                                                                placeholder="Masukan nama ibu" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Pekerjaan ibu</label>
                                                            <input type="text" class="form-control"
                                                                name="pekerjaan_ibu"
                                                                value="{{ $item->pekerjaan_ibu }}"
                                                                placeholder="Masukan pekerjaan ibu" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Anak Ke</label>
                                                            <input type="text" class="form-control" name="anak_ke"
                                                                value="{{ $item->anak_ke }}"
                                                                placeholder="Masukan anak keberapa" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Jumlah Saudara kandung</label>
                                                            <input type="text" class="form-control" name="saudara"
                                                                value="{{ $item->saudara }}"
                                                                placeholder="Masukan jumlah saudara kandung" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea type="text" class="form-control" name="alamat" value="{{ $item->alamat }}"
                                                                placeholder="Masukan alamat" required></textarea>
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
