@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Kriteria</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'kriteria' }}">Kriteria</a></li>
                        <li class="breadcrumb-item active">Sub Kriteria</li>
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
                            <h3 class="card-title">{{$kriteria->nama_kriteria}}</h3>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subkriteria">
                                    Tambah sub kriteria
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="subkriteria">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Sub Kriteria</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('subkriteria.post',$kriteria->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label>Nama Sub Kriteria</label>
                                                  <input type="text" class="form-control" name="subkriteria" placeholder="Masukan nama sub kriteria" required>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label>Bobot/ Nilai</label>
                                                  <input type="text" class="form-control" name="nilai" placeholder="Masukan nilai" required>
                                                </div>
                                              </div>
                                          </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                        
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Sub Kriteria</th>
                                        <th>Bobot/ Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->subkriteria}}</td>
                                            <td>{{$item->nilai}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button url="{{route('subkriteria.delete',$item->id)}}" type="button" class="btn btn-danger delete" data-id="{{ $item->id }}">
                                                      <i class="fas fa-trash"></i>
                                                    </button>
                                                  </div>
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
