<div class="modal fade" id="editPhotoProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmUpdatePhotoProfile">
                <div class="modal-header">
                    <h4 class="modal-title"> Photo Profile </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag" hidden>
                        <ul id="edit-photo-profile-errors"> </ul>
                    </div>
                    <div class="form-group">
                        <label>Ubah Foto Profil</label>
                        <input id="imgPhotoProfile" type="file" name="imgPhotoProfile" class="form-control" accept="image/jpeg">
                    </div>
                    <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                            value="Cancel"> <button class="btn btn-info" id="btn-edit-photo-profile" type="button"
                            value="edit">Simpan</button> </div>
            </form>
        </div>
    </div>
</div>
