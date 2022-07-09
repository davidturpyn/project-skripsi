<div class="modal fade" id="addPengalamanKerjaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddPengalamanKerja" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title"> Pengalaman Kerja </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag" hidden>
                        <ul id="add-pengalaman-kerja-errors"> </ul>
                    </div>
                    <div class="form-group"> <label> Pekerjaan </label> <input class="form-control" id="pekerjaan"
                            name="pekerjaan" required="" type="text"> </div>
                    <div class="form-group"> <label> Perusahaan </label> <input class="form-control"
                            id="perusahaan" name="perusahaan" required="" type="text"> </div>
                    <div class="form-group">
                        <label>Tipe Pekerjaan</label>
                        <select id="tipe_pekerjaan" class="form-control" name="tipe_pekerjaan" required="">
                            <option value=""></option>
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
                            <input class="form-control" id="sampai_tanggal" name="sampai_tanggal"
                                type="month">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group md-3">
                            <input class="form-check-input" type="checkbox" value="" id="bekerja_saat_ini" name="bekerja_saat_ini">
                            <label class="form-check-label" for="bekerja_saat_ini">
                                Saat ini saya bekerja dengan pekerjaan ini
                            </label>
                        </div>
                    </div>
                    <div class="form-group"> <label> Deskripsi </label>
                        <textarea class="form-control h-100" id="deskripsi_pengalaman" name="deskripsi_pengalaman" required=""
                            type="text"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Riwayat Pekerjaan</label>
                        <div class="input-group md-3">
                            <input type="file" class="form-control" id="bukti_riwayat_pekerjaan" >
                            <label class="input-group-text" for="bukti_riwayat_pekerjaan">Upload</label>
                        </div>
                    </div>
                    <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                            value="Cancel"> <button class="btn btn-info" id="btn-add-pengalaman-kerja" type="button"
                            value="add"> Tambah
                            Pengalaman Kerja </button> </div>
            </form>
        </div>
    </div>
</div>
