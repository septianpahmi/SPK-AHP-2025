@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pendaftaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

            @if($beasiswa && $kelas)
            <form id="pendaftaranForm" action="{{ route('pendaftaran.store', $beasiswa->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-8">
                        {{-- Informasi Peserta --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Informasi peserta</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Siswa<code>*</code></label>
                                            <input type="text" value="{{ Auth::user()->name ?? '' }}" class="form-control"
                                                name="nama" placeholder="Masukan nama">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NIS<code>*</code></label>
                                            <input type="text" value="{{ Auth::user()->nis ?? '' }}" class="form-control"
                                                name="nis" placeholder="Masukan NIS" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kelas<code>*</code></label>
                                           <input type="text" value="{{ $kelas->tingkat ?? '' }} - {{ $kelas->kelas ?? '' }}" class="form-control" name="kelas_id" readonly>

                                                
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin<code>*</code></label>
                                            <select class="form-control" name="gender">
                                                <option value="L" {{ (isset($siswa) && $siswa->gender == 'L') ? 'selected' : '' }}>Laki - Laki</option>
                                                <option value="P" {{ (isset($siswa) && $siswa->gender == 'P') ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir<code>*</code></label>
                                            <input type="text"
                                                value="{{ $siswa->tempat_lahir ?? '' }}"
                                                class="form-control" placeholder="Masukan tempat lahir"
                                                name="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir<code>*</code></label>
                                            <input type="date"
                                                value="{{ $siswa->tgl_lahir ?? '' }}"
                                                class="form-control" placeholder="Masukan tanggal lahir"
                                                name="tgl_lahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Alamat<code>*</code></label>
                                            <input type="text" value="{{ $siswa->alamat ?? '' }}"
                                                class="form-control" placeholder="Masukan alamat lengkap"
                                                name="alamat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Dokumen Pendukung --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Dokumen Pendukung</div>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Surat Keterangan Tidak Mampu (SKTM) <code>*</code></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="sktm" accept=".pdf">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Dokumen Pendukung lainnya</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="dok_lainnya" accept=".pdf">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        {{-- Informasi Orang Tua --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Informasi Orang Tua/Wali Siswa</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Ayah<code>*</code></label>
                                    <input type="text" value="{{ $siswa->nama_ayah ?? '' }}" class="form-control" name="nama_ayah" placeholder="Masukan nama ayah">
                                </div>
                                <div class="form-group">
                                    <label>Nama Ibu<code>*</code></label>
                                    <input type="text" value="{{ $siswa->nama_ibu ?? '' }}" class="form-control" name="nama_ibu" placeholder="Masukan nama ibu">
                                </div>
                            </div>
                        </div>

                        {{-- Informasi Lainnya --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Informasi Lainnya</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pekerjaan Orang Tua<code>*</code></label>
                                    <select class="form-control" name="pekerjaan">
                                        @foreach ($subkriteria as $sub)
                                            @if ($sub->id_kriteria == 3)
                                                <option value="{{ $sub->nilai }}">{{ $sub->subkriteria }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan Orang Tua<code>*</code></label>
                                    <select class="form-control" name="penghasilan">
                                        @foreach ($subkriteria as $sub)
                                            @if ($sub->id_kriteria == 1)
                                                <option value="{{ $sub->nilai }}">{{ $sub->subkriteria }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggungan<code>*</code></label>
                                    <select class="form-control" name="tanggungan">
                                        @foreach ($subkriteria as $sub)
                                            @if ($sub->id_kriteria == 2)
                                                <option value="{{ $sub->nilai }}">{{ $sub->subkriteria }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Asset<code>*</code></label>
                                    <select class="form-control" name="asset">
                                        @foreach ($subkriteria as $sub)
                                            @if ($sub->id_kriteria == 4)
                                                <option value="{{ $sub->nilai }}">{{ $sub->subkriteria }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-group btn-block">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>

            @else
                <p class="text-danger">Beasiswa atau data kelas siswa tidak tersedia. Mohon periksa data Anda.</p>
            @endif

        </div>
    </section>
</div>

@include('admin.partial.footer')
