@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cek Konsistensi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('analisis') }}">Analisis</a></li>
                        <li class="breadcrumb-item active">Cek Konsistensi</li>
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
                            <h3 class="card-title">Tabel Konsistensi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('posthasilrekomendasi') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="beasiswa">Pilih Beasiswa yang akan dihitung</label>
                                    <select name="beasiswa" id="beasiswa" name="beasiswa" class="form-control">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_beasiswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Variabel</th>
                                            <th>Penghasilan</th>
                                            <th>Tanggungan</th>
                                            <th>Pekerjaan</th>
                                            <th>Asset</th>
                                            <th>Jumlah Per Baris</th>
                                            <th>Prioritas</th>
                                            <th>Hasil</th>
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
                                            <td><input type="number" class="form-control" name="k25"
                                                    value="{{ $k25 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k21"
                                                    value="{{ $k21 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="hs1"
                                                    value="{{ $hs1 }}" readonly></td>
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
                                            <td><input type="number" class="form-control" name="k26"
                                                    value="{{ $k26 }}" readonly></td> 
                                            <td><input type="number" class="form-control" name="k22"
                                                    value="{{ $k22 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="hs2"
                                                    value="{{ $hs2 }}" readonly></td>
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
                                            <td><input type="number" class="form-control" name="k27"
                                                    value="{{ $k27 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k23"
                                                    value="{{ $k23 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="hs3"
                                                    value="{{ $hs3 }}" readonly></td>
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
                                            <td><input type="number" class="form-control" name="k28"
                                                    value="{{ $k28 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="k24"
                                                    value="{{ $k24 }}" readonly></td>
                                            <td><input type="number" class="form-control" name="hs4"
                                                    value="{{ $hs4 }}" readonly></td>
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
                                            <th><input type="number" class="form-control" name="" readonly>
                                            </th>
                                            <th><input type="number" class="form-control" name="" readonly>
                                            </th>
                                            <th><input type="number" class="form-control" name="hs5"
                                                    value="{{ $hs5 }}" readonly></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nilai Ci</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $cr }}</td>
                                            @if ($cr < 0.1)
                                                <td><button type="button"
                                                        class="btn btn-sm btn-outline-success">KONSISTEN</button></td>
                                            @else
                                                <td><button type="button" class="btn btn-sm btn-outline-danger">TIDAK
                                                        KONSISTEN</button></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="lead">Keterangan:</p>
                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            Jika nilai <code>CI/CR</code> dibawah dari 10% maka konsistensi hirarki
                                            dapat ditermia. namun, jikda diatas 10% penilaian data judgment harus
                                            diperbaiki. <br><br>
                                            Jika nilai <code>CR <= 0.1</code> maka maka matrik tersebut dinyatakan
                                                    konsisten,
                                                    apabila nilai <code>CR > 0.1</code> maka matrik tersebut dinyatakan
                                                    tidak konsisten.
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block">Proses AHP</button>
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
