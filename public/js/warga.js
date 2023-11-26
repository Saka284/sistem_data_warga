$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $("meta[name=csrf_token]").attr('content')
	}
});

$(document).ready(function () {
	$("#RTTable").DataTable();
	$("#KKTable").DataTable();
	$("#KTable").DataTable();
});


function tambahRt() {
	var modal = $("#modal-tambahrt");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');
}

function tambahKk() {
	var modal = $("#modal-tambahkk");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');
}

function tambahKeluarga() {
	var modal = $("#modal-tambahkeluarga");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');
}

//tambah pengumuman
function tambahPengumuman() {
	var modal = $("#modal-tambahpengumuman");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');
}

//fungsi edit pengumuman
function editPengumuman(dataid) {
	var id = dataid.getAttribute('data-id');

	var modal = $("#modal-editpengumuman");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');

	// Input variable
	var judulPengumuman = $("input[name=judul_pengumuman]");
	var isiPengumuman = $("textarea[name=isi_pengumuman]");
	var tglPengumuman = $("input[name=tgl_pengumuman]");
	var data_id = $("input[name=data-id]");

	modal.iziModal('startLoading');
	$.get('data/pengumuman', { id: id }, function (response) {
		modal.iziModal('stopLoading');
		judulPengumuman.val(response[0].judul_pengumuman);
		isiPengumuman.val(response[0].isi_pengumuman);
		tglPengumuman.val(response[0].tgl_pengumuman);
		data_id.val(response[0].id);
	});
}

//fungsi edit data rt
function editDataRt(dataid) {
	var id = dataid.getAttribute('data-id');
	var modal = $("#modal-editrt");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');

	//input variable
	var namaLengkap = $("input[name=nama_lengkap]");
	var noRt = $("input[name=no_rt]");
	var noNik = $("input[name=no_nik]");
	var noKk = $("input[name=no_kk]");
	var ttl = $("input[name=ttl]");
	var jenisKelamin = $("select[name=jenis_kelamin]");
	var golonganDarah = $("select[name=golongan_darah]");
	var alamat = $("textarea[name=alamat]");
	var agama = $("select[name=agama]");
	var statusPerkawinan = $("select[name=status_perkawinan]");
	var id_rt = $("input[name=data-id]");

	//loading
	modal.iziModal('startLoading');
	$.get('data/rt', { id: id }, function (response) {
		modal.iziModal('stopLoading');
		namaLengkap.val(response[0].nama_lengkap);
		noRt.val(response[0].no_rt);
		noNik.val(response[0].no_nik);
		noKk.val(response[0].no_kk);
		ttl.val(response[0].ttl);
		jenisKelamin.val(response[0].jenis_kelamin);
		golonganDarah.val(response[0].golongan_darah);
		alamat.val(response[0].alamat);
		agama.val(response[0].agama);
		statusPerkawinan.val(response[0].status_perkawinan);
		id_rt.val(response[0].id);
	});
}

function editDataKk(dataid) {
	var id = dataid.getAttribute('data-id');

	var modal = $("#modal-editkk");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');

	//input variable
	var namaLengkap = $("input[name=nama_lengkap]");
	var noNik = $("input[name=no_nik]");
	var noKk = $("input[name=no_kk]");
	var noRt = $("select[name=no_rt]");
	var ttl = $("input[name=ttl]");
	var jenisKelamin = $("select[name=jenis_kelamin]");
	var golonganDarah = $("select[name=golongan_darah]");
	var alamat = $("textarea[name=alamat]");
	var agama = $("select[name=agama]");
	var statusPerkawinan = $("select[name=status_perkawinan]");
	var pekerjaan = $("input[name=pekerjaan]");
	var kewarganegaraan = $("input[name=kewarganegaraan]");
	var data_id = $("input[name=data-id]");

	modal.iziModal('startLoading');
	$.get('data/kk', { id: id }, function (response) {
		modal.iziModal('stopLoading');
		namaLengkap.val(response[0].nama_lengkap);
		noRt.val(response[0].rt_id);
		noNik.val(response[0].no_nik);
		noKk.val(response[0].no_kk);
		ttl.val(response[0].ttl);
		jenisKelamin.val(response[0].jenis_kelamin);
		golonganDarah.val(response[0].golongan_darah);
		alamat.append(response[0].alamat);
		agama.val(response[0].agama);
		statusPerkawinan.val(response[0].status_perkawinan);
		pekerjaan.val(response[0].pekerjaan);
		kewarganegaraan.val(response[0].kewarganegaraan);
		data_id.val(response[0].id);
	});
}

