<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- modaltambah -->

<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Pengeluaran</h4>
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
								<div class="col-md-6">



									<div class="form-group">
										<label>Jumlah <span>*</span></label>
										<input type="number" name="jumlah" id="jumlah" class="form-control select2">
									</div>


									<div class="form-group">
										<label>Keterangan <span>*</span></label>
										<input type="text" name="keterangan" id="keterangan" class="form-control select2">
									</div>
									<!-- /.form-group -->

									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-md-6">

									<div class="form-group">
										<label>Tanggal <span>*</span></label>
										<input type="date" name="tanggal" id="tanggal" class="form-control select2">
									</div>
									<!-- /.form-group -->

									<!-- /.form-group -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->


							<!-- /.row -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							tanda <span>*</span> berarti harus diisi
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

<!-- modaledit -->
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Pengeluaran</h4>
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
								<div class="col-md-6">

									<div class="form-group">
										<div class="form-group">
											<label>Keterangan <span>*</span></label>
											<input type="text" name="eketerangan" id="eketerangan" class="form-control select2">
										</div>
									</div>

									<div class="form-group">
										<label>Jumlah <span>*</span></label>
										<input type="number" name="ejumlah" id="ejumlah" class="form-control select2">
										<input type="hidden" name="kodedit" id="kodedit" class="form-control select2">
									</div>
									<!-- /.form-group -->

									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-md-6">

									<div class="form-group">
										<label>Tanggal <span>*</span></label>
										<input type="date" name="etanggal" id="etanggal" class="form-control select2">
									</div>
									<!-- /.form-group -->

									<!-- /.form-group -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->


							<!-- /.row -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							tanda <span>*</span> berarti harus diisi
						</div>
					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary" id="btn-edit">Simpan</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- modal edit end -->


<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel">Hapus Pengeluaran</h4>
			</div>
			<form>
				<div class="modal-body">

					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda yakin Menghapus Data Pengeluaran ini?</p>
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
	$(document).ready(function() {
		$('#datakeluar').DataTable({

			"responsive": true,
			"lengthChange": true,
			"autoWidth": false,
			"paging": true,
			"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
			"buttons": ["csv", "excel", "pdf", "print"],
			"ajax": {
				url: "<?php echo base_url() ?>k_pengeluaran/getdata",
				type: 'GET',
			},

		});


		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		//tampildata datatables

		totalpengeluaran();


		function totalpengeluaran() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_pengeluaran/getdata",
				dataType: "JSON",

				success: function(data) {
					$('#totalpengeluaran').html(data.total)
					$('#totalbulan').html(data.totalbulan)

				}
			});
			return false;

		}









		//simpandata
		$.validator.setDefaults({
			submitHandler: function() {

				var tanggal = $("#tanggal").val();
				var jumlah = $("#jumlah").val();
				var jenis = $('#keterangan').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_pengeluaran/simpan",
					data: {
						'tanggal': tanggal,
						'jumlah': jumlah,
						'keterangan': jenis,

					},

					success: function(response) {

						if (response == "success") {
							$('[name="jumlah"]').val("");
							$('[name="tanggal"]').val("");
							$('[name="keterangan"]').val("");

							$('#modal-add').modal('hide');
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datakeluar').DataTable().ajax.reload();
							totalpengeluaran().ajax.reload();


						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}

						console.log(response)
					},

					error: function(response) {
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
				tanggal: {
					required: true,
				},
				keterangan: {
					required: true,
				},
				jumlah: {
					required: true,
				},



			},
			messages: {
				tanggal: {
					required: "Pilih Tanggal",
				},
				keterangan: {
					required: "Masukkan Keterangan",

				},
				jumlah: {
					required: "Maukan Jumlah Uang",
				},


			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});


		//showmodal hapus


		$('#datakeluar').on('click', '.bhapus', function() {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		//hapus
		$('#btn_hapus').on('click', function() {
			var kode = $('#textkode').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>k_pengeluaran/hapus",
				data: {
					id: kode
				},
				success: function(data) {
					$('#ModalHapus').modal('hide');
					$('#datakeluar').DataTable().ajax.reload();
					Toast.fire({
						icon: 'success',
						title: 'Data Sukses dihapus'
					});
					totalpengeluaran().ajax.reload();



					console.log(data);
				}

			});
			return false;
		});



		//showedit
		$('#datakeluar').on('click', '.bedit', function() {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_pengeluaran/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function(jumlah, tanggal, keterangan) {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="ejumlah"]').val(data.jumlah);
						$('[name="etanggal"]').val(data.tanggal);
						$('[name="eketerangan"]').val(data.keterangan);



					});

				}
			});
			return false;
		});

		//saveedit

		$.validator.setDefaults({
			submitHandler: function() {
				var id = $("#kodedit").val();

				var jumlah = $("#ejumlah").val();
				var tanggal = $("#etanggal").val();
				var keterangan = $('#eketerangan').val();

				console.log(id);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_pengeluaran/simpan_edit",
					data: {
						'jumlah': jumlah,
						'tanggal': tanggal,
						'keterangan': keterangan,

						'id': id
					},

					success: function(response) {

						if (response == "success") {
							$('[name="ejumlah"]').val("");
							$('[name="eketerangan"]').val("");
							$('[name="etanggal"]').val("");



							$('#modal-edit').modal('hide');
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datakeluar').DataTable().ajax.reload();
							totalpengeluaran().ajax.reload();


						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}

						console.log(response)
					},

					error: function(response) {
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
				ejumlah: {
					required: true,

				},
				eketerangan: {
					required: true,


				},
				etanggal: {
					required: true,

				},


			},
			messages: {
				ejumlah: {
					required: "Masukan Jumlah Uang ",

				},
				eketerangan: {
					required: "Masukan Keterangan",

				},

				etanggal: {
					required: "Pilih Tanggal",

				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
















	});
</script>





</script>

</body>

</html>