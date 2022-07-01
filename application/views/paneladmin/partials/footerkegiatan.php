<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>


<div class="modal fade" id="modal-add" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Kegiatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form enctype="multipart/form-data" id="inputform">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">

							<div class="row">
								<div class="col-md-8 order-last order-md-first">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Konten Kegiatan</h3>

											<div class="card-tools">
												<button type="button" class="btn btn-tool" data-card-widget="collapse">
													<i class="fas fa-minus"></i>
												</button>
											</div>
											<!-- /.card-tools -->
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="post_title">Judul Kegiatan</label>
												<input id="post_title" name="post_title" class="form-control select2" type="text" placeholder="Kegiatan Judul..." value="" required>

											</div>
											<div class="form-group">
												<label>Kegiatan Isi</label>
												<textarea class="form-control select2" name="post_body" id="post_body"></textarea>
											</div>

										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Kegiatan Info</h3>

											<div class="card-tools">
												<button type="button" class="btn btn-tool" data-card-widget="collapse">
													<i class="fas fa-minus"></i>
												</button>
											</div>
											<!-- /.card-tools -->
										</div>
										<div class="card-body">

											<div class="form-group">
												<label class="form-label" for="post_date">Tanggal Kegiatan</label>
												<input class="form-control gijgo select2" name="post_date" id="post_date" type="text" placeholder="Select a date" required />

											</div>
											<div class="form-group">
												<label class="form-label" for="post_thumbnail">Kegiatan Foto</label>
												<div class="custom-file">
													<input accept="image/*" type="file" id="post_thumbnail" name="post_thumbnail">

												</div>
											</div>

										</div>
									</div>
									<div class="row">
										<div class="card-body">

											<button type="submit" class="btn btn-primary btn-lg ms-5" id="btn-simpan "><i class="fas fa-save"></i> Simpan</button>
										</div>

									</div>
								</div>
							</div>

						</div>
						<!-- /.card-body -->
						<div class=" card-footer">
							Form Pengisian Kegiatan
						</div>
					</div>


			</div>

			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Kegiatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form id="editform" enctype="multipart/form-data">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">

							<div class="row">
								<div class="col-md-8 order-last order-md-first">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Konten Kegiatan</h3>

											<div class="card-tools">
												<button type="button" class="btn btn-tool" data-card-widget="collapse">
													<i class="fas fa-minus"></i>
												</button>
											</div>
											<!-- /.card-tools -->
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="post_title">Judul Kegiatan</label>
												<input id="epost_title" name="epost_title" class="form-control select2" type="text" placeholder="Kegiatan Judul..." value="" required>
												<input type="hidden" name="kodedit" id="kodedit" value="">

											</div>
											<div class="form-group">
												<label>Kegiatan Isi</label>
												<textarea class="form-control select2" name="epost_body" id="epost_body"></textarea>
											</div>

										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Kegiatan Info</h3>

											<div class="card-tools">
												<button type="button" class="btn btn-tool" data-card-widget="collapse">
													<i class="fas fa-minus"></i>
												</button>
											</div>
											<!-- /.card-tools -->
										</div>
										<div class="card-body">

											<div class="form-group">
												<label class="form-label" for="post_date">Tanggal Kegiatan</label>
												<input class="form-control gijgo select2" name="epost_date" id="epost_date" type="text" placeholder="Select a date" required />

											</div>
											<div class="form-group">
												<label class="form-label" for="post_thumbnail">Kegiatan Foto</label>
												<div class="custom-file">
													<input accept="image/*" type="file" id="epost_thumbnail" name="epost_thumbnail">

												</div>
											</div>
											<img src="" alt="Foto Kegiatan" id="foto" class="img-fluid w-100">

										</div>
									</div>
									<div class="row">
										<div class="card-body">

											<button type="submit" class="btn btn-primary btn-lg ms-5" id="btn-simpan "><i class="fas fa-save"></i> Simpan</button>
										</div>

									</div>
								</div>
							</div>

						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							Anda disarankan tidak menambah akun yang sama lebih dari 1
						</div>
					</div>


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

				<h4 class="modal-title" id="myModalLabel">Hapus Kegiatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
			</div>
			<form>
				<div class="modal-body">

					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda yakin Menghapus Kegiatan ini?</p>
					</div>

				</div>
				<div class="modal-footer">

					<button class="btn_hapus btn btn-danger" id="btn_hapus"><i class="fas fa-trash"></i> Hapus</button>
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
<!-- gijgo datepicker -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/gijgo/js/gijgo.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>


