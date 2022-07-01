<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="background-color: cadetblue;">
	<!-- Brand Logo -->


	<!-- Sidebar -->
	<div class="sidebar ">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex ">
			<div class="image">
				<img src="<?php echo base_url() ?>assets/upload/logo/<?php echo $logo ?>" style="width: 100%;" class=" elevation-0" alt="User Image">
			</div>

		</div>


		<!-- SidebarSearch Form -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-header">Home</li>
				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/dasbor" class="nav-link <?= ($this->uri->segment(1) == 'admin') ? 'active' : ''; ?> ">
						<i class="nav-icon fa fa-home"></i>
						<p>
							Dashboard

						</p>
					</a>
				</li>
				<li class="nav-header">Kegiatan</li>
				<li class="nav-item ">
					<a href="<?php echo base_url() ?>k_kegiatan/index" class="nav-link <?= ($this->uri->segment(1) == 'k_kegiatan') ? 'active' : ''; ?> ">
						<i class="fas fa-calendar-plus nav-icon"></i>
						<p>
							Kegiatan

						</p>
					</a>
				</li>
				<li class="nav-item ">
					<a href="<?php echo base_url() ?>k_pengumuman/index" class="nav-link <?= ($this->uri->segment(1) == 'k_pengumuman') ? 'active' : ''; ?> ">
						<i class="fas fa-blog nav-icon"></i>
						<p>
							Pengumuman

						</p>
					</a>
				</li>
				<?php if ($this->session->userdata("role") == "super") {
			
		 ?>
				<li class="nav-header">Keuangan</li>
				<li class="nav-item <?= ($this->uri->segment(1) == 'k_pemasukan' || $this->uri->segment(1) == 'k_jenispemasukan' || $this->uri->segment(1) == 'k_pengeluaran') ? 'menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= ($this->uri->segment(1) == 'k_pemasukan' || $this->uri->segment(1) == 'k_jenispemasukan') ? 'active' : ''; ?>">
						<i class="fab fa-accusoft nav-icon"></i>
						<p>
							Kas Masjid
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="<?php echo base_url() ?>k_pemasukan/index" class="nav-link <?= ($this->uri->segment(1) == 'k_pemasukan') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Pemasukan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>k_pengeluaran/index" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pengeluaran</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>k_jenispemasukan/index" class="nav-link <?= ($this->uri->segment(1) == 'k_jenispemasukan') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Jenis Pemasukan</p>
							</a>
						</li>
					</ul>
				</li>

				<?php } ?>
				<li class="nav-header">Configuration</li>
				<?php if ($this->session->userdata("role") == "super") {
			
			?>
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_user/index" class="nav-link <?= ($this->uri->segment(1) == 'k_user') ? 'active' : ''; ?>">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Data User
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_galeri/index" class="nav-link <?= ($this->uri->segment(1) == 'k_galeri') ? 'active' : ''; ?>">
						<i class="fas fa-photo-video nav-icon"></i>
						<p>
							Gallery
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				<?php if ($this->session->userdata("role") == "super") {
			
			?>
				<li class="nav-item">
					<a href="<?php echo base_url() ?>k_masjid/index" class="nav-link <?= ($this->uri->segment(1) == 'k_masjid') ? 'active' : ''; ?>">
						<i class="fas fa-mosque nav-icon"></i>
						<p>
							Data Masjid
							<span class="badge badge-info right"></span>
						</p>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>