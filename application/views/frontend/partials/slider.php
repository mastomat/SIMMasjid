</section>
<section>
    <div class="w-100 position-relative">
        <div class="feat-wrap v2 position-relative w-100">
            <div class="feat-caro">
                <?php foreach ($slider->result() as $data) {
                ?>
                    <div class="feat-item v2">
                        <div class="feat-img position-absolute" style="background-image: url(<?php echo base_url() ?>uploads/kegiatan/<?php echo $data->kegiatan_foto ?>);"></div>
                        <div class="feat-cap-wrap position-absolute d-inline-block">
                            <div class="feat-cap left-icon d-inline-block">
                                <i class="d-inline-block flaticon-rub-el-hizb thm-clr"></i>
                                <h2 class="mb-0"><?php echo $data->kegiatan_judul; ?></h2>
                                <p class="mb-0"></p>
                                <a class="thm-btn thm-bg" href="<?php echo base_url('kegiatan/') . $data->kegiatan_slug  ?>" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div><!-- Featured Area Wrap -->
    </div>
</section>
<section>
    <div class="w-100 position-relative">
        <div class="container">
            <div class="plyr-wrp v2 overlap45 overlap-45 w-100">
                <div class="row mrg">
                    <div class="col-md-12 col-sm-12 col-lg-4">
                        <h3 class="mb-0 text-center pat-bg thm-layer opc65 back-blend-multiply thm-bg" style="background-image: url(assets/frontend/images/pattern-bg.jpg);">Listen to Quran Audio
                        </h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-8">
                        <div class="plyr-inner position-relative pat-bg white-layer opc9 back-blend-multiply bg-white" style="background-image: url(assets/frontend/images/pattern-bg.jpg);">
                            <div class="plyr v2 w-100">
                                <ul class="playlist mb-0 list-unstyled">
                                    <li data-cover="assets/images/audio-cover.jpg" data-artist="(Sa'ad Al-Gamidi Mushaff)"><a href="assets/frontend/audio/055-Ar-Rahmaan.mp3" title="">Surah Rahmaan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>