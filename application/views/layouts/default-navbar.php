<!-- Add your site or application content here -->
<header class="c-navbar">
    <a class="c-navbar__brand" href="<?php echo site_url('home') ?>">

    </a>

    <!-- Navigation items that will be collapes and toggle in small viewports -->
    <nav class="c-nav collapse" id="main-nav">
        <ul class="c-nav__list">
            <li class="c-nav__item">
                <a class="c-nav__link" href="<?php echo site_url('home') ?>">Home</a>
            </li>
            <li class="c-nav__item">
                <div class="c-dropdown u-ml-auto dropdown">
                    <a class="c-nav__link has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kelas
                    </a>

                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-left" aria-labelledby="dropdwonMenuAvatar">
                        <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('/regulers') ?>">Reguler</a>
                        <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('/pakets') ?>">Paket</a>
                        <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('/events') ?>">Event</a>
                    </div>
                </div>
            </li>
            <li class="c-nav__item">
                <a class="c-nav__link" href="#instruktur-modal" data-toggle="modal" data-target="#instruktur-modal">Menjadi Pelatih</a>
            </li>
            <li class="c-nav__item">
                <div class="c-field c-field--inline has-icon-right u-hidden-up@tablet">
                    <span class="c-field__icon">
                        <i class="fa fa-search"></i>
                    </span>

                    <label class="u-hidden-visually" for="navbar-search-small">Cari</label>

                    <input class="c-input" id="navbar-search-small" type="text" placeholder="Search">

                </div>
            </li>
        </ul>
    </nav>

    <form action="<?php echo site_url('home/search/') ?>" method="GET" style="margin-bottom:0px">
        <div class="c-field has-icon-right c-navbar__search u-hidden@mobile">
            <span class="c-field__icon">
                <i class="fa fa-search"></i>
            </span>
            <label class="u-hidden-visually" for="navbar-search">Cari</label>
            <input type="hidden" value="<?php echo $this->uri->segment(1);  ?>" name="url">
            <input class="c-input" id="navbar-search" type="text" placeholder="Search" name="agenda" value="<?php if ($cari != NULL) { echo $cari;}?>">
        </div>
    </form>

    <!-- // Navigation items  -->

    <?php if ($this->session->userdata('akses_level') != 'Administrator' and $this->session->userdata('akses_level') != NULL) { ?>
        <div class="c-dropdown dropdown u-ml-auto">
            <a class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#9fa9ba">
                <?php if ($this->session->userdata('akses_level') == 'Instruktur') { ?>
                    <img class="c-avatar__img" src="<?php echo base_url('resources/img/instruktur_photo/'),  $this->session->userdata('foto') ?>" alt="User's Profile Picture">&nbsp;&nbsp;
                    <!-- <img src="<?php echo base_url('resources/img/instruktur_photo/'); ?><?php echo $this->session->userdata('foto') ?>" alt="Adam's image"> -->

                <?php } else { ?>
                    <!-- <img class="c-avatar__img" src="<?php echo base_url('resources/img/instruktur_photo/'),  $this->session->userdata('foto') ?>" alt="User's Profile Picture">&nbsp;&nbsp; -->
                    <img class="c-avatar__img" src="<?php echo base_url('resources/img/member_photo/'); ?><?php echo $this->session->userdata('foto') ?>" alt="Adam's image">

                <?php } ?>
                <?php echo $this->session->userdata('nama')  ?>
            </a>
            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                <?php if ($this->session->userdata('akses_level') == "Instruktur") { ?>
                    <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('instruktur/profile/' . $this->session->userdata('id')) ?>">Akun Saya</a>
                <?php } else { ?>
                    <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('member/profile/' . $this->session->userdata('id')) ?>">Akun Saya</a>
                <?php }; ?>
                <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('home/logout') ?>">Logout</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="c-btn-group u-ml-auto">
            <a class="c-btn c-btn--blue u-hidden-down@mobile" href="#loginModal" data-toggle="modal" data-target="#loginModal">Login</a>
            <a class="c-btn c-btn--secondary u-hidden-down@mobile" href="#add-modal" data-toggle="modal" data-target="#add-modal">Register</a>
        </div>
    <?php }; ?>

    <button class="c-nav-toggle" type="button" data-toggle="collapse" data-target="#main-nav">
        <span class="c-nav-toggle__bar"></span>
        <span class="c-nav-toggle__bar"></span>
        <span class="c-nav-toggle__bar"></span>
    </button><!-- // .c-nav-toggle -->


</header>

<br>

