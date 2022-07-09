<div class="modal fade" id="addJabatanModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddJabatan">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah Jabatan Baru </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag">
                        <ul id="add-jabatan-errors"> </ul>
                    </div>
                    <div class="form-group"> <label> Nama </label> <input class="form-control" id="nama" name="nama"
                            required="" type="text"> </input> </div>
                </div>
                <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                        value="Cancel"> <button class="btn btn-info" id="btn-add" type="button" value="add"> Buat Jabatan </button> </input> </div>
            </form>
        </div>
    </div>
</div>