<script>
	$(document).ready(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		tampildata();

		$("#post_body").summernote({
			height: "200px",
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture', 'video']],
				['misc', ['fullscreen', 'codeview', 'help']],
			],
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});

		$("#epost_body").summernote({
			height: "200px",
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture', 'video']],
				['misc', ['fullscreen', 'codeview', 'help']],
			],
			callbacks: {
				onImageUpload: function(image) {
					EdituploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					EditdeleteImage(target[0].src);
				}
			}
		});



		// summernote upload delete image
		function EdituploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url('k_kegiatan/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$("#epost_body").summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function EditdeleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?= base_url('k_kegiatan/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}

		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url('k_kegiatan/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$("#post_body").summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?= base_url('k_kegiatan/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}
		// summernote upload delete image

		$(".gijgo").datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd',
			footer: true,
			modal: true,
			header: true,
			showRightIcon: false
		});

		function tampildata() {
			$('#datakegiatan').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,

				"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
				"buttons": ["csv", "excel", "pdf", "print"],
				"ajax": {
					url: "<?php echo base_url() ?>k_kegiatan/getdata",
					type: 'GET'
				},
			});

		}

		// simpan data

		$('#inputform').submit(function(e) {
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>k_kegiatan/simpan_kegiatan",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,

				success: function(response) {

					if (response == "success") {
						$('[name="post_title"]').val("");
						$('#post_body').summernote('code', '');
						$('[name="post_date"]').val("");
						$('[name="post_thumbnail"]').val("");
						$('#modal-add').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						Toast.fire({
							icon: 'success',
							title: 'Data Berhasil disimpan'
						});
						$('#datakegiatan').DataTable().ajax.reload();


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
		})


		$('#inputform').validate({
			rules: {
				post_title: {
					required: true,

				},
				post_body: {
					required: true,

				},
				post_date: {
					required: true,

				},
				post_thumbnail: {
					required: true


				},




			},
			messages: {
				post_title: {
					required: 'masukkan Judul',

				},
				post_body: {
					required: true,

				},
				post_date: {
					required: 'Pilih Tanggal',

				},
				post_thumbnail: {
					required: 'Pilih Gambar',


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


		//saveedit
		$('#editform').submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>k_kegiatan/simpanedit",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,


				success: function(response) {
					if (response == "success") {

						$('[name="epost_title"]').val("");

						$('[name="epost_date"]').val("");
						$('[name="epost_thumbnail"]').val("");
						$('#modal-edit').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						Toast.fire({
							icon: 'success',
							title: 'Data Berhasil disimpan'
						});
						$('#datakegiatan').DataTable().ajax.reload();


					} else {
						Toast.fire({
							icon: 'success',
							title: 'Data Gagal diedit'
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
		})





		// showedit data
		$('#datakegiatan').on('click', '.bedit', function() {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_kegiatan/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function(judul, id, isi, foto, tanggal) {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="epost_title"]').val(data.judul);
						$('[name="epost_date"]').val(data.tanggal);
						$('[id="foto"]').attr("src",
							"<?php echo base_url() ?>uploads/kegiatan/" + data
							.foto);

						$('[name="epost_body"]').summernote('code', data.isi)




					});
				}
			});
			return false;
		});


		//hapus data
		//GET HAPUS
		$('#datakegiatan').on('click', '.bhapus', function() {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		//Hapus Barang

		$('#btn_hapus').on('click', function() {
			var kode = $('#textkode').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>k_kegiatan/hapus_kegiatan",
				data: {
					id: kode
				},
				success: function(response) {

					if (response == "success") {

						$('#ModalHapus').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						Toast.fire({
							icon: 'success',
							title: 'Data Berhasil dihapus'
						});
						$('#datakegiatan').DataTable().ajax.reload();


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