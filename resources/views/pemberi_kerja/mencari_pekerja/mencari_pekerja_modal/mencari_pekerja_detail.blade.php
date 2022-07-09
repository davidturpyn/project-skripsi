<div class="modal fade" id="showDetailPekerjaModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="frmShowDetailPekerja">
                <div class="modal-header">
                    <h4 class="modal-title"> Detail Pekerja </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button"> Tutup </button>
                </div>
                <div class="modal-body">
                    <div class="form-group"> <img src="{{ asset('storage/' . Auth::user()->url_foto_profile) }}"
                            width="100%"></div>
                    <div class="form-group"> <b><label id="nama" name="nama" value> </label></div></b>
                    <div class="form-group"> <b><label id="deskripsi_profil" name="deskripsi_profil" value> </label>
                    </div></b>
                    <div class="form-group"> <b><label id="agama" name="agama" value> </label></div></b>
                    <div class="form-group"> <b><label id="jenis_kelamin" name="jenis_kelamin" value> </label></div>
                    </b>
                    <div class="form-group">
                        <b>
                            <label id="tempat_lahir" name="tempat_lahir" value> </label>, <label id="tgl_lahir"
                                name="tgl_lahir" value>, </label>

                        </b>
                    </div>
                    <div class="form-group text-lowercase">
                        <b>
                            <label id="kota_dom" name="kota_dom" value> </label>, <label id="provinsi_dom"
                                name="provinsi_dom" value></label>
                        </b>
                    </div>
                    <div class="form-group text-lowercase">
                        <b>
                            <label id="kota_ktp" name="kota_ktp" value> </label>, <label id="provinsi_ktp"
                                name="provinsi_ktp" value></label>
                        </b>
                    </div>
                    <div class="form-group text-lowercase">
                        <b>
                            <label id="status" name="status" value> </label>
                        </b>
                    </div>
                    <div class="form-group text-lowercase">
                        <b>
                            <label id="telepon" name="telepon" value> </label>
                        </b> <br>
                        <b>
                            <label id="email" name="email" value> </label>
                        </b>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
