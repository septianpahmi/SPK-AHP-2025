@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alternativ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Alternativ</li>
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
                            <h3 class="card-title">Tabel data alternativ</h3>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#alternativ">
                                    Tambah alternativ
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
                                        <th>Penghasilan</th>
                                        <th>Tanggungan</th>
                                        <th>Pekerjaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->penghasilan}}</td>
                                            <td>{{$item->tanggungan}}</td>
                                            <td>{{$item->pekerjaan}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#alternativ{{$item->id}}">
                                                      <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button url="{{route('alternativ.delete',$item->id)}}" type="button" class="btn btn-danger delete" data-id="{{ $item->id }}">
                                                      <i class="fas fa-trash"></i>
                                                    </button>
                                                  </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        @foreach ($data as $item)                          
                        <div class="modal fade" id="alternativ{{$item->id}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Alternativ</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('alternativ.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label>Penghasilan</label>
                                                    <input type="text" class="form-control" value="{{$item->penghasilan}}" name="penghasilan" placeholder="Masukan penghasilan" required>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label>Tanggungan</label>
                                                    <input type="text" class="form-control" value="{{$item->tanggungan}}" name="tanggungan" placeholder="Masukan tanggungan" required>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                    <label>Pekerjaan</label>
                                                    <input type="text" class="form-control" value="{{$item->pekerjaan}}" name="pekerjaan" placeholder="Masukan pekerjaan" required>
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
