const flashData = $('.flash-data').data('flashdata');
const dataUser = $('.user-data').data('user');

if (flashData == 1) {
	Swal.fire({
		icon: 'error',
		title: 'Kesalahan',
		text: 'Kata sandi sekarang tidak benar',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Tutup',
	});
} else if (flashData == 2) {
	Swal.fire({
		icon: 'error',
		title: 'Kesalahan',
		text: 'Kata sandi baru sama dengan kata sandi lama',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Tutup',
	});
} else if (flashData == 3) {
	Swal.fire({
		icon: 'success',
		title: 'Selamat',
		text: 'Kata sandi berhasil dirubah',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 4) {
	Swal.fire({
		icon: 'error',
		title: 'Kesalahan',
		text: 'Email atau Kata Sandi tidak benar',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Tutup',
	});
} else if (flashData == 5) {
	Swal.fire({
		title: 'Selamat Datang ' + dataUser,
		text: 'Silahkan memilih dan memesan menu. Terimakasih :)',
		showConfirmButton: false,
		showCloseButton: true,
	});
} else if (flashData == 6) {
	Swal.fire({
		icon: 'success',
		title: 'Selamat',
		text: 'Anda berhasil membuat akun. silahkan anda bisa masuk menggunakan akun yang dibuat.',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Ya',
	});
} else if (flashData == 7) {
	Swal.fire({
		icon: 'error',
		title: 'Kesalahan',
		text: 'Mohon Maaf menu yang anda pilih sudah ada dikeranjang. Silahkan pilih menu yang lain',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Tutup',
	});
} else if (flashData == 8) {
	Swal.fire({
		icon: 'success',
		title: 'Berhasil Masuk Keranjang',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 9) {
	Swal.fire({
		icon: 'warning',
		title: 'Jumlah tidak boleh 0',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Tutup',
	});
} else if (flashData == 10) {
	Swal.fire({
		icon: 'success',
		title: 'Berhasil update',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 11) {
	Swal.fire({
		icon: 'error',
		title: 'Kesalahan',
		text: 'Anda belum memasukan nomor meja atau kranjang kosong',
		confirmButtonColor: '#7fad39',
		confirmButtonText: 'Tutup',
	});
} else {
	null
};

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin akan menghapus?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#7fad39',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});


//tombol selesai
$(document).on('click', '#btn-selesai', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin akan update status selesai pesanan?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#7fad39',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Update sudah selesai'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});


//tombol bayar
$(document).on('click', '#btn-bayar', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin akan update status bayar pesanan?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#7fad39',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Update sudah bayar'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
