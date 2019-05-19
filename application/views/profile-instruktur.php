<div class="col-md-7 col-xl-6">
    <main>
        <?php if ($this->session->userdata('akses_level') == "Instruktur" && $this->session->userdata('id') == $instruktur_details->id) { ?>
            <button class="c-btn c-btn--info" style="float:right;" data-toggle="modal" onclick="edit_instruktur('<?php echo $instruktur_details->id ?>')"><i class="fa fa-pencil u-mr-xsmall"></i>Edit Profil</button>
        <?php }; ?>
        <h2 class="u-h3 u-mb-small">Profil Instruktur</h2>

        <div class="c-card u-p-medium u-text-small u-mb-small">
            <h6 class="u-text-bold">Informasi Instruktur</h6>

            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Nama</dt>
                <dd><?php echo $instruktur_details->nama ?></dd>
            </dl>

            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Pengalaman Melatih</dt>
                <dd><?php echo $instruktur_details->pengalaman_melatih ?></dd>
            </dl>

            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Keahlian Khusus</dt>
                <dd><?php echo $instruktur_details->keahlian_khusus ?></dd>
            </dl>

            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Sertifikasi</dt>
                <dd><?php echo $instruktur_details->sertifikasi ?></dd>
            </dl>
            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Lama Melatih</dt>
                <dd><?php echo $instruktur_details->lama_melatih ?></dd>
            </dl>

            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Jenis Kelamin</dt>
                <dd><?php echo $instruktur_details->jenis_kelamin ?></dd>
            </dl>

            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Email</dt>
                <dd><?php echo $instruktur_details->email ?></dd>
            </dl>
            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">No. Telepon</dt>
                <dd><?php echo $instruktur_details->no_telepon ?></dd>
            </dl>
            <dl class="u-flex u-pv-small u-border-bottom">
                <dt class="u-width-25">Alamat</dt>
                <dd><?php echo $instruktur_details->alamat ?></dd>
            </dl>
        </div>
    </main>
</div>

<div class="col-md-5 col-xl-3 u-mb-medium u-hidden-down@tablet">
    <div class="c-profile-card">

        <div class="c-profile-card__user" style="top:0px;margin-left:100px;">
            <div class="c-profile-card__avatar">
                <img src="<?php echo base_url('resources/img/instruktur_photo/'); ?><?php echo $instruktur_details->foto ?>" alt="Adam's image">
            </div>
        </div>
        <div class="col-12">
            <br>
            <?php if ($this->session->userdata('akses_level') == "Instruktur" && $this->session->userdata('id') == $instruktur_details->id) { ?>
                <button class="c-btn c-btn--info c-btn--fullwidth" data-toggle="modal" onclick="edit_photo('<?php echo $instruktur_details->id ?>')"><i class="fa fa-photo u-mr-xsmall"></i>Ganti Foto</button>
            <?php }; ?>
        </div>
    </div>
    <!--// .c-profile -->
    <?php if ($this->session->userdata('akses_level') == "Member") { ?>
        <a class="c-btn c-btn--success c-btn--fullwidth" href="<?php echo site_url('order/detail/'), $instruktur_details->id_instruktur, '/', $instruktur_details->id ,'/', $jenis?>"><i class="fa fa-cart-plus u-mr-xsmall"></i>Pesan Instruktur</a>
    <?php }; ?>

    <?php if ($this->session->userdata('akses_level') == NULL) { ?>
        <a class="c-btn c-btn--success c-btn--fullwidth" href="#loginModal" data-toggle="modal" data-target="#loginModal"><i class="fa fa-cart-plus u-mr-xsmall"></i>Pesan Instruktur</a>
    <?php }; ?>

</div>
</div>
</div>

<script src="<?php echo base_url('resources/'); ?>js/main.min.js"></script>
</body>


<!-- Modal Instruktur -->
<div class="c-modal modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile" data-backdrop="static">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">

            <div class="c-modal__header">
                <h3 class="c-modal__title">Edit Instruktur</h3>

                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>

            <div class="c-modal__subheader">
                <p>Lengkapi data diri instruktur berikut ini.</p>
            </div>

            <div class="c-modal__body">
                <div class="row">
                    <div class="col-12">
                        <form class="" action="<?php echo site_url('instruktur/edit_instruktur') ?>" method="post">

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="edit_nama">Nama Lengkap</label>
                                <input class="c-input" type="hidden" name="edit_id" id="edit_id" placeholder="" value="">
                                <input class="c-input" type="text" name="edit_nama" id="edit_nama" placeholder="" value="">
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
                                <label class="c-field__label" for="edit_password">Password</label>
                                <input class="c-input" type="password" name="edit_password" id="edit_password" placeholder="" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <input class="c-btn c-btn--success c-btn--fullwidth" type="submit" name="" value="Edit Profil">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->


<!-- Modal Instruktur -->
<div class="c-modal modal fade" id="edit-photo" tabindex="-1" role="dialog" aria-labelledby="edit-foto" data-backdrop="static">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">

            <div class="c-modal__header">
                <h3 class="c-modal__title">Ganti Foto</h3>

                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>

            <div class="c-modal__subheader">
                <p>Pilih file untuk mengganti profil foto</p>
            </div>

            <div class="c-modal__body">
                <div class="row">
                    <div class="col-12">
                        <form class="" action="<?php echo site_url('instruktur/edit_photo') ?>" method="post" enctype="multipart/form-data">

                            <div class="c-field u-mb-small">
                                <input class="c-input" type="hidden" name="edit_photo_id" id="edit_photo_id" placeholder="" value="">
                                <label class="c-field__label" for="edit_nama">File Foto</label>
                                <!-- <input class="c-input" type="text" name="edit_nama" id="edit_nama" placeholder="" value=""> -->
                                <input type="file" name="foto" id="foto" value="">
                            </div>
                            <div class="c-field u-mb-small">
                                <input class="c-btn c-btn--success c-btn--fullwidth" type="submit" name="" value="Upload Foto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->

<script type="text/javascript">
    function edit_instruktur(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('administrator/instrukturs/get_detail_instruktur') ?>/" + id,
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
                $('#edit-profile').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function edit_photo(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('administrator/instrukturs/get_detail_instruktur') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="edit_photo_id"]').val(data.id);
                $('#edit-photo').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>

</html>