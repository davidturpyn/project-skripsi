<div class="modal fade" id="addSertifikatModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddSertifikat">
                <div class="modal-header">
                    <h4 class="modal-title"> Sertifikat </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag" hidden>
                        <ul id="add-sertifikat-errors"> </ul>
                    </div>
                    <div class="form-group"> <label> Program Sertifikat </label> <input class="form-control"
                            id="program_sertifikat" name="program_sertifikat" required="" type="text"> </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lembaga_sertifikat">Lembaga Sertifikat</label>
                            <input class="form-control" id="lembaga_sertifikat" name="lembaga_sertifikat" required="" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nilai">Nilai</label>
                            <input class="form-control" id="nilai" name="nilai" required="" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl_diterbitkan">Tanggal Terbit</label>
                            <input class="form-control" id="tgl_diterbitkan" name="tgl_diterbitkan" required="" type="month">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_berakhir">Tanggal Berakhir</label>
                            <input class="form-control" id="tgl_berakhir" name="tgl_berakhir" required="" type="month">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Dokumen Sertifikat</label>
                        <div class="input-group md-3">
                            <input type="file" class="form-control" id="dokumen_sertifikat" >
                            <label class="input-group-text" for="dokumen_sertifikat">Upload</label>
                        </div>
                    </div>
                    <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                            value="Cancel"> <button class="btn btn-info" id="btn-add-sertifikat" type="button"
                            value="add"> Tambah Sertifikat </button> </div>
            </form>
        </div>
    </div>
</div>
