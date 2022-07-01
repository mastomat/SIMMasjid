<!-- Main Sidebar Container -->
<style>
	#prayer-container {
		width: 300px;
		text-align: center;
	}

	.prayer_time {
		font-size: 1.6em;
		font-weight: 800;
	}

	#prayer-container #prayer_city {
		font-size: 1.2em;
		font-weight: 800;
	}

	#prayer-container table {
		width: 100%
	}

	#prayer-container tbody tr:nth-child(odd) {
		background-color: #f3f3f3;
	}

	#prayer-container tbody td {
		padding: 10px 20px;
	}

	#prayer-container tbody td:nth-child(1) {
		text-align: left;
	}

	#prayer-container tbody td:nth-child(2) {
		text-align: right;
	}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard <strong>Selamat datang Admin...</strong></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard Admin</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-info">
									<div class="inner">
										<h3>Rp.<?php echo  rupiah($totalpemasukan->total) ?></h3>

										<p>Total Pemasukan</p>
									</div>
									<div class="icon">
										<i class="ion ion-arrow-shrink"></i>
									</div>
									<a href="<?php echo base_url() ?>k_pemasukan/index" class="small-box-footer">More
										info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
									<div class="inner">
										<h3>Rp.<?php echo  rupiah($totalpengeluaran->total) ?></h3>

										<p>Total Pengeluaran</p>
									</div>
									<div class="icon">
										<i class="ion ion-bag"></i>
									</div>
									<a href="<?php echo base_url() ?>k_pengeluaran/index" class="small-box-footer">More
										info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-warning">
									<div class="inner">
										<h3>Rp.<?php echo  rupiah($pemasukanbulanini) ?></h3>
										<p>Pemasukan Bulan ini</p>
									</div>
									<div class="icon">
										<i class="ion ion-calculator"></i>
									</div>
									<a href="<?php echo base_url() ?>k_pemasukan/index" class="small-box-footer">More
										info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-danger">
									<div class="inner">
										<h3>Rp.<?php echo  rupiah($pengeluaranbulanini->pengeluaran) ?></h3>

										<p>Pengeluaran Bulan ini</p>
									</div>
									<div class="icon">
										<i class="ion ion-ios-cart"></i>
									</div>
									<a href="<?php echo base_url() ?>k_pengeluaran/index" class="small-box-footer">More
										info <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<!-- ./col -->
						</div>

						<div class="row">
							<div class="col-lg-8">
								<div class="card card-success">
									<div class="card-header">
										<h3 class="card-title">Grafik Pengeluaran dan Pemasukan</h3>

										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-tool" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="chart">
											<canvas id="barChart"
												style="min-height: 250px; height: 370px; max-height: 370px; max-width: 100%;"></canvas>
										</div>
									</div>
									<!-- /.card-body -->
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card card-success">
									<div class="card-header">
										<h3 class="card-title">Jadwal Sholat</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse">
												<i class="fas fa-minus"></i>
											</button>
											<button type="button" class="btn btn-tool" data-card-widget="remove">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									<div class="card-body">
										<p style="text-align: center;"><iframe src="https://time.wf/widget.php"
												scrolling="no" frameborder="0" width="110"
												height="45"></iframe><br><iframe
												src="https://www.jadwalsholat.org/adzan/ajax.row.php?id=13"
												frameborder="0" width="220" height="220"></iframe><a
												href="https://www.jadwalsholat.org" target="_blank"><img
													class="aligncenter" style="text-align:center;" alt="jadwal-sholat"
													src="https://www.jadwalsholat.org/wp-content/uploads/2013/09/jadwal-sholat.png"
													width="81" height="18" /></a></p>
									</div>
									<!-- /.card-body -->
								</div>
							</div>


						</div>
					</div>


				</div>
			</div>
			<!-- /.card-body -->

			<!-- /.card-footer -->
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->


<!-- 
<div class="card-body">
										<iframe
											src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31776.840952828436!2d105.22818308828114!3d-5.40095307397844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dac0b11ba767%3A0x9a3af1dfdaa5bfb2!2sMasjid%20Fatimah%20Zahro!5e0!3m2!1sen!2sid!4v1649392589946!5m2!1sen!2sid"
											width="100%" height="450" style="border:0;" allowfullscreen=""
											loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
									</div> -->
