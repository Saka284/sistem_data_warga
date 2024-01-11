<!--Modal Tambah RT-->
<div class="iziModal" id="modal-tambahtamu" data-iziModal-title="Tambah Tamu">
	<div class="p-3">
		<form class="form-group" method="post" action="{{url('/tambah/tamu')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="form-label">Nama Lengkap</label>
				<input class="form-control" type="text" name="nama_lengkap" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">Nomer Telepon</label>
				<input class="form-control" type='number' name="nomer_telp" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
            <div class="form-group">
                <label class="form-label">Tanggal dibuat</label>
    			<input class="form-control" type="date" name="tanggal" required>
            </div>
            <div class="form-group">
                <label class="form-label">Tujuan</label>
    			<textarea class="form-control" name="tujuan"required></textarea>
                <small class="text-secondary">Dibutuhkan *</small>
            </div>
            <div class="form-group">
                <label class="form-label">Foto</label>
    			<input class="form-control" type="file" name="image" required>
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
				<div>
					<button class="btn btn-danger btn-sm" id="next">Hapus</button>
					<button class="btn btn-secondary btn-sm" id="cancel">Batal</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Modal edit status tamu-->
<div class="iziModal" id="modal-statustamu" data-iziModal-title="Status Tamu">
    <div class="p-3">
        <div class="alert alert-primary">
            <h5 class="alert-heading" style="color: black">Peringatan</h5>
            <p style="color: black">Apakah anda yakin ingin mengubah status data ini menjadi <b>"Keluar"</b>?<br> Klik Oke untuk melanjutkan!</p>
        </div>
        <div class="clearfix">
            <div class="float-right">
                <div>
                    <button class="btn btn-primary btn-sm" id="oke">Oke</button>
                    <button class="btn btn-secondary btn-sm" id="batal" >Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>


