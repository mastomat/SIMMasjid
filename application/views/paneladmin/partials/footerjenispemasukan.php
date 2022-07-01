<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>


<div class="modal fade" id="modal-add" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Jenis Pemasukan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form id="inputform">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">

									<div class="form-group">
										<label>Nama Jenis Pemasukan</label>
										<input type="text" name="nama" id="nama" class="form-control select2">
									</div>
									<!-- /.form-group -->

								</div>
								<!-- /.col -->

								<!-- /.col -->
							</div>
							<!-- /.row -->


							<!-- /.row -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer">

						</div>
					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Jenis Pemasukan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form id="editform">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">

									<div class="form-group">
										<label>Nama Jenis Pemasukan</label>
										<input type="text" name="enama" id="enama" class="form-control select2">
										<input type="hidden" name="kodedit" id="kodedit" value="">
									</div>
									<!-- /.form-group -->

								</div>
								<!-- /.col -->

								<!-- /.col -->
							</div>


							<!-- /.row -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							Anda disarankan tidak menambah akun yang sama lebih dari 1
						</div>
					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary" id="ebtn-simpan">Simpan</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">X</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Jenis Pemasukan</h4>
			</div>
			<form>
				<div class="modal-body">

					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda <strong> Menghapus </strong> Pemasukan ini?</p>
						<p>Anda Juga Akan Menghapus Data Pemasukan Yang <strong>MEMILIKI</strong> </p>
						<p><strong>JENIS PEMASUKAN INI</strong></p>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--END MODAL HAPUS-->
<!-- /.modal -->


<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/toastr/toastr.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>


<script>
	$(document).ready(function () {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		tampildata();

		function tampildata() {
			$('#datajenis').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,

				"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
				"buttons": ["csv", "excel", "pdf", "print"],
				"ajax": {
					url: "<?php echo base_url()?>k_jenispemasukan/getdata",
					type: 'GET'
				},
			});

		}

		// simpan data

		$.validator.setDefaults({
			submitHandler: function () {

				var nama_lengkap = $("#nama").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_jenispemasukan/simpan",
					data: {

						'nama': nama_lengkap,

					},


					success: function (response) {

						if (response == "ada") {
							$('[name="nama"]').val("");
							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('#datajenis').DataTable().ajax.reload();
							Toast.fire({
								icon: 'error',
								title: 'Username Sudah Ada',
								text: "Coba Username Lain"
							});
						} else if (response == "success") {
							$('[name="nama"]').val("");
							$('#modal-add').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datajenis').DataTable().ajax.reload();


						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}

						console.log(response)
					},

					error: function (response) {
						Swal.fire({
							type: 'error',
							title: 'OOPS!!',
							text: 'Server Error!'
						});
					}
				});
			}
		});
		$('#inputform').validate({
			rules: {

				nama: {
					required: true,

				},

			},
			messages: {

				nama: {
					required: "Masukan Jenis Pemasukan",

				},


			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});


		//saveedit
		$.validator.setDefaults({
			submitHandler: function () {
				var id = $("#kodedit").val();

				var nama_lengkap = $("#enama").val();



				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_jenispemasukan/simpanedit",
					data: {

						'nama': nama_lengkap,

						'id': id
					},


					success: function (response) {
						if (response == "success") {

							$('[name="enama"]').val("");

							$('#modal-edit').modal('hide');
							$('#datajenis').DataTable().ajax.reload();
							Toast.fire({
								icon: 'success',
								title: 'Data Sukses diedit'
							});


						} else {
							Toast.fire({
								icon: 'success',
								title: 'Data Gagal diedit'
							});
						}

						console.log(response)
					},

					error: function (response) {
						Swal.fire({
							type: 'error',
							title: 'OOPS!!',
							text: 'Server Error!'
						});
					}
				});
			}
		});
		$('#editform').validate({
			rules: {

				enama: {
					required: true,

				},


			},
			messages: {


				enama: {
					required: "Masukan Jenis Pemasukan",

				}

			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});


		// showedit data
		$('#datajenis').on('click', '.bedit', function () {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url()?>k_jenispemasukan/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function (data) {
					$.each(data, function (nama, username, password, level) {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="enama"]').val(data.nama);



					});
				}
			});
			return false;
		});


		//hapus data
		//GET HAPUS
		$('#datajenis').on('click', '.bhapus', function () {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		//Hapus Barang

		$('#btn_hapus').on('click', function () {
			var kode = $('#textkode').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>k_jenispemasukan/hapus",
				data: {
					id: kode
				},
				success: function (response) {

					if (response == "success") {

						$('#ModalHapus').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						Toast.fire({
							icon: 'success',
							title: 'Data Berhasil dihapus'
						});
						$('#datajenis').DataTable().ajax.reload();


					} else {
						$('#ModalHapus').modal('hide');
						Toast.fire({
							icon: 'error',
							title: 'Data Gagal dihapus'
						});
					}

					console.log(response)
				}

			});
			return false;
		});




	});

</script>

</body>

</html>
