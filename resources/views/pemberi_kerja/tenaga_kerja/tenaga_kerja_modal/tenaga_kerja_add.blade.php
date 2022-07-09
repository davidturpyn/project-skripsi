<div class="modal fade" id="addTenagaKerjaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddTenagaKerja">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah Tenaga Kerja Baru </h4> <button aria-hidden="true"
                        class="btn-close" data-bs-dismiss="modal" type="button"> </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="alert alert-danger" id="add-error-bag">
                            <ul id="add-tenaga-kerja-errors"> </ul>
                        </div>
                        <div class="form-group"> <label> Nomor Induk Kependudukan </label> <input
                                class="form-control" id="nik" name="nik" required="" type="text"> </input> </div>
                        <div class="form-group"> <label> Nama Lengkap </label> <input class="form-control"
                                id="nama_lengkap" name="nama_lengkap" required="" type="text"> </input> </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select id="id_jabatan" class="form-control" name="id_jabatan" required="">
                                <option value=""></option>
                                @foreach ($jabatans as $jb)
                                    <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <select id="pendidikan" class="form-control" name="pendidikan" required="">
                                <option value=""></option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select id="status_pekerja" class="form-control" name="status_pekerja" required="">
                                <option value=""></option>
                                <option value="PKWTT">PKWTT</option>
                                <option value="PKWTT">PKWT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select id="jenis_kelamin_add" class="form-control" name="jenis_kelamin_add" required="">
                                <option value=""></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bekerja">Sedang Bekerja?</label> <br>
                            <div class="form-check form-check-inline">
                                <label for="bekerja">
                                    <input type="radio" name="bekerja" value="Bekerja" id="bekerja"> Bekerja
                                    <input type="radio" name="bekerja" value="Belum Bekerja" id="bekerja"> Belum Bekerja
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="disabilitas">Apakah Disabilitas?</label> <br>
                            <div class="form-check form-check-inline">
                                <label for="disabilitas">
                                    <input type="radio" name="disabilitas" value="Disabilitas" id="Disabilitas"> Disabilitas
                                    <input type="radio" name="disabilitas" value="Tidak Disabilitas" id="Disabilitas"> Tidak Disabilitas
                                </label>
                            </div>
                        </div>
                        <div class="form-group"><label> Tanggal Lahir </label> <input class="form-control"
                                id="tgl_lahir" name="tgl_lahir" required="" type="date"></div>
                        <div class="form-group"><label> Tanggal Diterima </label> <input class="form-control"
                                id="tgl_diterima" name="tgl_diterima" required="" type="date"></div>
                        <div class="form-group"> <label> Alamat </label> <textarea class="form-control"
                                id="alamat_tenaga_kerja" name="alamat_tenaga_kerja" required="" type="text"> </textarea>
                        </div>
                    </div>
                    <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                            value="Cancel"> <button class="btn btn-info" id="btn-add" type="button" value="add">
                            Simpan
                        </button> </input> </div>
                </div>
            </form>
        </div>
    </div>
</div>
