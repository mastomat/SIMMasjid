<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal with Dynamic Content</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modal-galeri">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Foto Galeri</h4>
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
						<div id="actions" class="row">
											<div class="col-lg-6">
												<div class="btn-group w-100">
													<span class="btn btn-success col fileinput-button">
														<i class="fas fa-plus"></i>
														<span>Add files</span>
													</span>
													<button type="submit" class="btn btn-primary col start">
														<i class="fas fa-upload"></i>
														<span>Start upload</span>
													</button>
													<button type="reset" class="btn btn-warning col cancel">
														<i class="fas fa-times-circle"></i>
														<span>Cancel upload</span>
													</button>
												</div>
											</div>
											<div class="col-lg-6 d-flex align-items-center">
												<div class="fileupload-process w-100">
													<div id="total-progress" class="progress progress-striped active"
														role="progressbar" aria-valuemin="0" aria-valuemax="100"
														aria-valuenow="0">
														<div class="progress-bar progress-bar-success" style="width:0%;"
															data-dz-uploadprogress></div>
													</div>
												</div>
											</div>
										</div>
										<div class="table table-striped files" id="previews">
											<div id="template" class="row mt-2">
												
												<div class="col-auto">
													<span class="preview"><img src="data:," alt=""
															data-dz-thumbnail /></span>
												</div>
												<div class="col d-flex align-items-center">
													<p class="mb-0">
														<span class="lead" data-dz-name></span>
														(<span data-dz-size></span>)
													</p>
													<strong class="error text-danger" data-dz-errormessage></strong>
												</div>

												<div class="col-4 d-flex align-items-center">
													<div class="progress progress-striped active w-100"
														role="progressbar" aria-valuemin="0" aria-valuemax="100"
														aria-valuenow="0">
														<div class="progress-bar progress-bar-success" style="width:0%;"
															data-dz-uploadprogress></div>
													</div>
												</div>
												<div class="col-auto d-flex align-items-center">
													<div class="btn-group">
														<button class="btn btn-primary start">
															<i class="fas fa-upload"></i>
															<span>Start</span>
														</button>
														<button data-dz-remove class="btn btn-warning cancel">
															<i class="fas fa-times-circle"></i>
															<span>Cancel</span>
														</button>
														<button data-dz-remove class="btn btn-danger delete">
															<i class="fas fa-trash"></i>
															<span>Delete</span>
														</button>
													</div>
												</div>
											</div>
										</div>
							
						</div>
						<!-- /.card-body -->
						
					</div>


			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				
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
				<h4 class="modal-title">Edit Judul</h4>
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
										<label>Judul</label>
										<input type="text" name="enama" id="enama" class="form-control select2">
										<input type="hidden" name="kodedit" id="kodedit" value="">

									</div>
									<!-- /.form-group -->
									
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
							Edit Judul Gambar Galeri
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
				<h4 class="modal-title" id="myModalLabel">Hapus Galeri</h4>
			</div>
			<form>
				<div class="modal-body">

					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda yakin mau memhapus Galeri ini?</p>
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
<!-- dropzonejs -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/dropzone/min/dropzone.min.js"></script>

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
<script src="<?php echo base_url() ?>assets/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
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
			$('#datagaleri').DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				"paging": true,

				"dom": '<"top row"<"col-md-4" l  ><"col-md-4" B  ><"col-md-4" and f>>rt<"bottom row"<"col-md-6" i> <"col-md-6" p>>',
				"buttons": ["csv", "excel", "pdf", "print"],
				"ajax": {
					url: "<?php echo base_url()?>k_galeri/getdata",
					type: 'GET'
				},
			});

		}

		$('#datagaleri').on('click', '.bedit', function() {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>k_galeri/showedit",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function(judul) {
						$('#modal-edit').modal('show');
						$('[name="kodedit"]').val(id);
						$('[name="enama"]').val(data.judul);
						


					});
				}
			});
			return false;
		});	

		//saveedit
		$.validator.setDefaults({
			submitHandler: function() {
				var id = $("#kodedit").val();

				var judul = $("#enama").val();
		


				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>k_galeri/simpanedit",
					data: {
						'judul': judul,
					

						'id': id
					},


					success: function(response) {
						if (response == "success") {

							$('[name="enama"]').val("");
						
							$('#modal-edit').modal('hide');
							$('#datagaleri').DataTable().ajax.reload();
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
				

				enama: {
					required: "Masukan Judul",

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
    //GET HAPUS
    $('#datagaleri').on('click','.bhapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

    //Hapus Barang

    $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
		
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>k_galeri/hapus",
            data : {id: kode},
            success: function (response) {

                        if(response == "ada"){
                           
                            $('#ModalHapus').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
                            $('#datagaleri').DataTable().ajax.reload();
                            Toast.fire({
								icon: 'error',
								title: 'Data pada tabel User tidak boleh kosong',
                              
							    });
                        }
						else if (response == "success") {	
						
								$('#ModalHapus').modal('hide');
								$('body').removeClass('modal-open');
								$('.modal-backdrop').remove();
								Toast.fire({
								icon: 'success',
								title: 'Data Berhasil dihapus'
							    });
								$('#datagaleri').DataTable().ajax.reload();
							

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
 // DropzoneJS Demo Code Start
 Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
  url: "<?php echo site_url('k_galeri/simpan');?>", // Set the url
  thumbnailWidth: 80,
  thumbnailHeight: 80,
  parallelUploads: 20,
  maxFilesize: 10,
  previewTemplate: previewTemplate,
  autoQueue: false, // Make sure the files aren't queued until manually added
  previewsContainer: "#previews", // Define the container to display the previews
  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})

myDropzone.on("addedfile", function(file) {
  // Hookup the start button
  

  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
})

// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
  document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})

myDropzone.on("sending", function(file, xhr, formData) {

  // Show the total progress bar when upload starts
  document.querySelector("#total-progress").style.opacity = "1"
  // And disable the start button
  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
  document.querySelector("#total-progress").style.opacity = "0"
  $('#modal-galeri').modal('hide');
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
                            $('#datagaleri').DataTable().ajax.reload();
                            Toast.fire({
								icon: 'success',
								title: 'Data Berhasil ditambah',
                                
							    });



})

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
  myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
}
document.querySelector("#actions .cancel").onclick = function() {
  myDropzone.removeAllFiles(true)
}
// DropzoneJS Demo Code End



	

	

</script>

<script>
$(document).ready(function(){
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    
});




</script>

</body>

</html>