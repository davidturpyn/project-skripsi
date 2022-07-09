<div class="modal fade" id="editPendidikanModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditPendidikan">
                <div class="modal-header">
                    <h4 class="modal-title"> Pendidikan </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag" hidden>
                        <ul id="add-pendidikan-errors"> </ul>
                    </div>
                    <div class="form-group"> <label> Sekolah </label> <input class="form-control" id="sekolah"
                            name="sekolah" required="" type="text"> </div>
                    <div class="form-group"> <label> Bidang Studi </label> <input class="form-control" id="bidang_studi"
                            name="bidang_studi" required="" type="text"> </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tingkat</label>
                            <select id="tingkat_pendidikan" class="form-control" name="tingkat_pendidikan" required="">
                                <option value="SMK">SMK</option>
                                <option value="D1">D1</option>
                                <option value="S1">S1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="Profesi">Profesi</option>
                                <option value="SD atau Sederajat">SD atau Sederajat</option>
                                <option value="SMP atau Sederajat">SMP atau Sederajat</option>
                                <option value="SMA atau Sederajat">SMA atau Sederajat</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nilai">Nilai</label>
                            <input class="form-control" id="nilai" name="nilai" required="" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tahun_mulai">Tahun Mulai</label>
                            <input class="form-control" id="tahun_mulai" name="tahun_mulai" required=""
                                type="month">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tahun_selesai">Tahun Akhir</label>
                            <input class="form-control" id="tahun_selesai" name="tahun_selesai" required=""
                                type="month">
                        </div>
                    </div>
                    <div class="form-group"> <label> Lokasi </label> <input class="form-control" id="lokasi"
                            name="lokasi" required="" type="text"> </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label> Deskripsi </label> <textarea  rows="5" class="form-control h-100"
                                    id="deskripsi_pendidikan" name="deskripsi_pendidikan" required="" type="text"> </textarea> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label> Aktivitas dan Kegiatan Sosial </label> <textarea rows="5"
                                    class="form-control h-100" id="aktivitas_dan_kegiatan_sosial_pendidikan" name="aktivitas_dan_kegiatan_sosial_pendidikan" required=""
                                    type="text"> </textarea> </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ijazah</label>
                        <div class="input-group md-3" id="upload_ijazah">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="ijazah">
                                <label class="custom-file-label" for="ijazah">Upload</label>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" id="btn_ijazah" class="btn btn-light dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu" aria-labelledby="btn_ijazah">
                                <li><a class="dropdown-item" id="btn_ijazah_download">Download</a></li>
                                <li><a type="button" class="dropdown-item" id="btn_ijazah_edit">Edit</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer"> <input id="id_pendidikan" name="id_pendidikan" type="hidden"> <input
                        class="btn btn-default" data-dismiss="modal" type="button" value="Cancel"> <button
                        class="btn btn-info" id="btn-edit-pendidikan" type="button" value="add"> Simpan </button></div>
            </form>
        </div>
    </div>
</div>
