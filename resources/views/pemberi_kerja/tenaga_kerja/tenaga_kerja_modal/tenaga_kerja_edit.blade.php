<form id="frmEditTenagaKerja">
    <div class="modal-header">
        <h4 class="modal-title"> Edit Tenaga Kerja </h4> <button aria-hidden="true" class="close"
            data-dismiss="modal" type="button"> × </button>
    </div>
    <div class="modal-body">
        <div class="form-group"> <label> Nomor Induk Kependudukan </label> <input class="form-control" id="nik_edit"
                name="nik_edit" required="" type="text" value="{{ $tenaga_kerjas->nik }}"> </input> </div>
        <div class="form-group"> <label> Nama Lengkap </label> <input class="form-control" id="nama_lengkap_edit"
                name="nama_lengkap_edit" required="" type="text" value="{{ $tenaga_kerjas->nama_lengkap }}"> </input>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <select id="id_jabatan_edit" class="form-control" name="id_jabatan_edit" required="">
                @foreach ($jabatans as $jb)
                    <option value="{{ $jb->id }}">{{ $jb->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <select id="pendidikan_edit" class="form-control" name="pendidikan_edit" required="">
                <option value="{{ $tenaga_kerjas->pendidikan }}">{{ $tenaga_kerjas->pendidikan }}</option>
                <option value="SD">SD</option>
                <option value="SLTP">SLTP</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select id="status_pekerja_edit" class="form-control" name="status_pekerja" required="">
                <option value="{{ $tenaga_kerjas->status_pekerja }}">{{ $tenaga_kerjas->status_pekerja }}</option>
                <option value="PKWTT">PKWTT</option>
                <option value="PKWTT">PKWT</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select id="jenis_kelamin_edit" class="form-control" name="jenis_kelamin_edit" required="">
                <option value="{{ $tenaga_kerjas->jenis_kelamin }}">{{ $tenaga_kerjas->jenis_kelamin }}</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bekerja">Sedang Bekerja?</label> <br>
            <div class="form-check form-check-inline">
                <label for="bekerja">
                    <input type="radio" name="bekerja" value="Bekerja" id="bekerja" @if ($tenaga_kerjas->bekerja == 'Bekerja') checked @endif> Bekerja

                    <input type="radio" name="bekerja" value="Belum Bekerja" id="bekerja" @if ($tenaga_kerjas->bekerja == 'Belum Bekerja') checked @endif>
                    Belum Bekerja
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="disabilitas">Apakah Disabilitas?</label> <br>
            <div class="form-check form-check-inline">
                <label for="disabilitas">
                    <input type="radio" name="disabilitas" value="Disabilitas" id="disabilitas"
                        @if ($tenaga_kerjas->disabilitas == 'Disabilitas') checked @endif> Disabilitas
                    <input type="radio" name="disabilitas" value="Tidak Disabilitas" id="disabilitas"
                        @if ($tenaga_kerjas->disabilitas == 'Tidak Disabilitas') checked @endif> Tidak Disabilitas
                </label>
            </div>
        </div>
        <div class="form-group"><label> Tanggal Lahir </label> <input class="form-control" id="tgl_lahir_edit"
                name="tgl_lahir_edit" required="" type="date" value="{{ $tenaga_kerjas->tgl_lahir }}"></div>
        <div class="form-group"><label> Tanggal Diterima </label> <input class="form-control"
                id="tgl_diterima_edit" name="tgl_diterima_edit" required="" type="date"
                value="{{ $tenaga_kerjas->tgl_diterima }}"></div>
        <div class="form-group"> <label> Alamat </label> <textarea class="form-control"
                id="alamat_tenaga_kerja_edit" name="alamat_tenaga_kerja_edit" required="" type="text"
                >{{ $tenaga_kerjas->alamat }}</textarea>
        </div>
    </div>
    
    <div class="modal-footer"> 
        <input id="tenaga_kerja_edit_id" name="tenaga_kerja_edit_id" type="hidden" value="0">
        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel"> 
        <button class="btn btn-info"
            id="btn-edit" type="button"> simpan </button> </input>
        </input>
    </div>
</form>
