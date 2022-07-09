<div class="modal fade" id="editKeahlianModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditKeahlian">
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
                        <select class="responsive" name="macam_keahlian_edit[]" id="macam_keahlian_edit"
                            multiple="multiple">
                            @if ($profils)
                                @foreach ($macam_keahlians as $mk)
                                    @if (in_array($mk->id, array_column($keahlian_pencari_kerjas->toArray(), 'id')))
                                        <option value="{{ $mk->id }}" selected>{{ $mk->nama }}</option>
                                    @else
                                        <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                            value="Cancel"> <button class="btn btn-info" id="btn-edit-keahlian" type="button"
                            value="add"> Edit Keahlian</button> </div>
            </form>
        </div>
    </div>
</div>
