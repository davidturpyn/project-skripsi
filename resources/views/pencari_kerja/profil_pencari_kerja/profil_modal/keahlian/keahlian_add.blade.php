<div class="modal fade" id="addKeahlianModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddKeahlian">
                <div class="modal-header">
                    <h4 class="modal-title"> keahlian </h4> <button aria-hidden="true" class="close"
                        data-dismiss="modal" type="button"> × </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag" hidden>
                        <ul id="add-keahlian-errors"> </ul>
                    </div>
                    <div class="form-group">
                        <label>Cari keahlian</label>
                        <select class="responsive" name="macam_keahlian[]" id="macam_keahlian" multiple="multiple">
                            <option value=""></option>
                            @foreach ($macam_keahlians as $mk)
                                <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                            value="Cancel"> <button class="btn btn-info" id="btn-add-keahlian" type="button"
                            value="add"> Tambah Keahlian</button> </div>
            </form>
        </div>
    </div>
</div>
