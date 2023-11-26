<!-- Modal Edit pengumuman -->
<div class="iziModal" id="modal-editpengumuman" data-iziModal-title="Edit Pengumuman">
    <div class="p-3">
        <form class="form-group" method="post" action="{{url('/edit/pengumuman')}}">
            @csrf
            <div class="form-group">
                <label class="form-label">Judul Pengumuman</label>
                <input class="form-control" type="text" name="judul_pengumuman" required>
                <small class="text-secondary">Dibutuhkan *</small>
            </div>
            <div class="form-group">
                <label class="form-label">Isi pengumuman</label>
                <textarea class="form-control" type="text" name="isi_pengumuman" required></textarea>
                <small class="text-secondary">Dibutuhkan *</small>
            </div>
			<div class="form-group">
                <label class="form-label">Tanggal dibuat</label>
    			<input class="form-control" type="date" name="tgl_pengumuman" placeholder="mm-dd-yyyy" required>
				<small class="text-secondary">Dibutuhkan *</small>
            </div>
            <input type="hidden" name="data-id">
            <div class="clearfix">
                <div class="float-right">
                    <button class="btn btn-outline-success btn-outline btn-sm">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
