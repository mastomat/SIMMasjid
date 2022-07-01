<section>
    <div class="w-100 pt-120 pb-280 position-relative">
        <img class="img-fluid sec-top-mckp position-absolute" src="<?php echo base_url() ?>assets/frontend/images/sec-top-mckp2.png" alt="Sec Top Mockup 2">

        <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="<?php echo base_url() ?>assets/frontend/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
        <div class="container">
            <div class="sec-title text-center w-100">
                <div class="sec-title-inner d-inline-block">
                    <i class="flaticon-rub-el-hizb thm-clr"></i>
                    <h2 class="mb-0">Daftar Galeri</h2>

                </div>
            </div>
            <div class="blog-wrap w-100">
                <div class="row">
                    <?php foreach ($galerilists as $data) { ?>

                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="gallery-box text-center overflow-hidden position-relative w-100">
                                <img class="img-fluid w-100" src="<?php echo base_url() ?>uploads/gallery/<?php echo $data->galeri_foto ?>" alt="Gallery Image 2">
                                <div class="gallery-info position-absolute">
                                    <h3 class="mb-0"><?php echo $data->galeri_nama ?></h3>
                                    <span class="d-block thm-clr"><?php echo $data->user_nama ?></span>
                                    <a class="d-inline-block thm-clr" href="<?php echo base_url() ?>uploads/gallery/<?php echo $data->galeri_foto ?>" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div><!-- Blog Wrap -->

            <?php echo $pagination; ?>

        </div>
</section>