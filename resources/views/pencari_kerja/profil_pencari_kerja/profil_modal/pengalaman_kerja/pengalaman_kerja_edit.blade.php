<div class="modal fade" id="editPengalamanKerjaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditPengalamanKerja">
                <div class="modal-header">
                    <h4 class="modal-title"> Pengalaman Kerja </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag" hidden>
                        <ul id="edit-pengalaman-kerja-errors"> </ul>
                    </div>
                    <div class="form-group"> <label> Pekerjaan </label> <input class="form-control" id="pekerjaan"
                            name="pekerjaan" required="" type="text"> </div>
                    <div class="form-group"> <label> Perusahaan </label> <input class="form-control"
                            id="perusahaan" name="perusahaan" required="" type="text"> </div>
                    <div class="form-group">
                        <label>Tipe Pekerjaan</label>
                        <select id="tipe_pekerjaan_pengalaman" class="form-control" name="tipe_pekerjaan_pengalaman"
                            required="">
                            <option value="Intership">Intership</option>
                            <option value="Magang kerja">Magang kerja</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>
                    <div class="form-group"> <label> Lokasi </label> <input class="form-control" id="lokasi"
                            name="lokasi" required="" type="text"> </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dari_tanggal">Dari</label>
                            <input class="form-control" id="dari_tanggal" name="dari_tanggal" required=""
                                type="month">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sampai_tanggal">Sampai</label>
                            <input class="form-control" id="sampai_tanggal" name="sampai_tanggal" required=""
                                type="month">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group md-3">
                            <input class="form-check-input" type="checkbox" value="" id="bekerja_saat_ini"
                                name="bekerja_saat_ini">
                            <label class="form-check-label" for="bekerja_saat_ini">
                                Saat ini saya bekerja dengan pekerjaan ini
                            </label>
                        </div>
                    </div>
                    <div class="form-group"> <label> Deskripsi </label>
                        <textarea class="form-control h-100" id="deskripsi_pengalaman_kerja" name="deskripsi_pengalaman_kerja" required=""
                            type="text"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Riwayat Pekerjaan</label>
                        <div class="input-group md-3" id="upload_bukti_riwayat_pekerjaan">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="bukti_riwayat_pekerjaan">
                                <label class="custom-file-label" for="bukti_riwayat_pekerjaan">Upload</label>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" id="btn_dokumen_riwayat_kerja" class="btn btn-light dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu" aria-labelledby="btn_dokumen_riwayat_kerja">
                                <li><a class="dropdown-item" id="btn_dokumen_riwayat_kerja_download">Download</a></li>
                                <li><a type="button" class="dropdown-item" id="btn_dokumen_riwayat_kerja_edit">Edit</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer"> <input id="id_pengalaman" name="id_pengalaman" type="hidden">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                        <button class="btn btn-info" id="btn-edit-pengalaman-kerja" type="button" value="add"> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
