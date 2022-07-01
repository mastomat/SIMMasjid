<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- modaltambah -->
<div class="modal fade" id="modal-logo">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Logo Masjid</h4>
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
								<div class="form-group">
									<label>Masjid Logo</label>
									<input name='gambar' type='file' id='gambar'>

								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->


							<!-- /.row -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							Inputkan Logo Masjid
						</div>
					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button class='btn-sm btn-primary' id='tambahgambar'>Upload</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>



<!-- /.modal-dialog -->
</div>
<!-- modal edit end -->


<!--MODAL HAPUS-->

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
<!-- AdminLTE for demo purposes -->

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
<script src="<?php echo base_url() ?>assets/adminlte/plugins/filterizr/jquery.filterizr.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

<script>
	$(document).ready(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		tampildata();
		$("#struktur").summernote({
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

		$("#sejarah").summernote({
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
				url: "<?= base_url('k_masjid/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$("#sejarah").summernote("insertImage", url);
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
				url: "<?= base_url('k_masjid/delete_image') ?>",
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
				url: "<?= base_url('k_masjid/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$("#struktur").summernote("insertImage", url);
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
				url: "<?= base_url('k_masjid/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}
		// summernote upload delete image

		function tampildata() {
			var id = '1';
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_masjid/showdata",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function(nama, nohp, alamat, struktur, sejarah, logo) {


						$('[name="nama"]').val(data.nama);
						$('[name="nohp"]').val(data.nohp);
						$('[id="alamat"]').val(data.alamat);

						$('[name="logo"]').attr("src",
							"<?php echo base_url() ?>assets/upload/logo/" + data.logo);


						$('[id="struktur"]').summernote('code', data.struktur);
						$('[id="sejarah"]').summernote('code', data.sejarah)



					});
				}
			});
			return false;

		}

		//simpandata
		$.validator.setDefaults({
			submitHandler: function() {

				var nama = $("#nama").val();
				var struktur = $("#struktur").val();
				var nohp = $("#nohp").val();
				var sejarah = $('#sejarah').val();
				var alamat = $('#alamat').val();
				var id = '1';

				console.log(nama);

				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_masjid/simpan",
					data: {
						'nama': nama,
						'struktur': struktur,
						'sejarah': sejarah,
						'alamat': alamat,
						'nohp': nohp,
						'id': id,
					},

					success: function(response) {
						if (response == "success") {

							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});

							window.location.reload(true);

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
				nama: {
					required: true,

				},
				alamat: {
					required: true,
					maxlength: 50

				},
				nohp: {
					required: true,
					number: true,
					minlength: 11,
					maxlength: 14
				},
				struktur: {
					required: true


				},
				sejarah: {
					required: true


				}



			},
			messages: {
				nama: {
					required: "Masukan Nama ",

				},
				alamat: {
					required: "Masukan Alamat",

				},

				nohp: {
					required: "Maukan No whatsapp",
					number: 'Hanya Angka'
				},
				struktur: {
					required: "Masukkan Struktur",

				},
				sejarah: {
					sejarah: "Masukkan Sejarah",

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








	});


	$(document).on('click', '#tambahgambar', function(e) {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		e.preventDefault();
		var file_data = $('#gambar').prop('files')[0];
		var form_data = new FormData();

		form_data.append('file', file_data);



		$.ajax({
			url: '<?php echo site_url("k_masjid/uploadgambar") ?>', // point to server-side PHP script
			dataType: 'json', // what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function(data, status) {
				//alert(php_script_response); // display response from the PHP script, if any
				if (data.status != 'error') {
					$('#gambar').val('');

					Toast.fire({
						icon: 'success',
						title: 'Logo Berhasil diganti'
					});
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#modal-logo').hide();
					window.location.reload(true);
				} else {
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('#modal-logo').hide();
					Toast.fire({
						icon: 'success',
						title: 'Logo Gagal diganti'
					});

				}
			}
		});
	})
</script>







</body>

</html>