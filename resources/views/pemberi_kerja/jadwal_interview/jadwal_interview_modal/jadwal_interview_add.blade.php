<div class="modal fade" id="addJadwalInterviewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddJadwalInterview">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah Jadwal Interview </h4> <button aria-hidden="true"
                        class="btn-close" data-bs-dismiss="modal" type="button"> </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="alert alert-danger" id="add-error-bag">
                            <ul id="add-jadwal-interview-errors"> </ul>
                        </div>
                        <div class="form-group">
                            <label>Lowongan kerja yang mana </label>
                            <select id="id_lowongan_kerja_jadwal" class="form-control" name="id_lowongan_kerja_jadwal"
                                required="">
                                <option value=""></option>
                                @if ($data_pemberi_kerjas)
                                    @foreach ($lowongan_kerjas as $lk)
                                        <option value="{{ $lk->id }}">{{ $lk->judul_pekerjaan }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group"> <label> Nama Interview </label> <input class="form-control"
                                id="nama_interview" name="nama_interview" required="" type="text">
                            </input> </div>
                        <div class="form-group"> <label> Tanggal Interview </label> <input class="form-control"
                                id="tanggal_interview" name="tanggal_interview" required="" type="datetime-local">
                            </input> </div>
                        <div class="form-group"> <label> Tempat Interview </label> <input class="form-control"
                                id="alamat_interview" name="alamat_interview" required="" type="text">
                            </input> </div>
                        <div class="form-group"> <label> Detail Interview/ Keperluan yang harus dibawa </label>
                            <textarea name="keterangan_jadwal" id="keterangan_jadwal" cols="53" rows="5" size="5"></textarea>
                            </input>
                        </div>
                        <div class="modal-footer"> <input class="btn btn-default" data-dismiss="modal" type="button"
                                value="Cancel"> <button class="btn btn-info" id="btn-add-jadwal" type="button"
                                value="add">
                                Simpan
                            </button> </input> </div>
                    </div>
            </form>
        </div>
    </div>
</div>
