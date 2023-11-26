<!--Modal Edit RT-->
<div class="iziModal" id="modal-editrt" data-iziModal-title="Edit Data RT">
	<div class="p-3">
		<form class="form-group" method="post" action="{{url('/edit/rt')}}">
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
				<label class="form-label">No KK</label>
				<input class="form-control" type="number" name="no_kk" required>
				<small class="text-secondary">Dibutuhkan *</small>
			</div>
			<div class="form-group">
				<label class="form-label">No NIK</label>
				<input class="form-control" type="number" name="no_nik" required>
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
						<option value="Menikah">Menikah</option>
						<option value="Belum menikah">Belum menikah</option>
					</select>
					<small class="text-secondary">Dibutuhkan *</small>
				</div>
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