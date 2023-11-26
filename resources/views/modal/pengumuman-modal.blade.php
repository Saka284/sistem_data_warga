<!--Modal Tambah RT-->
<div class="iziModal" id="modal-tambahpengumuman" data-iziModal-title="Tambah Pengumuman">
	<div class="p-3">
		<form class="form-group" method="post" action="{{url('/tambah/pengumuman')}}">
			@csrf
			<div class="form-group">
				<label class="form-label">Judul Pengumuman</label>
				<input class="form-control" type="text" name="judul_pengumuman" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">Isi Pengumuman</label>
				<textarea class="form-control" name="isi_pengumuman" required></textarea>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
            <div class="form-group">
                <label class="form-label">Tanggal dibuat</label>
    			<input class="form-control" type="date" name="tgl_pengumuman" placeholder="mm-dd-yyyy" required>
            </div>
			<div class="clearfix">
				<div class="float-right">
					<button type="submit" class="btn btn-outline-primary btn-outline btn-sm">Tambah Data</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!--Modal Hapus Data-->
<div class="iziModal" id="modal-hapusdata" data-iziModal-title="Hapus Data">
	<div class="p-3">
		<div class="alert alert-danger">
			<h5 class="alert-heading">Peringatan</h5>
			<p>Apakah anda yakin ingin menghapus data ini?<br> Klik hapus untuk melanjutkan!</p>
		</div>
		<div class="clearfix">
			<div class="float-right">
				<div class="btn-group">
					<button class="btn btn-danger btn-sm" id="next">Hapus</button>
					<button class="btn btn-secondary btn-sm" id="cancel">Batal</button>
				</div>
			</div>
		</div>
	</div>
</div>

