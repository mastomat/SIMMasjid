<section>
    <div class="w-100 pt-120 pb-280 position-relative">
        <img class="img-fluid sec-top-mckp position-absolute" src="<?php echo base_url() ?>assets/frontend/images/sec-top-mckp2.png" alt="Sec Top Mockup 2">

        <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="<?php echo base_url() ?>assets/frontend/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
        <div class="container">
            <div class="sec-title text-center w-100">
                <div class="sec-title-inner d-inline-block">
                    <i class="flaticon-rub-el-hizb thm-clr"></i>
                    <h2 class="mb-0">List Kegiatan</h2>

                </div>
            </div>
            <div class="blog-wrap w-100">
                <div class="row">
                    <?php foreach ($kegiatanlists as $data) {
                    ?>

                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="post-box w-100">
                                <div class="post-img overflow-hidden position-relative w-100">
                                    <a href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title=""><img class="img-fluid w-100" src="<?php echo base_url() ?>uploads/kegiatan/<?php echo $data->kegiatan_foto ?>" style="width: 350px; height: 260px;" alt="Blog Image 1"></a>
                                </div>
                                <div class="post-info position-relative w-100">
                                    <a class="thm-bg" href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title=""><i class="fas fa-link"></i></a>
                                    <span class="post-date thm-clr"><?php echo date(
                                                                        'd M Y',
                                                                        strtotime($data->kegiatan_waktu)
                                                                    ); ?></span>
                                    <h3 class="mb-0"><a href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title=""><?php echo $data->kegiatan_judul; ?></a></h3>
                                    <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                        <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title=""><?php echo $data->user_nama; ?></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div><!-- Blog Wrap -->

            <?php echo $pagination; ?>

        </div>
</section>