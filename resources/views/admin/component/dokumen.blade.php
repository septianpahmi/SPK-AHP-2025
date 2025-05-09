@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dokumen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dokumen</li>
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
                            <h3 class="card-title">Tabel data dokumen</h3>
                        </div>
                        @extends('admin.layout.modals')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>SKTM</th>
                                        <th>Dokumen Lainnya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->idSiswa->name }}</td>
                                            <td><iframe src="/file/sktm/{{ $item->sktm }}" frameborder="0"
                                                    class="img-fluid mb-2" alt="black sample"></iframe><a
                                                    href="/file/sktm/{{ $item->sktm }}" type="button"
                                                    class="btn btn-success" download> <i class="fas fa-download"></i>
                                                    Download</a></td>
                                            <td>
                                                <iframe src="/file/dok_lainnya/{{ $item->dok_lainnya }}" frameborder="0"
                                                    class="img-fluid mb-2" alt="black sample"></iframe><a
                                                    href="/file/dok_lainnya/{{ $item->dok_lainnya }}" type="button"
                                                    class="btn btn-success" download> <i class="fas fa-download"></i>
                                                    Download</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
