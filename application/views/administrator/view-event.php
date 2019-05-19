<div class="row u-mb-large">
    <div class="col-12">
        <div class="c-table-responsive@desktop">
            <table class="c-table" id="datatable">
                <caption class="c-table__title">
                    <div class="row">
                        <div class="col-6">
                            Events <small>Daftar Event</small>
                        </div>
                        <div class="col-6" style="text-align:right;">

                        </div>
                    </div>
                </caption>
                <thead class="c-table__head c-table__head--slim">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head no-sort">No.</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Nama Instruktur</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Agenda</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Status</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Jumlah Sesi</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Jumlah Murid</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Durasi</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Harga</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Jadwal</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Tempat</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Option</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($events as $event) :
                        ?>
                        <tr class="c-table__row">
                            <td class="c-table__cell"><?php echo $no; ?></td>
                            <td class="c-table__cell"><?php echo $event->nama; ?></td>
                            <td class="c-table__cell"><?php echo $event->agenda; ?></td>
                            <?php if ($event->verified == "1") { ?>
                                <td class="c-table__cell" style="color:green;">Disetujui</td>
                            <?php } else { ?>
                                <td class="c-table__cell" style="color:red;">Belum Disetujui</td>
                            <?php } ?>
                            <td class="c-table__cell"><?php echo $event->jumlah_sesi; ?></td>
                            <td class="c-table__cell"><?php echo $event->jumlah_murid; ?></td>
                            <td class="c-table__cell"><?php echo $event->durasi; ?></td>
                            <td class="c-table__cell"><?php echo $event->harga; ?></td>
                            <td class="c-table__cell"><?php echo $event->jadwal; ?></td>
                            <td class="c-table__cell"><?php echo $event->tempat; ?></td>
                            <td class="c-table__cell">
                                <div class="c-dropdown dropdown">
                                    <button class="c-btn c-btn--info has-dropdown dropdown-toggle" id="dropdownMenuButton12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>

                                    <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/events/confirm_event/' . $event->id) ?>">Terima Event</a>
                                        <a class="c-dropdown__item dropdown-item" href="<?php echo site_url('administrator/events/delete_event/' . $event->id) ?>">Tolak Event</a>

                                    </div>
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
</div>

</main><!-- // .o-page__content -->

<script src="<?php echo base_url(); ?>resources/js/main.min.js"></script>
</body>

<!-- Modal Event -->
<div class="c-modal modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal" data-backdrop="static">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">



        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->


<!-- Modal Event -->
<div class="c-modal modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" data-backdrop="static">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">

            <div class="c-modal__header">
                <h3 class="c-modal__title">Edit Event</h3>

                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>

            <div class="c-modal__subheader">
                <p>Lengkapi data diri event berikut ini.</p>
            </div>

            <div class="c-modal__body">
                <div class="row">
                    <div class="col-12">
                        <form class="" action="<?php echo site_url('administrator/events/edit_event') ?>" method="post">

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_nama">Nama Lengkap</label>
                                <input class="c-input" type="hidden" name="edit_id" id="edit_id" placeholder="" value="">
                                <input class="c-input" type="text" name="edit_nama" id="edit_nama" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_no_ktp">No. KTP</label>
                                <input class="c-input" type="text" name="edit_no_ktp" id="edit_no_ktp" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_jenis_kelamin">Jenis Kelamin</label>
                                <select class="c-select" name="edit_jenis_kelamin" id="edit_jenis_kelamin" style="width:100%">
                                    <option disabled>Pilih Jenis Kelamin</option>
                                    <option>Perempuan</option>
                                    <option>Laki-laki</option>
                                </select>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_alamat">Alamat</label>
                                <textarea class="c-input" name="edit_alamat" id="edit_alamat"></textarea>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_email">Email</label>
                                <input class="c-input" type="text" name="edit_email" id="edit_email" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_no_telepon">Nomor Telepon</label>
                                <input class="c-input" type="text" name="edit_no_telepon" id="edit_no_telepon" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_lama_melatih">Lama Melatih <small>(dalam tahun)</small></label>
                                <input class="c-input" type="text" name="edit_lama_melatih" id="edit_lama_melatih" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_pengalaman_melatih">Pengalaman Melatih</label>
                                <textarea class="c-input" name="edit_pengalaman_melatih" id="edit_pengalaman_melatih"></textarea>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_keahlian_khusus">Keahlian Khusus</label>
                                <textarea class="c-input" name="edit_keahlian_khusus" id="edit_keahlian_khusus"></textarea>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_sertifikasi">Sertifikasi</label>
                                <textarea class="c-input" name="edit_sertifikasi" id="edit_sertifikasi"></textarea>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_nama_bank">Nama Bank</label>
                                <select class="c-select" name="edit_nama_bank" id="edit_nama_bank" style="width:100%">
                                    <option disabled selected>Pilih Bank</option>
                                    <option>Bank Rakyat Indonesia</option>
                                    <option>Bank Mandiri</option>
                                    <option>Bank Central Asia</option>
                                    <option>Bank Negara Indonesia</option>
                                    <option>Bank Tabungan Negara</option>
                                    <option>Bank CIMB Niaga</option>
                                    <option>Bank Panin</option>
                                    <option>OCBC NISP</option>
                                    <option>Bank Danamon Indonesia</option>
                                    <option>Bank Permata</option>
                                    <option>Maybank Indonesia</option>
                                </select>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_nomor_rekening">No. Rekening</label>
                                <input class="c-input" type="text" name="edit_nomor_rekening" id="edit_nomor_rekening" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_password">Password</label>
                                <input class="c-input" type="password" name="edit_password" id="edit_password" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <input class="c-btn c-btn--success c-btn--fullwidth" type="submit" name="" value="Edit Event">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->

<script type="text/javascript">
    function edit_event(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('administrator/events/get_detail_event') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="edit_id"]').val(data.id);
                $('[name="edit_nama"]').val(data.nama);
                $('[name="edit_jenis_kelamin"]').val(data.jenis_kelamin);
                $('[name="edit_jenis_kelamin"]').select2().trigger('change');
                $('[name="edit_jenis_kelamin"]').select2({
                    minimumResultsForSearch: Infinity
                });
                $('[name="edit_alamat"]').val(data.alamat);
                $('[name="edit_email"]').val(data.email);
                $('[name="edit_no_telepon"]').val(data.no_telepon);
                $('[name="edit_password"]').val(data.password);
                $('[name="edit_lama_melatih"]').val(data.lama_melatih);
                $('[name="edit_pengalaman_melatih"]').val(data.pengalaman_melatih);
                $('[name="edit_keahlian_khusus"]').val(data.keahlian_khusus);
                $('[name="edit_sertifikasi"]').val(data.sertifikasi);
                $('[name="edit_no_ktp"]').val(data.no_ktp);
                $('[name="edit_nama_bank"]').val(data.nama_bank);
                $('[name="edit_nama_bank"]').select2().trigger('change');
                $('[name="edit_nama_bank"]').select2({
                    minimumResultsForSearch: Infinity
                });
                $('[name="edit_nomor_rekening"]').val(data.nomor_rekening);
                $('#edit-modal').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function del(id) {
        var url = "<?php echo site_url(); ?>";
        var r = confirm("Apakah anda yakin menghapus event ini?");
        if (r == true) {
            window.location = url + "/administrator/events/delete_event/" + id;
        } else {
            return false;
        }
    }
</script>

</html>