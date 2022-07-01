<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?php echo $judul ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo $judul ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->


		<div class="card mb-5">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6 col-sm-12 ">

					</div>
					<div class="col-md-3 col-sm-12">
						<div id="totalbulan"></div>
					</div>
					<div class="col-md-3 col-sm-12">
						<div id="totalpengeluaran"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 "><button type="button" class="btn btn-md btn-primary  " data-toggle="modal"
							data-target="#modal-add">
							<i class="fas fa-plus-circle"></i> Tambah Data
						</button> </div>
					<div class="col-md-2 offset-md-8">
				
					</div>

				</div>




			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<table id="datakeluar" class="table table-bordered table-striped text-center display nowrap">
					<thead>

						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Keterangan</th>
							<th>Jumlah Pengeluaran</th>
							<th>Tanggal Pengeluaran</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody style="font-size: 20px;">

					</tbody>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Keterangan</th>
							<th>Jumlah pengeluaran</th>
							<th>Tanggal Pengeluaran</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->


</div>

<!-- /.card-body -->

<!-- /.card-footer -->

<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ./wrapper -->
