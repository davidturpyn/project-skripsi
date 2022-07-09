<div class="modal fade" id="showDetailPerusahaanModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="frmShowDetailPerusahaan">
                <div class="modal-header">
                    <h4 class="modal-title"> Detail Perusahaan </h4>
                    <button aria-hidden="true" class="close"
            data-dismiss="modal" type="button"> Tutup </button>
                </div>
                <div class="modal-body">
                    <div class="form-group"> <img src="" id="url_banner" name="url_banner" width="100%"></div>
                    <div class="form-group"> <img src="{{ asset("storage/".Auth::user()->url_foto_profile) }}" width="100%"></div>
                    <div class="form-group"> <b><label id="nama" name="nama" value> </label></div></b>

                    <div class="form-group">
                        <b><label>Deskripsi Perusahaan</label></b>
                        <label id="tentang_perusahaan" name="tentang_perusahaan" value> </label>
                    </div>

                    <div class="form-group">
                        <b><label>Kontak</label></b>
                        <label id="tlpn_perusahaan" name="tlpn_perusahaan" value> </label>
                        <label id="email_perusahaan" name="email_perusahaan" value> </label>
                        <label id="wesbite_perusahaan" name="wesbite_perusahaan" value> </label>
                    </div>

                    <div class="form-group"> <b><label id="nama_jalan" name="nama_jalan" value> </label></div></b>
                    <div class="form-group"> <b><label id="jenis_industri" name="jenis_industri" value> </label></div></b>
                    <div class="form-group"> <b><label id="kota" name="kota" value> </label></div></b>
                    <div class="form-group"> <b><label id="provinsi" name="provinsi" value> </label></div></b>
                </div>
            </form>
            
        </div>
    </div>
</div>
