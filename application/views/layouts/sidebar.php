    <body class="o-page">
        <div class="o-page__sidebar js-page-sidebar">
            <div class="c-sidebar">
                <a class="c-sidebar__brand" href="#">
                    <img class="c-sidebar__brand-img" src="<?php echo base_url(); ?>resources/img/logo.png" alt="Logo"> Dashboard
                </a>

                <h4 class="c-sidebar__title">Dashboards</h4>
                <ul class="c-sidebar__list">

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link is-active" href="<?php echo site_url('administrator/dashboard') ?>">
                            <i class="fa fa-home u-mr-xsmall"></i>Overview
                        </a>
                    </li>

                    <li class="c-sidebar__item has-submenu">
                        <a class="c-sidebar__link" data-toggle="collapse" href="#sidebar-submenu" aria-expanded="false" aria-controls="sidebar-submenu">
                            <i class="fa fa-street-view u-mr-xsmall"></i>Instruktur
                        </a>
                        <ul class="c-sidebar__submenu collapse" id="sidebar-submenu">
                            <li><a class="c-sidebar__link" href="<?php echo site_url('administrator/instrukturs') ?>">Instruktur Terverifikasi</a></li>
                            <li><a class="c-sidebar__link" href="<?php echo site_url('administrator/instrukturs/requested') ?>">Pendaftar Instruktur</a></li>
                        </ul>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="<?php echo site_url('administrator/members') ?>">
                            <i class="fa fa-users u-mr-xsmall"></i>Member
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="<?php echo site_url('administrator/events') ?>">
                            <i class="fa fa-clock-o u-mr-xsmall"></i>Event
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="<?php echo site_url('administrator/order') ?>">
                            <i class="fa fa-clock-o u-mr-xsmall"></i>Pembayaran
                        </a>
                    </li>
                </ul>
            </div><!-- // .c-sidebar -->
        </div><!-- // .o-page__sidebar -->
