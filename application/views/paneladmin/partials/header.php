<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $judulweb; ?></title>
	<link rel="icon" href="<?php echo base_url() ?>assets/upload/logo/<?php echo
																		$logo ?>" type="image/x-icon" />

	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
	<!-- DataTables -->
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/css/adminlte.min.css">

	<!-- overlayScrollbars -->
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">
	<!-- dropzonejs -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/dropzone/min/dropzone.min.css">
	<!-- gijgo datapicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/gijgo/css/gijgo.min.css">



</head>

<body class="hold-transition sidebar-mini layout-fixed   ">
	<script src="<?php echo base_url() ?>assets/adminlte/autotopbar.min.js"></script>

	<div class="wrapper">

		<!-- Preloader -->
		<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ?>assets/images/fav.png" alt="AdminLTELogo" height="100" width="300">
  </div> -->

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo base_url() ?>admin/dasbor" class="nav-link">Home</a>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="far fa-user"></i>	<?php echo $namauser ?></i> 

					
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

						<div class="dropdown-divider"></div>
						<a href="<?php echo base_url('k_user/profil') ?>" class="dropdown-item">
							<i class="fas fa-key mr-2"></i> Setting Profile

						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item logout">
							<i class="fas fa-sign-out-alt mr-2 "></i> Logout

						</a>



					</div>
				</li>

				


			</ul>


		</nav>
		<!-- /.navbar -->

		<script>
			document.querySelector(".logout").addEventListener('click', function () {
				Swal.fire({
					title: 'Yakin Logout ?',
					text: "Anda akan Logout dari panel admin",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya , Logout!'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location = "<?php echo base_url() ?>logout";
					}
				})
			});

		</script>
