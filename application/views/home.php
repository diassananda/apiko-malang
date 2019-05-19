<div class="row" style="margin-right:0px;margin-left:0px;">
    <div class="col-lg-3 order-lg-2">
        <form class="c-search-form c-search-form--dark">

            <h5 class="c-search-form__label">Sort By</h5>
            <div class="c-search-form__section u-flex">
                <div class="c-choice c-choice--radio u-mr-small">
                    <input class="c-choice__input" id="radio1" name="radios" type="radio">
                    <label class="c-choice__label" for="radio1">Harga Terendah</label>
                </div>

                <div class="c-choice c-choice--radio">
                    <input class="c-choice__input" id="radio2" name="radios" type="radio">
                    <label class="c-choice__label" for="radio2">Harga Tertinggi</label>
                </div>
            </div>
            <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Search</button>
        </form>
    </div>

    <div class="col-lg-9 order-lg-1">
        <div class="row">
            <?php foreach ($events as $event) { ?>
                <?php if ($event->verified == 1) { ?>
                    <div class="col-md-6">
                        <div class="c-search-result">

                            <div class="o-media">
                                <div class="o-media__img u-mr-small">
                                    <div class="c-avatar c-avatar--medium">
                                        <img class="c-avatar__img" src="<?php echo base_url(), '/resources/img/instruktur_photo/', $event->foto; ?>" alt="<?php echo 'foto ', $event->nama; ?>">
                                    </div>
                                </div>
                                <div class="o-media__body">
                                    <h4 class="c-search-result__title"><?php echo $event->nama; ?></h4>
                                    <p class="c-search-result__meta"> <?php echo $event->agenda; ?> <br>Event | <?php echo $event->jumlah_sesi; ?> Sesi | <?php echo 'Rp ', $event->harga, ',-'; ?> | <?php echo $event->durasi, ' Menit'; ?> | <?php echo ($event->jumlah_murid - $event->pendaftar) . ' Kuota'; ?> | <?php echo $event->jadwal; ?></p>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="<?php echo site_url('instruktur/profile/'), $event->id_instruktur, '/', $event->id, '/event'; ?>" type="button" class="c-btn c-btn--fancy c-btn--fullwidth" name="button">Profil Instruktur</a>
                                    </div>
                                    <div class="col-6">
                                        <!-- <a href="<?php echo site_url('instruktur/kelas/') . $event->nama ?>"><button type="button" class="c-btn c-btn--secondary c-btn--fullwidth" name="button">Kelas Lain</button></a> -->
                                        <form action="<?php echo site_url('instruktur/kelas/') ?>">
                                            <input type="hidden" name="nama" value="<?php echo $event->nama; ?>">
                                            <button type="submit" class="c-btn c-btn--secondary c-btn--fullwidth">Kelas Lain</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
        } ?>
            <?php foreach ($regulers as $reguler) { ?>
                <div class="col-md-6">
                    <div class="c-search-result">

                        <div class="o-media">
                            <div class="o-media__img u-mr-small">
                                <div class="c-avatar c-avatar--medium">
                                    <img class="c-avatar__img" src="<?php echo base_url(), '/resources/img/instruktur_photo/', $reguler->foto; ?>" alt="<?php echo 'foto ', $reguler->nama; ?>">
                                </div>
                            </div>
                            <div class="o-media__body">
                                <h4 class="c-search-result__title"><?php echo $reguler->nama; ?></h4>
                                <p class="c-search-result__meta"><?php echo $reguler->agenda; ?> <br> Reguler | <?php echo $reguler->jumlah_sesi; ?> Sesi | <?php echo 'Rp ', $reguler->harga, ',-'; ?> | <?php echo $reguler->durasi, ' Menit'; ?> </p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <a href="<?php echo site_url('instruktur/profile/'), $reguler->id_instruktur, '/', $reguler->id, '/reguler'; ?>" type="button" class="c-btn c-btn--fancy c-btn--fullwidth" name="button">Profil Instruktur</a>
                                </div>
                                <div class="col-6">
                                    <!-- <a href="<?php echo site_url('instruktur/kelas/') . $reguler->nama ?>"><button type="button" class="c-btn c-btn--secondary c-btn--fullwidth" name="button">Kelas Lain</button></a> -->
                                    <form action="<?php echo site_url('instruktur/kelas/') ?>">
                                        <input type="hidden" name="nama" value="<?php echo $reguler->nama; ?>">
                                        <button type="submit" class="c-btn c-btn--secondary c-btn--fullwidth">Kelas Lain</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php foreach ($pakets as $paket) { ?>
                <div class="col-md-6">
                    <div class="c-search-result">

                        <div class="o-media">
                            <div class="o-media__img u-mr-small">
                                <div class="c-avatar c-avatar--medium">
                                    <img class="c-avatar__img" src="<?php echo base_url(), '/resources/img/instruktur_photo/', $paket->foto; ?>" alt="<?php echo 'foto ', $paket->nama; ?>">
                                </div>
                            </div>
                            <div class="o-media__body">
                                <h4 class="c-search-result__title"><?php echo $paket->nama; ?></h4>
                                <p class="c-search-result__meta"><?php echo $paket->agenda; ?> <br> Paket | <?php echo $paket->jumlah_sesi; ?> Sesi | <?php echo 'Rp ', $paket->harga, ',-'; ?> | <?php echo $paket->durasi, ' Menit'; ?> </p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <a href="<?php echo site_url('instruktur/profile/'), $paket->id_instruktur, '/', $paket->id, '/paket'; ?>" type="button" class="c-btn c-btn--fancy c-btn--fullwidth" name="button">Profil Instruktur</a>
                                </div>
                                <div class="col-6">
                                    <!-- <a href="<?php echo site_url('instruktur/kelas/') . $paket->nama ?>"><button type="button" class="c-btn c-btn--secondary c-btn--fullwidth" name="button">Kelas Lain</button></a> -->
                                    <form action="<?php echo site_url('instruktur/kelas/') ?>">
                                        <input type="hidden" name="nama" value="<?php echo $paket->nama; ?>">
                                        <button type="submit" class="c-btn c-btn--secondary c-btn--fullwidth">Kelas Lain</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row u-mb-xlarge">
            <div class="col-12">
                <nav class="c-pagination u-justify-center">
                    <ul class="c-pagination__list">
                        <li class="c-pagination__item">
                            <a class="c-pagination__control" href="#">
                                <i class="fa fa-caret-left"></i>
                            </a>
                        </li>

                        <li class="c-pagination__item"><a class="c-pagination__link" href="#">1</a></li>
                        <li class="c-pagination__item"><a class="c-pagination__link" href="#">2</a></li>
                        <li class="c-pagination__item">
                            <a class="c-pagination__link is-active" href="#">3</a>
                        </li>
                        <li class="c-pagination__item"><a class="c-pagination__link" href="#">4</a></li>

                        <li class="c-pagination__item">
                            <a class="c-pagination__control" href="#">
                                <i class="fa fa-caret-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav><!-- // .c-pagination -->
            </div>
        </div><!-- // .row -->
    </div>

</div><!-- // .row -->
</div><!-- // .container -->

<script src="<?php echo base_url(); ?>/resources/js/main.min.js"></script>
</body>

</html>