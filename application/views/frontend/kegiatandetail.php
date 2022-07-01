<section>
    <div class="w-100 pt-120 pb-260 position-relative">
        <img class="img-fluid sec-top-mckp position-absolute" src="<?php echo base_url() ?>assets/frontend/images/sec-top-mckp2.png" alt="Sec Top Mockup 2">

        <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="<?php echo base_url() ?>assets/frontend/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
        <div class="container">
            <div class="sec-title text-center w-100">
                <div class="sec-title-inner d-inline-block">
                    <i class="flaticon-rub-el-hizb thm-clr"></i>
                    <h2 class="mb-0"><?php echo $detail->kegiatan_judul ?></h2>

                </div>
            </div>
            <div class="post-detail-wrap w-100">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-9">
                        <div class="post-detail-inner w-100">
                            <div class="post-detail-img w-100">
                                <img class="img-fluid w-100" src="<?php echo base_url() ?>uploads/kegiatan/<?php echo $detail->kegiatan_foto ?>" alt="Blog Detail Image 1">
                            </div>
                            <div class="post-detail-info position-relative w-100">
                                <div class="post-info2-inner text-center">
                                    <div class="post-date2">
                                        <span class="d-block"><?php echo date(
                                                                    'd',
                                                                    strtotime($detail->kegiatan_waktu)
                                                                ); ?></span>
                                        <i class="d-block thm-bg"><?php echo date(
                                                                        'M Y',
                                                                        strtotime($detail->kegiatan_waktu)
                                                                    ); ?></i>
                                    </div>

                                </div>
                                <ul class="post-meta2 d-inline-flex flex-wrap align-items-center mb-0 list-unstyled">
                                    <li class="thm-clr"><?php
                                                        $now = time();
                                                        echo timespan(strtotime($detail->kegiatan_waktu), $now) . ' ago'; ?></li>
                                    <li class="thm-clr"><img class="img-fluid rounded-circle" src="<?php echo base_url() ?>assets/frontend/images/resources/post-author-thumb1-1.jpg" alt="Post Author Thumb 1">BY: <a href="javascript:void(0);" title=""><?php echo $detail->user_nama; ?></a></li>
                                </ul>
                                <!-- isinya disini -->
                                <h5 class="mb-0 mb-3"><?php echo $detail->kegiatan_judul ?></h5>
                                <p><?php echo $detail->kegiatan_isi; ?></p>

                            </div>
                            <div class="share-tags-wrap d-flex flex-wrap w-100">
                                <div class="share-links d-inline-flex">
                                    <span class="d-inline-block">Share This:</span>
                                    <div class="social-links4 v2 text-center d-inline-flex">
                                        <a href="https://www.tumblr.com/" title="Tumblr" target="_blank"><i class="fab fa-tumblr"></i></a>
                                        <a href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>

                            </div><!-- Share & Tags Wrap -->
                            <!-- Author Box Wrap -->
                            <!-- Comments Thread -->
                            <!-- Comment Reply -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <aside class="sidebar w-100">
                            <div class="widget2 w-100">
                                <h3 class="widget-title2"><i class="fas fa-calendar-day"></i> Kegiatan Terbaru</h3>
                                <div class="mini-posts-wrap w-100">
                                    <?php foreach ($recent_kegiatan as $data) {

                                    ?>
                                        <div class="mini-post-box d-flex flex-wrap w-100">
                                            <a href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title=""><img class="img-fluid w-100" src="<?php echo base_url() ?>uploads/kegiatan/<?php echo $data->kegiatan_foto ?>" style="width: 75; height: 75;" alt="Mini Post Image 1"></a>
                                            <div class="mini-post-info">
                                                <span class="d-block thm-clr"><?php echo date(
                                                                                    'd M Y',
                                                                                    strtotime($data->kegiatan_waktu)
                                                                                ); ?></span>
                                                <h4 class="mb-0"><a href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title=""><?php echo $data->kegiatan_judul; ?></a></h4>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <div class="widget2 w-100">
                                <h3 class="widget-title2"><i class="fas fa-bullhorn"></i> Pengumuman Terbaru</h3>
                                <div class="mini-posts-wrap w-100">
                                    <?php foreach ($recent_pengumuman as $data) {

                                    ?>
                                        <div class="mini-post-box d-flex flex-wrap w-100">
                                            <a href="<?php echo base_url('pengumuman/') . $data->pengumuman_slug  ?>" title=""><img class="img-fluid w-100" src="<?php echo base_url() ?>uploads/pengumuman/<?php echo $data->pengumuman_foto ?>" style="width: 75; height: 75;" alt="Mini Post Image 1"></a>
                                            <div class="mini-post-info">
                                                <span class="d-block thm-clr"><?php echo date(
                                                                                    'd M Y',
                                                                                    strtotime($data->pengumuman_waktu)
                                                                                ); ?></span>
                                                <h4 class="mb-0"><a href="<?php echo base_url('pengumuman/') . $data->pengumuman_slug  ?>" title=""><?php echo $data->pengumuman_judul; ?></a></h4>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                        </aside><!-- Sidebar -->
                    </div>

                </div>
            </div><!-- Post Detail Wrap -->
        </div>
    </div>
</section>