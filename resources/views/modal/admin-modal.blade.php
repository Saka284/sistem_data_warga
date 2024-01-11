<!--Modal Tambah RT-->
<div class="iziModal" id="modal-tambahrt" data-iziModal-title="Tambah RT">
	<div class="p-3">
		<form class="form-group" method="post" action="{{url('/tambah/rt')}}">
			@csrf
			<div class="form-group">
				<label class="form-label">Nama Lengkap</label>
				<input class="form-control" type="text" name="nama_lengkap" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">No RT</label>
				<input class="form-control" type="number" name="no_rt" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">No NIK</label>
				<input class="form-control" type="number" name="no_nik" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">No KK</label>
				<input class="form-control" type="number" name="no_kk" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">Tempat Tanggal Lahir</label>
				<input class="form-control" type="text" name="ttl" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label class="form-label">Jenis Kelamin</label>
						<select class="form-control" name="jenis_kelamin">
							<option value="">Pilih..</option>
							<option value="L">L</option>
							<option value="P">P</option>
						</select>
						<small class="text-secondary">Dibutuhkan *</small>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="form-label">Golongan Darah</label>
						<select class="form-control" name="golongan_darah">
							<option value="">Pilih..</option>
							<option value="-">Tidak Diketahui</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="AB">AB</option>
							<option value="O">O</option>
						</select>
						<small class="text-secondary">Dibutuhkan *</small>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="form-label">Alamat Lengkap</label>
				<textarea class="form-control" placeholder="Alamat.." name="alamat" required></textarea>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label class="form-label">Agama</label>
					<select class="form-control" name="agama" required>
						<option value="">Pilih..</option>
						<option value="Islam">Islam</option>
						<option value="Protestan">Protestan</option>
						<option value="Katolik">Katolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
						<option value="Khonghucu">Khonghucu</option>
					</select>
					<small class="text-secondary">Dibutuhkan *</small>
				</div>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label class="form-label">Status Perkawinan</label>
					<select class="form-control" name="status_perkawinan" required>
						<option value="">Pilih..</option>
						<option value="Menikah">Menikah</option>
						<option value="Belum menikah">Belum menikah</option>
					</select>
					<small class="text-secondary">Dibutuhkan *</small>
				</div>
			</div>
			<div class="clearfix">
				<div class="float-right">
					<button class="btn btn-outline-primary btn-outline btn-sm">Tambah Data</button>
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