<div class="container">

    <!-- Modal Login -->

    <div class="c-modal c-modal--large modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content" style="height:300px;">
                <div class="o-media c-card u-border-zero">
                    <!-- `font-size: 0` is a quick fix to remove weird spacing -->
                    <div class="o-media__img u-hidden-down@tablet" style="font-size: 0;">
                        <img src="<?php echo base_url(); ?>/resources/img/billing.jpg" alt="Image">
                    </div>

                    <div class="o-media__body u-p-medium">
                        <form class="" action="<?php echo site_url('home/login'); ?>" method="post">
                            <div class="o-line u-align-items-start">
                                <h3 class="u-mb-medium">Login</h3>

                                <span class="c-modal__close u-text-mute" data-dismiss="modal" aria-label="Close">
                                    <i class="u-opacity-medium fa fa-close"></i>
                                </span>
                            </div>


                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="email">Email</label>
                                    <input class="c-input" name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="password">Password</label>
                                    <input class="c-input" name="password" id="password" type="password" placeholder="Password">
                                </div>
                            </div>

                            <br>

                            <input class="c-btn c-btn--success c-btn--fullwidth u-mb-small" name="submit" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Register Member -->

    <div class="c-modal c-modal--large modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">
                <div class="o-media c-card u-border-zero">
                    <!-- `font-size: 0` is a quick fix to remove weird spacing -->
                    <div class="o-media__img u-hidden-down@tablet" style="font-size: 0;">
                        <img src="<?php echo base_url(); ?>/resources/img/billing.jpg" alt="Image">
                    </div>

                    <div class="o-media__body u-p-medium">
                        <form class="" action="<?php echo site_url('member/register'); ?>" method="post">
                            <div class="o-line u-align-items-start">
                                <h3 class="u-mb-medium">Register Member</h3>

                                <span class="c-modal__close u-text-mute" data-dismiss="modal" aria-label="Close">
                                    <i class="u-opacity-medium fa fa-close"></i>
                                </span>
                            </div>


                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="email">Nama</label>
                                    <input class="c-input" name="nama" id="nama" type="text" placeholder="Nama">
                                </div>
                            </div>

                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="c-select" name="jenis_kelamin" id="jenis_kelamin" value="" style="width:100%;">
                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                    </select>
                                </div>
                            </div>

                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="email">Email</label>
                                    <input class="c-input" name="email" type="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="email">No. Telepon</label>
                                    <input class="c-input" name="no_telepon" id="no_telepon" type="text" placeholder="No. Telepon">
                                </div>
                            </div>

                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="alamat">Alamat</label>
                                    <textarea class="c-input" name="alamat" id="alamat"></textarea>

                                </div>
                            </div>

                            <div class="c-field u-mb-xsmall">
                                <div class="c-field has-icon-left">
                                    <span class="c-field__icon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <label class="c-field__label u-hidden-visually" for="password">Password</label>
                                    <input class="c-input" name="password" type="password" placeholder="Password">
                                </div>
                            </div>

                            <br>

                            <input class="c-btn c-btn--success c-btn--fullwidth u-mb-small" name="submit" type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Instruktur -->
    <div class="c-modal modal fade" id="instruktur-modal" tabindex="-1" role="dialog" aria-labelledby="instruktur-modal" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Daftar Instruktur</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Lengkapi data diri berikut ini.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <form class="" action="<?php echo site_url('instruktur/add_instruktur') ?>" method="post">

                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="nama">Nama Lengkap</label>
                                    <input class="c-input" type="text" name="nama" placeholder="" value="">
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="c-select" name="jenis_kelamin">
                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                        <option>Perempuan</option>
                                        <option>Laki-laki</option>
                                    </select>
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="alamat">Alamat</label>
                                    <textarea class="c-input" name="alamat"></textarea>
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="email">Email</label>
                                    <input class="c-input" type="text" name="email" placeholder="" value="">
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="no_telepon">Nomor Telepon</label>
                                    <input class="c-input" type="text" name="no_telepon" placeholder="" value="">
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="lama_melatih">Lama Melatih <small>(dalam tahun)</small></label>
                                    <input class="c-input" type="text" name="lama_melatih" placeholder="" value="">
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="pengalaman_melatih">Pengalaman Melatih</label>
                                    <textarea class="c-input" name="pengalaman_melatih"></textarea>
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="keahlian_khusus">Keahlian Khusus</label>
                                    <textarea class="c-input" name="keahlian_khusus"></textarea>
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="sertifikasi">Sertifikasi</label>
                                    <textarea class="c-input" name="sertifikasi"></textarea>
                                </div>
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="password">Password</label>
                                    <input class="c-input" type="password" name="password" placeholder="" value="">
                                </div>
                                <div class="c-field u-mb-small">
                                    <input class="c-btn c-btn--success c-btn--fullwidth" type="submit" name="" value="Daftar Instruktur">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
</div>