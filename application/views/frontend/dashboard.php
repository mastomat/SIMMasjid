<section>
	<div class="w-100 pt-120 pb-100 position-relative">
		<img class="img-fluid sec-top-mckp position-absolute" src="assets/frontend/images/sec-top-mckp2.png"
			alt="Sec Top Mockup 2">
		<div class="container">
			<div class="sec-title text-center w-100">
				<div class="sec-title-inner d-inline-block">
					<i class="flaticon-rub-el-hizb thm-clr"></i>
					<h2 class="mb-0">Pengumuman Masjid Terbaru</h2>
					<p class="mb-0">Daftar Pengumuman Masjid Masjid</p>
				</div>
			</div>
			<div class="cart-wrap w-100">
				<form class="cart-form w-100">
					<table class="cart-table w-100">
						<thead>
							<tr>
								<th colspan="2">Pengumuman</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php
                            $no = 0;
                            foreach ($pengumuman->result() as $data) {
                                $no++;   # code...
                            ?>
							<tr>
								<td class="product-img">
									<?php echo $no  ?>
								</td>
								<td class="product-name">
									<h5 class="mb-0"><a style="color: red;"
											href="<?php echo base_url('pengumuman/') . $data->pengumuman_slug; ?>"
											title=""><i class="fas fa-volume-up"></i>
											<?php echo $data->pengumuman_judul  ?></a></h5>

								</td>
								<td class="product-price"><span><?php echo $data->pengumuman_waktu  ?></span></td>

								<td class="product-total-price"><span><a class="btn bg-color2"
											href="<?php echo base_url('pengumuman/') . $data->pengumuman_slug; ?>"><i
												class="fas fa-search-plus"></i> Lihat</a></span></td>
							</tr>
							<?php } ?>
						</tbody>
					</table><!-- Cart Table -->
				</form>
				<!-- Coupon & Cart Total Wrap -->
			</div><!-- Cart Wrap -->
			<div class="view-more mt-50 d-inline-block text-center w-100">
				<a class="thm-btn bg-color1" href="<?php echo base_url('pengumuman/list') ?>" title="">Daftar
					Pengumuman<span></span><span></span><span></span><span></span></a>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="w-100 pt-100 pb-100 position-relative">
		<img class="img-fluid sec-top-mckp position-absolute" src="assets/frontend/images/sec-top-mckp2.png"
			alt="Sec Top Mockup 2">

		<div class="container">
			<div class="sec-title text-center w-100">
				<div class="sec-title-inner d-inline-block">
					<i class="flaticon-rub-el-hizb thm-clr"></i>
					<h2 class="mb-0">Kegiatan Masjid Terbaru</h2>
					<p class="mb-0">Dokumentasi Kegiatan Masjid</p>
				</div>
			</div><!-- Sec Title -->
			<div class="blog-wrap2 w-100">
				<?php foreach ($kegiatan->result() as $data) {
                ?>
				<div class="post-box2 position-relative d-flex flex-wrap align-items-center w-100 "
					style="margin-bottom: 100px;">
					<div class="post-img2 overflow-hidden position-absolute">
						<a href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title=""><img
								class="img-fluid "
								src="<?php echo base_url() ?>uploads/kegiatan/<?php echo $data->kegiatan_foto ?>"
								style="width: 697px; height: 400px;" alt="Blog Image 1"></a>
					</div>

					<div class="post-info2">
						<div class="post-info2-inner text-center">
							<div class="post-date2">
								<span class="d-block"><?php echo date(
                                                                'd',
                                                                strtotime($data->kegiatan_waktu)
                                                            ); ?></span>
								<i class="d-block thm-bg"><?php echo date(
                                                                    'M Y',
                                                                    strtotime($data->kegiatan_waktu)
                                                                ); ?></i>
							</div>

						</div>
						<ul class="post-meta2 d-inline-flex flex-wrap align-items-center mb-0 list-unstyled">
							<li class="thm-clr"><?php
                                                    $now = time();
                                                    echo timespan(strtotime($data->kegiatan_waktu), $now) . ' ago'; ?>
							</li>
							<li class="thm-clr"><img class="img-fluid rounded-circle"
									src="assets/frontend/images/resources/post-author-thumb1-1.jpg"
									alt="Post Author Thumb 1">BY: <a href="javascript:void(0);"
									title=""><?php echo $data->user_nama; ?></a></li>
						</ul>
						<h3 class="mb-0"><a href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>"
								title=""><?php echo $data->kegiatan_judul; ?></a></h3>

						<a class="thm-btn thm-bg" href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>"
							title="">Continue
							Reading<span></span><span></span><span></span><span></span></a>
						<div class="post-share position-relative">
							<i class="fas fa-share"></i>
							<span class="post-share-social position-absolute">
								<a href="https://twitter.com/" title="Twtiiter" target="_blank"><i
										class="fab fa-twitter"></i></a>
								<a href="https://www.facebook.com/" title="Facebook" target="_blank"><i
										class="fab fa-facebook-f"></i></a>
								<a href="https://www.youtube.com/" title="Youtube" target="_blank"><i
										class="fab fa-youtube"></i></a>
								<a href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i
										class="fab fa-linkedin-in"></i></a>
								<a href="https://www.instagram.com/" title="Instagram" target="_blank"><i
										class="fab fa-instagram"></i></a>
							</span>
						</div>
					</div>
				</div>

				<?php } ?>

			</div><!-- Blog Wrap 2 -->
			<div class="view-more mt-50 d-inline-block text-center w-100" >
				<a class="thm-btn bg-color1" href="<?php echo base_url('kegiatan/list') ?>" title="">Daftar
					Kegiatan<span></span><span></span><span></span><span></span></a>
			</div><!-- View More -->
		</div>
	</div>
</section>

<section>
	<div class="w-100 pt-70 pb-100  position-relative">
		<img class="img-fluid sec-top-mckp position-absolute" src="assets/frontend/images/sec-top-mckp2.png"
			alt="Sec Top Mockup 2">
		<img class="sec-btm-mckp img-fluid position-absolute" src="assets/frontend/images/sec-botm-mckp.png"
			alt="Sec Bottom Mockup 2">
		<div class="container">
			<div class="sec-title text-center w-100">
				<div class="sec-title-inner d-inline-block">
					<i class="flaticon-rub-el-hizb thm-clr"></i>
					<h2 class="mb-0">Galeri Foto Kegiatan</h2>
					<p class="mb-0">Dokumentasi Kegiatan</p>
				</div>
			</div>
			<div class="gallery-wrap w-100">
				<div class="row">
					<?php foreach ($galeri->result() as $data) {
                    ?>
					<div class="col-md-6 col-sm-6 col-lg-4">
						<div class="gallery-box text-center overflow-hidden position-relative w-100">
							<img class="img-fluid w-100"
								src="<?php echo base_url() ?>uploads/gallery/<?php echo $data->galeri_foto ?>"
								alt="Gallery Image 2">
							<div class="gallery-info position-absolute">
								<h3 class="mb-0"><?php echo $data->galeri_nama ?></h3>
								<span class="d-block thm-clr"><?php echo $data->namauser ?></span>
								<a class="d-inline-block thm-clr"
									href="<?php echo base_url() ?>uploads/gallery/<?php echo $data->galeri_foto ?>"
									data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div><!-- Gallery Wrap -->
			<div class="view-more mt-50 d-inline-block text-center w-100">
				<a class="thm-btn bg-color1" href="<?php echo base_url('galeri/list') ?>" title="">Daftar Galeri<span></span><span></span><span></span><span></span></a>
			</div><!-- Pagination Wrap -->
		</div>
	</div>
</section>
