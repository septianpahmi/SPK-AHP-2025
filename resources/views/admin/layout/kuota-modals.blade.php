<div class="modal fade" id="kuota">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kuota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kuota.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Beasiswa</label>
                                <select type="text" class="form-control" name="id_beasiswa"
                                    placeholder="Masukan nama kriteria" required>
                                    <option value="">Pilih Beasiswa</option>
                                    @foreach ($beasiswa as $item)
                                        <option value="{{ $item->id }}" @readonly(true)>
                                            {{ $item->nama_beasiswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select type="text" class="form-control" name="id_kelas"
                                    placeholder="Masukan nama kriteria" required>
                                    <option value="" @readonly(true)>Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->tingkat }} {{ $item->jurusan }}
                                            {{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Kuota</label>
                                <input type="number" class="form-control" name="kuota" placeholder="Masukan kuota"
                                    required>
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