//edit data keluarga
function editDataKeluarga(dataid) {
	var id = dataid.getAttribute('data-id');

	var modal = $("#modal-editkeluarga");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#0077FF');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');

	//input variable
	var namaLengkap = $("input[name=nama_lengkap]");
	var kepalaKeluarga = $("select[name=kepala_keluarga_id]");
	var noNik = $("input[name=no_nik]");
	var ttl = $("input[name=ttl]");	
	var jenisKelamin = $("select[name=jenis_kelamin]");
	var golonganDarah = $("select[name=golongan_darah]");
	var agama = $("select[name=agama]");
	var statusPerkawinan = $("select[name=status_perkawinan]");
	var pekerjaan = $("input[name=pekerjaan]");
	var kewarganegaraan = $("input[name=kewarganegaraan]");
	var data_id = $("input[name=id]");

	modal.iziModal('startLoading');
	$.get('data/k', { id: id }, function (response) {
		modal.iziModal('stopLoading');

		namaLengkap.val(response[0].nama_lengkap);
		kepalaKeluarga.val(response[0].kepala_keluarga_id);
		noNik.val(response[0].no_nik);
		ttl.val(response[0].ttl);
		jenisKelamin.val(response[0].jenis_kelamin);
		golonganDarah.val(response[0].golongan_darah);
		agama.val(response[0].agama);
		statusPerkawinan.val(response[0].status_perkawinan);
		pekerjaan.val(response[0].pekerjaan);
		kewarganegaraan.val(response[0].kewarganegaraan);
		data_id.val(response[0].id);
	});
}

function hapusData(dataid) {
	var url = dataid.getAttribute('data-url');
	var modal = $("#modal-hapusdata");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#DC3545');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');

	var cancel = $("#cancel");
	var next = $("#next");

	cancel.click(function () {
		modal.iziModal('close');
	});

	next.click(function () {
		window.location.href = url;
	});
}

function editPengaturan() {
	var modal = $("#modal-pengaturan");
	modal.iziModal();
	modal.iziModal('open');
	modal.iziModal('setHeaderColor', '#17a2b8');
	modal.iziModal('setTransitionIn', 'fadeInUp');
	modal.iziModal('setTransitionOut', 'fadeOutDown');

	var username = $("input[name=username]");
	var password = $("input[name=password]");
	var passwordConfirmation = $("input[name=passwordConfirmation]");

	var update = $("button[name=update]");
	var cancel = $("button[name=cancel]");

	modal.iziModal('startLoading');

	$.get('data/admin', function (response) {
		modal.iziModal('stopLoading');

		username.val(response[0].username);
	});

	cancel.click(function () {
		modal.iziModal('close');
	});

	update.addClass('disabled');

	passwordConfirmation.on('input', function () {
		if (password.val() === passwordConfirmation.val()) {
			update.removeClass('disabled');
		}
		else {
			update.addClass('disabled');
		}
	});

	function clearFormFields() {
		$("input[name=nama_lengkap]").val('');
		$("input[name=no_rt]").val('');
		$("input[name=no_nik]").val('');
		$("input[name=no_kk]").val('');
		$("input[name=ttl]").val('');
		$("select[name=jenis_kelamin]").val('');
		$("select[name=golongan_darah]").val('');
		$("textarea[name=alamat]").val('');
		$("select[name=agama]").val('');
		$("select[name=status_perkawinan]").val('');
		// Add more fields as needed
	}
}