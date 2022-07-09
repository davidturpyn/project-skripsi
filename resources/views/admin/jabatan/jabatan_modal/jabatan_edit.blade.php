<div class="modal fade" id="editJabatanModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditJabatan">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit Jabatan </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-jabatan-errors"> </ul>
                    </div>
                    <div class="form-group"> <label> Nama </label> <input class="form-control" id="nama" name="nama"
                            required="" type="text"> </input> </div>
                </div>
                <div class="modal-footer"> <input id="jabatan_id" name="jabatan_id" type="hidden" value="0"> <input
                        class="btn btn-default" data-dismiss="modal" type="button" value="Cancel"> <button
                        class="btn btn-info" id="btn-edit" type="button" value="add"> Perbarui Jabatan </button> </input>
                    </input> </div>
            </form>
        </div>
    </div>
</div>
