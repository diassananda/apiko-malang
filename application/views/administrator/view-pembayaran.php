<div class="row u-mb-large">
    <div class="col-md-12">
        <div class="c-table-responsive@desktop">
            <table class="c-table" id="datatable">
                <caption class="c-table__title">
                    <div class="row">
                        <div class="col-6">
                            Pembayaran <small>Daftar Pembayaran</small>
                        </div>
                        <div class="col-6" style="text-align:right;">

                        </div>
                    </div>
                </caption>
                <thead class="c-table__head c-table__head--slim">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head no-sort">No.</th>
                        <th class="c-table__cell c-table__cell--head no-sort" style="text-align:center;">Jenis</th>
                        <th class="c-table__cell c-table__cell--head no-sort" style="text-align:center;">Detail Member</th>
                        <th class="c-table__cell c-table__cell--head no-sort" style="text-align:center;">Detail Pemesanan</th>
                        <th class="c-table__cell c-table__cell--head no-sort" style="text-align:center;">Detail Pembayaran</th>
                        <th class="c-table__cell c-table__cell--head no-sort" style="text-align:center;">Status</th>
                        <th class="c-table__cell c-table__cell--head no-sort" style="text-align:center;">Option</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_bayar_event as $db) :
                        ?>
                        <tr class="c-table__row">
                            <td class="c-table__cell"><?php echo $no; ?></td>
                            <td class="c-table__cell" style="text-align:center;">Event</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalMember', $no; ?>">Lihat</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalPesan', $no; ?>">Lihat</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalBayar', $no; ?>">Lihat</a></td>
                            <?php if ($db->status == "0") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:yellow; background-color:#38362e;">Belum Dibayar</p>
                                </td>
                            <?php } else if ($db->status == "1") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:blue; background-color:#c0c9e0;">Belum Dikonfirmasi</p>
                                </td>
                            <?php } else if ($db->status == "2") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:green; background-color:#c0e0d4;">Sudah Dikonfirmasi</p>
                                </td>
                            <?php } else if ($db->status == "3") { ?>
                                <td class="c-table__cell" style="text-align:center;    ">
                                    <p style="border-style: solid; color:red; background-color:#e0c9c0; ">Ditolak</p>
                                </td>
                            <?php } else { ?>
                                <td class="c-table__cell" style="text-align:center;   ">
                                    <p style="border-style: solid; color:red; background-color:#e0c9c0;">Dibatalkan</p>
                                </td>
                            <?php } ?>

                            <td class="c-table__cell ">
                                <div class="c-dropdown dropdown " style="left: 30%;">
                                    <?php if ($db->status == "1") { ?>
                                        <button class="c-btn c-btn--info has-dropdown dropdown-toggle" id="dropdownMenuButton12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>

                                        <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/order/confirm_order/' . $db->id_pesan.'/pemesanan') ?>">Konfirmasi Pembayaran</a>
                                            <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/order/cancel_order/' . $db->id_pesan . '/' . $db->id_event . '/'.'pemesanan'.'/'. $db->pendaftar) ?>">tolak Pembayaran</a>

                                        </div>
                                    <?php } ?>
                                </div>
                            </td>

                        </tr>
                        <?php
                        $no++;
                    endforeach; ?>
                    <!-- Buat Reguler -->
                    <?php foreach ($data_bayar_reguler as $db) :
                        ?>
                        <tr class="c-table__row">
                            <td class="c-table__cell"><?php echo $no; ?></td>
                            <td class="c-table__cell" style="text-align:center;">Reguler</td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalMember', $no; ?>">Lihat</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalPesan', $no; ?>">Lihat</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalBayar', $no; ?>">Lihat</a></td>
                            <?php if ($db->status == "0") { ?>
                                <td class="c-table__cell" style="text-align:center; ">
                                    <p style="border-style: solid; color:yellow; background-color:#38362e;">Belum Dibayar</p>
                                </td>
                            <?php } else if ($db->status == "1") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:blue; background-color:#c0c9e0;">Belum Dikonfirmasi</p>
                                </td>
                            <?php } else if ($db->status == "2") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:green; background-color:#c0e0d4;">Sudah Dikonfirmasi</p>
                                </td>
                            <?php } else if ($db->status == "3") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:red; background-color:#e0c9c0;">Ditolak</p>
                                </td>
                            <?php } else { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:red; background-color:#e0c9c0;">Dibatalkan</p>
                                </td>
                            <?php } ?>
                            <td class="c-table__cell ">
                                <div class="c-dropdown dropdown " style="left: 30%;">
                                    <?php if ($db->status == "1") { ?>
                                        <button class="c-btn c-btn--info has-dropdown dropdown-toggle" id="dropdownMenuButton12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>

                                        <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/order/confirm_order/' . $db->id_pesan .'/pemesanan_reguler') ?>">Konfirmasi Pembayaran</a>
                                            <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/order/cancel_order/' . $db->id_pesan . '/' . $db->id_reguler.'/'.'pemesanan_reguler' ) ?>">tolak Pembayaran</a>

                                        </div>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    endforeach; ?>
                    <!-- Buat Paket -->
                    <?php foreach ($data_bayar_paket as $db) :
                        ?>
                        <tr class="c-table__row">
                            <td class="c-table__cell"><?php echo $no; ?></td>
                            <td class="c-table__cell" style="text-align:center;">Paket</td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalMember', $no; ?>">Lihat</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalPesan', $no; ?>">Lihat</a></td>
                            <td class="c-table__cell" style="text-align:center;"><a href="#" data-toggle="modal" data-target="<?php echo '#modalBayar', $no; ?>">Lihat</a></td>
                            <?php if ($db->status == "0") { ?>
                                <td class="c-table__cell" style="text-align:center; ">
                                    <p style="border-style: solid; color:yellow; background-color:#38362e;">Belum Dibayar</p>
                                </td>
                            <?php } else if ($db->status == "1") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:blue; background-color:#c0c9e0;">Belum Dikonfirmasi</p>
                                </td>
                            <?php } else if ($db->status == "2") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:green; background-color:#c0e0d4;">Sudah Dikonfirmasi</p>
                                </td>
                            <?php } else if ($db->status == "3") { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:red; background-color:#e0c9c0;">Ditolak</p>
                                </td>
                            <?php } else { ?>
                                <td class="c-table__cell" style="text-align:center;">
                                    <p style="border-style: solid; color:red; background-color:#e0c9c0;">Dibatalkan</p>
                                </td>
                            <?php } ?>
                            <td class="c-table__cell ">
                                <div class="c-dropdown dropdown " style="left: 30%;">
                                    <?php if ($db->status == "1") { ?>
                                        <button class="c-btn c-btn--info has-dropdown dropdown-toggle" id="dropdownMenuButton12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>

                                        <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/order/confirm_order/' . $db->id_pesan .'/pemesanan_paket') ?>">Konfirmasi Pembayaran</a>
                                            <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/order/cancel_order/' . $db->id_pesan . '/' . $db->id_paket.'/'.'pemesanan_paket' ) ?>">tolak Pembayaran</a>

                                        </div>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</main>// .o-page__content

<script src="<?php echo base_url(); ?>resources/js/main.min.js"></script>
</body>
<?php
$no = 1;
foreach ($data_bayar_event as $db) : ?>
    <!-- Modal Member -->
    <div class="c-modal modal fade" id="<?php echo 'modalMember', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPesan" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Member</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Member.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="olahraga">Nama</label>
                                <input class="c-input" type="text" name="olaharaga" id="olahraga" placeholder="" value="<?php echo $db->nama_member; ?>" disabled>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="sesi">No telepon</label>
                                <input class="c-input" type="text" name="sesi" id="sesi" placeholder="" value="<?php echo $db->no_telepon_member; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Pemesanan -->
    <div class="c-modal modal fade" id="<?php echo 'modalPesan', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPesan" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Pemesanan</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Pemesanan Anda.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="nama">Nama Instruktur</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="" value="<?php echo $db->nama; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="olahraga">Jenis Olahraga</label>
                                <input class="c-input" type="text" name="olaharaga" id="olahraga" placeholder="" value="<?php echo $db->agenda; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="durasi">Durasi</label>
                                <input class="c-input" type="text" name="durasi" id="durasi" placeholder="" value="<?php echo $db->durasi; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jumlah_murid">Jumlah Murid</label>
                                <input class="c-input" type="text" name="jumlah_murid" id="jumlah_murid" placeholder="" value="<?php echo $db->jumlah_murid; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="sesi">Sesi</label>
                                <input class="c-input" type="text" name="sesi" id="sesi" placeholder="" value="<?php echo $db->jumlah_sesi; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jadwal">Jadwal</label>
                                <input class="c-input" type="text" name="jadwal" id="jadwal" placeholder="" value="<?php echo $db->jadwal; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="tempat">Tempat</label>
                                <input class="c-input" type="text" name="tempat" id="tempat" placeholder="" value="<?php echo $db->tempat; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Instruktur -->
    <div class="c-modal modal fade" id="<?php echo 'modalInstruktur', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInstruktur" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Instruktur</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Instruktur.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="nama">Nama Instruktur</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="" value="<?php echo $db->nama; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jenis-kelamin">Jenis Kelamin</label>
                                <input class="c-input" type="text" name="jenis-kelamin" id="jenis-kelamin" placeholder="" value="<?php echo $db->jenis_kelamin; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="alamat">Alamat</label>
                                <input class="c-input" type="text" name="alamat" id="alamat" placeholder="" value="<?php echo $db->alamat; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="no_telepon">Nomor Telepon</label>
                                <input class="c-input" type="text" name="no_telepon" id="no_telepon" placeholder="" value="<?php echo $db->no_telepon; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="email">Email</label>
                                <input class="c-input" type="text" name="email" id="email" placeholder="" value="<?php echo $db->email; ?>" disabled>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="pm">Pengalaman Melatih</label>
                                <input class="c-input" type="text" name="pm" id="pm" placeholder="" value="<?php echo $db->pengalaman_melatih; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="kk">Keahlian Khusus</label>
                                <input class="c-input" type="text" name="kk" id="kk" placeholder="" value="<?php echo $db->keahlian_khusus; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Pembayaran -->
    <div class="c-modal modal fade" id="<?php echo 'modalBayar', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalBayar" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Pembayaran</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail pembayaran.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <img src="<?php echo base_url('resources/img/BNI.jpeg') ?>" alt="Logo Bank BRI">
                            </div>
                            <div class="c-field u-mb-small">
                                <h3 style="text-align: center; border: 3px dashed;"> Kode Bayar : <?php echo $db->kodebayar; ?></h3>
                            </div>
                            <div class="c-field u-mb-small">
                                <h3 style="text-align: center; border: 3px solid; border-color:#92e596; background-color:#92e596;"> Jumlah : <?php echo 'Rp ' . $db->harga . ',-'; ?></h3>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="c-modal__subheader">
                    <p>Bukti Pembayaran.</p>
                </div>
                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($db->bukti_transfer != NULL) { ?>
                                <div class="c-field u-mb-small">
                                    <img style="display: block;margin-left: auto;margin-right: auto;width: 100%;" src="<?php echo base_url('resources/img/bukti/'), $db->bukti_transfer; ?>" alt="Bukti transfer">
                                </div>
                            <?php } else { ?>
                                <div class="c-field u-mb-small">
                                    <h3 style="text-align: center; border: 3px dashed; color:red;"> Bukti transfer belum ada...</h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
    <?php
    $no++;
endforeach; ?>

<!-- Buat reguler -->
<?php 
$i = 1;
foreach ($data_bayar_reguler as $db) : ?>
    <!-- Modal Member -->
    <div class="c-modal modal fade" id="<?php echo 'modalMember', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPesan" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Member</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Member.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="olahraga">Nama</label>
                                <input class="c-input" type="text" name="olaharaga" id="olahraga" placeholder="" value="<?php echo $db->nama_member; ?>" disabled>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="sesi">No telepon</label>
                                <input class="c-input" type="text" name="sesi" id="sesi" placeholder="" value="<?php echo $db->no_telepon_member; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Pemesanan -->
    <div class="c-modal modal fade" id="<?php echo 'modalPesan', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPesan" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Pemesanan</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Pemesanan Anda.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="nama">Nama Instruktur</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="" value="<?php echo $db->nama; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="olahraga">Jenis Olahraga</label>
                                <input class="c-input" type="text" name="olaharaga" id="olahraga" placeholder="" value="<?php echo $db->agenda; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="durasi">Durasi</label>
                                <input class="c-input" type="text" name="durasi" id="durasi" placeholder="" value="<?php echo $db->durasi; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jumlah_murid">Jumlah Murid</label>
                                <input class="c-input" type="text" name="jumlah_murid" id="jumlah_murid" placeholder="" value="<?php echo $db->jumlah_murid; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="sesi">Sesi</label>
                                <input class="c-input" type="text" name="sesi" id="sesi" placeholder="" value="<?php echo $db->jumlah_sesi; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jadwal">Jadwal</label>
                                <input class="c-input" type="text" name="jadwal" id="jadwal" placeholder="" value="<?php echo $db->jadwal; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="lokasi">Tempat </label>
                                <div id="<?php echo 'map_canvas' . $i; ?>" style="top: 10px; width:490px; height:290px;"></div>
                                <?php $i++;?>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Instruktur -->
    <div class="c-modal modal fade" id="<?php echo 'modalInstruktur', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInstruktur" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Instruktur</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Instruktur.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="nama">Nama Instruktur</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="" value="<?php echo $db->nama; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jenis-kelamin">Jenis Kelamin</label>
                                <input class="c-input" type="text" name="jenis-kelamin" id="jenis-kelamin" placeholder="" value="<?php echo $db->jenis_kelamin; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="alamat">Alamat</label>
                                <input class="c-input" type="text" name="alamat" id="alamat" placeholder="" value="<?php echo $db->alamat; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="no_telepon">Nomor Telepon</label>
                                <input class="c-input" type="text" name="no_telepon" id="no_telepon" placeholder="" value="<?php echo $db->no_telepon; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="email">Email</label>
                                <input class="c-input" type="text" name="email" id="email" placeholder="" value="<?php echo $db->email; ?>" disabled>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="pm">Pengalaman Melatih</label>
                                <input class="c-input" type="text" name="pm" id="pm" placeholder="" value="<?php echo $db->pengalaman_melatih; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="kk">Keahlian Khusus</label>
                                <input class="c-input" type="text" name="kk" id="kk" placeholder="" value="<?php echo $db->keahlian_khusus; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Pembayaran -->
    <div class="c-modal modal fade" id="<?php echo 'modalBayar', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalBayar" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Pembayaran</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail pembayaran.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <img src="<?php echo base_url('resources/img/BNI.jpeg') ?>" alt="Logo Bank BRI">
                            </div>
                            <div class="c-field u-mb-small">
                                <h3 style="text-align: center; border: 3px dashed;"> Kode Bayar : <?php echo $db->kodebayar; ?></h3>
                            </div>
                            <div class="c-field u-mb-small">
                                <h3 style="text-align: center; border: 3px solid; border-color:#92e596; background-color:#92e596;"> Jumlah : <?php echo 'Rp ' . $db->harga . ',-'; ?></h3>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="c-modal__subheader">
                    <p>Bukti Pembayaran.</p>
                </div>
                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($db->bukti_transfer != NULL) { ?>
                                <div class="c-field u-mb-small">
                                    <img style="display: block;margin-left: auto;margin-right: auto;width: 100%;" src="<?php echo base_url('resources/img/bukti/'), $db->bukti_transfer; ?>" alt="Bukti transfer">
                                </div>
                            <?php } else { ?>
                                <div class="c-field u-mb-small">
                                    <h3 style="text-align: center; border: 3px dashed; color:red;"> Bukti transfer belum ada...</h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
    <?php
    $no++;
endforeach; ?>
<!-- Buat reguler -->
<?php 
foreach ($data_bayar_paket as $db) : ?>
    <!-- Modal Member -->
    <div class="c-modal modal fade" id="<?php echo 'modalMember', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPesan" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Member</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Member.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="olahraga">Nama</label>
                                <input class="c-input" type="text" name="olaharaga" id="olahraga" placeholder="" value="<?php echo $db->nama_member; ?>" disabled>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="sesi">No telepon</label>
                                <input class="c-input" type="text" name="sesi" id="sesi" placeholder="" value="<?php echo $db->no_telepon_member; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Pemesanan -->
    <div class="c-modal modal fade" id="<?php echo 'modalPesan', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPesan" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Pemesanan</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Pemesanan Anda.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="nama">Nama Instruktur</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="" value="<?php echo $db->nama; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="olahraga">Jenis Olahraga</label>
                                <input class="c-input" type="text" name="olaharaga" id="olahraga" placeholder="" value="<?php echo $db->agenda; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="durasi">Durasi</label>
                                <input class="c-input" type="text" name="durasi" id="durasi" placeholder="" value="<?php echo $db->durasi; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jumlah_murid">Jumlah Murid</label>
                                <input class="c-input" type="text" name="jumlah_murid" id="jumlah_murid" placeholder="" value="<?php echo $db->jumlah_murid; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="sesi">Sesi</label>
                                <input class="c-input" type="text" name="sesi" id="sesi" placeholder="" value="<?php echo $db->jumlah_sesi; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jadwal">Jadwal</label>
                                <?php foreach ($jadwal_paket as $jadwal) { ?>
                                    <?php if ($jadwal->id_pesan == $db->id_pesan) { ?>
                                        <input class="c-input" type="text" name="jadwal" id="jadwal" placeholder="" value="<?php echo $jadwal->hari . ', ' . $jadwal->tanggal . ' Jam ' . $jadwal->jam; ?>" disabled>
                                        <br>
                                    <?php }
                            } ?>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="lokasi">Tempat </label>
                                <div id="<?php echo 'map_canvas' . $i; ?>" style="top: 10px; width:490px; height:290px;"></div>
                                <?php $i++;?>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Instruktur -->
    <div class="c-modal modal fade" id="<?php echo 'modalInstruktur', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalInstruktur" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Instruktur</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail Instruktur.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="nama">Nama Instruktur</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="" value="<?php echo $db->nama; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jenis-kelamin">Jenis Kelamin</label>
                                <input class="c-input" type="text" name="jenis-kelamin" id="jenis-kelamin" placeholder="" value="<?php echo $db->jenis_kelamin; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="alamat">Alamat</label>
                                <input class="c-input" type="text" name="alamat" id="alamat" placeholder="" value="<?php echo $db->alamat; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="no_telepon">Nomor Telepon</label>
                                <input class="c-input" type="text" name="no_telepon" id="no_telepon" placeholder="" value="<?php echo $db->no_telepon; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="email">Email</label>
                                <input class="c-input" type="text" name="email" id="email" placeholder="" value="<?php echo $db->email; ?>" disabled>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="pm">Pengalaman Melatih</label>
                                <input class="c-input" type="text" name="pm" id="pm" placeholder="" value="<?php echo $db->pengalaman_melatih; ?>" disabled>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="kk">Keahlian Khusus</label>
                                <input class="c-input" type="text" name="kk" id="kk" placeholder="" value="<?php echo $db->keahlian_khusus; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal Pembayaran -->
    <div class="c-modal modal fade" id="<?php echo 'modalBayar', $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modalBayar" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Pembayaran</h3>

                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__subheader">
                    <p>Detail pembayaran.</p>
                </div>

                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-field u-mb-small">
                                <img src="<?php echo base_url('resources/img/BNI.jpeg') ?>" alt="Logo Bank BRI">
                            </div>
                            <div class="c-field u-mb-small">
                                <h3 style="text-align: center; border: 3px dashed;"> Kode Bayar : <?php echo $db->kodebayar; ?></h3>
                            </div>
                            <div class="c-field u-mb-small">
                                <h3 style="text-align: center; border: 3px solid; border-color:#92e596; background-color:#92e596;"> Jumlah : <?php echo 'Rp ' . $db->harga . ',-'; ?></h3>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="c-modal__subheader">
                    <p>Bukti Pembayaran.</p>
                </div>
                <div class="c-modal__body">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($db->bukti_transfer != NULL) { ?>
                                <div class="c-field u-mb-small">
                                    <img style="display: block;margin-left: auto;margin-right: auto;width: 100%;" src="<?php echo base_url('resources/img/bukti/'), $db->bukti_transfer; ?>" alt="Bukti transfer">
                                </div>
                            <?php } else { ?>
                                <div class="c-field u-mb-small">
                                    <h3 style="text-align: center; border: 3px dashed; color:red;"> Bukti transfer belum ada...</h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
    <?php
    $no++;
endforeach; ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3iF5rAofQ_BDNAXs3wx0eUSHXHTzWC7k&callback=initMap"></script>
<script>
    $(document).ready(function() {
        var i = 1;
        <?php foreach ($data_bayar_reguler as $db) { ?>
            <?php $lokasi = explode(";", $db->lokasi); ?>
            console.log(<?php echo $lokasi[0] ?>);
            console.log(i);
            var latlng = new google.maps.LatLng(<?php echo $lokasi[0]; ?>, <?php echo $lokasi[1]; ?>);
            var myOptions = {
                zoom: 15,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas" + i), myOptions);
            var myMarker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: "Pune"
            });
            i++;
        <?php } ?>
        <?php foreach ($data_bayar_paket as $db) { ?>
            <?php $lokasi = explode(";", $db->lokasi); ?>
            console.log(<?php echo $lokasi[1]; ?>)
            var latlng = new google.maps.LatLng(<?php echo $lokasi[0]; ?>, <?php echo $lokasi[1]; ?>);
            var myOptions = {
                zoom: 15,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas" + i), myOptions);
            var myMarker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: "Pune"
            });
            i++;
        <?php } ?>
    });
</script>
