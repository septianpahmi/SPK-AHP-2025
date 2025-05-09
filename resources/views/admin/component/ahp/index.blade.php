@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Normalisai Matrik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'analisis' }}">Analisis</a></li>
                        <li class="breadcrumb-item active">Normalisai Matrik</li>
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
                            <h3 class="card-title">Tabel Normalisai Matrik</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('postmatriks') }}" method="POST">
                                @csrf

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Variabel</th>
                                            <th>Pekerjaan</th>
                                            <th>Penghasilan</th>
                                            <th>Tanggungan</th>
                                            <th>Asset</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td><input type="number" class="form-control" name="k1"
                                                    value="{{ $k1 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k2"
                                                    value="{{ $k2 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k3"
                                                    value="{{ $k3 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k4"
                                                    value="{{ $k4 }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan</td>
                                            <td><input type="number" class="form-control" name="k5"
                                                    value="{{ $k5 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k6"
                                                    value="{{ $k6 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k7"
                                                    value="{{ $k7 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k8"
                                                    value="{{ $k8 }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggungan</td>
                                            <td><input type="number" class="form-control" name="k9"
                                                    value="{{ $k9 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k10"
                                                    value="{{ $k10 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k11"
                                                    value="{{ $k11 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k12"
                                                    value="{{ $k12 }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Asset</td>
                                            <td><input type="number" class="form-control" name="k13"
                                                    value="{{ $k13 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k14"
                                                    value="{{ $k14 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k15"
                                                    value="{{ $k15 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k16"
                                                    value="{{ $k16 }}" readonly></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th><input type="number" class="form-control" name="k17"
                                                    value="{{ $k17 }}" readonly></th>
                                            <th><input type="number" class="form-control" name="k18"
                                                    value="{{ $k18 }}" readonly></th>
                                            <th><input type="number" class="form-control" name="k19"
                                                    value="{{ $k19 }}" readonly></th>
                                            <th><input type="number" class="form-control" name="k20"
                                                    value="{{ $k20 }}" readonly></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block">Normalisasi</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-warning btn-block"
                                            onclick="kembalibobot();">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script>
                            function kembalibobot() {
                                window.location.href = "/analisis";
                            }
                        </script>
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
