<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- modaltambah -->




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

		function tampildata() {
			$('#datauser').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,

				"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
				"buttons": ["csv", "excel", "pdf", "print"],
				"ajax": {
					url: "<?php echo base_url() ?>k_user/getdata",
					type: 'GET'
				},
			});

		}

		// simpan data

		$.validator.setDefaults({
			submitHandler: function() {

				var nama_lengkap = $("#nama").val();
			


				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_user/simpannama",
					data: {	
						'nama': nama_lengkap,
					},


					success: function(response) {

						if (response == "success") {
							
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datauser').DataTable().ajax.reload();


						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}
						window.location.reload(true);
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

			},
			messages: {
				

				nama: {
					required: "Masukan Nama",

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

		$.validator.setDefaults({
			submitHandler: function() {

				var password = $("#password").val();
			


				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_user/simpanpw",
					data: {	
						'password': password,
					},


					success: function(response) {

						if (response == "success") {
							
							Toast.fire({
								icon: 'success',
								title: 'Data Berhasil disimpan'
							});
							$('#datauser').DataTable().ajax.reload();


						} else {
							Toast.fire({
								icon: 'error',
								title: 'Data Gagal disimpan'
							});
						}
						window.location.reload(true);
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
		$('#editpw').validate({
			rules: {
				
				password: {
					required: true,
					minlength: 6
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				},

			},
			messages: {
				

				password: {
					required: "Masukan Password",
					minlength: "Your password must be at least 6 characters long"
				},
				confirm_password: {
					required: "Masukan Password Konfirmasi",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Masukan Password yang sama"
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
		$.validator.setDefaults({
			submitHandler: function() {
				var id = $("#kodedit").val();

				var nama_lengkap = $("#enama").val();
				var username = $("#eusername").val();
				var password = $("#epsw").val();
				var role = $("#erole").val();


				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_user/simpanedit",
					data: {
						'username': username,
						'password': password,
						'nama': nama_lengkap,
						'role': role,

						'id': id
					},


					success: function(response) {
						if (response == "success") {

							$('[name="enama"]').val("");
							$('[name="eusername"]').val("");

							$('[name="epsw"]').val("");
							$('#modal-edit').modal('hide');
							$('#datauser').DataTable().ajax.reload();
							Toast.fire({
								icon: 'success',
								title: 'Data Sukses diedit'
							});
							window.location.reload(true);

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
			}
		});
		$('#editnama').validate({
			rules: {
				eusername: {
					required: true,

				},
				epsw: {
					required: true,
					minlength: 6
				},
				enama: {
					required: true,

				},


			},
			messages: {
				eusername: {
					required: "Masukan Username",

				},
				epsw: {
					required: "Masukan Password",

				},

				enama: {
					required: "Masukan Nama",

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


		// showedit data
		$('#datauser').on('click', '.bedit', function() {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_user/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function(nama, username, password, level) {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="enama"]').val(data.nama);
						$('[name="epsw"]').val(data.password);
						$('[name="eusername"]').val(data.username);var html = '';
						var i;
						html += '<option value=' + data.level + ' >' + data
							.level + '</option>';
							html += '<option value= "super">Super</option>';
							html += '<option value= "admin">Admin</option>';
						
						
						$('#erole').html(html)


					});
				}
			});
			return false;
		});


		//hapus data
		//GET HAPUS
		$('#datauser').on('click', '.bhapus', function() {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		//Hapus Barang

		$('#btn_hapus').on('click', function() {
			var kode = $('#textkode').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>k_user/hapus_user",
				data: {
					id: kode
				},
				success: function(response) {

					if (response == "ada") {

						$('#ModalHapus').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						$('#datauser').DataTable().ajax.reload();
						Toast.fire({
							icon: 'error',
							title: 'Data pada tabel User tidak boleh kosong',

						});
					} else if (response == "success") {

						$('#ModalHapus').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						Toast.fire({
							icon: 'success',
							title: 'Data Berhasil dihapus'
						});
						$('#datauser').DataTable().ajax.reload();


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