<style>
    .opsi {
        width: 48.5%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        "

    }
    .opsi-sesi {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        "

    }
</style>
<div class="col-md-7 col-xl-6">
    <main>
        <!-- <button class="c-btn c-btn--info" style="float:right;" data-toggle="modal" onclick="edit_instruktur('<?php echo $instruktur_details->id ?>')"><i class="fa fa-pencil u-mr-xsmall"></i>Edit Profil</button> -->
        <h2 class="u-h3 u-mb-small">Paket Control</h2>

        <div class="c-card u-p-medium u-text-small u-mb-small">
            <h6 class="u-text-bold">Tambah Paket</h6>
            <form class="" action="<?php echo site_url('pakets/create_paket') ?>" method="post">
                <div class="col-sm-12">
                    <div class="row u-mb-medium">
                        <div class="c-field">
                            <label class="c-field__label" for="input13">Jumlah Sesi</label>
                            <select name="jumlah_sesi" class="opsi-sesi">
                                <option value="4">4</option>
                                <option value="8">8</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row u-mb-medium">
                        <div class="c-field">
                            <label class="c-field__label" for="input13">Jumlah Murid</label>
                            <input class="c-input" type="number" name="jumlah_murid" id="jumlah_murid" placeholder="Jumlah Murid" required>
                        </div>
                    </div>
                    <div class="row u-mb-medium">
                        <div class="c-field">
                            <label class="c-field__label" for="input13">Durasi</label>
                            <input class="c-input" type="number" name="durasi" id="durasi" placeholder="Durasi (Menit)" required>
                        </div>
                    </div>
                    <div class="row u-mb-medium">
                        <div class="c-field">
                            <label class="c-field__label" for="input13">Harga</label>
                            <input class="c-input" type="number" name="harga" id="harga" placeholder="Harga">
                        </div>
                    </div>
                    <div class="row u-mb-medium">
                        <div class="c-field">
                            <label class="c-field__label" for="input13">Agenda</label>
                            <input class="c-input" type="text" name="agenda" id="agenda" placeholder="Agenda">
                        </div>
                    </div>
                    <div class="row u-mb-medium">
                        <div class="c-field">
                            <label class="c-field__label" for="input13">Rentang Jam</label>
                            <select id="sel1" name="jam_mulai" class="opsi">
                                <option>00:00</option>
                                <option>01:00</option>
                                <option>02:00</option>
                                <option>03:00</option>
                                <option>04:00</option>
                                <option>05:00</option>
                                <option>06:00</option>
                                <option>07:00</option>
                                <option>08:00</option>
                                <option>09:00</option>
                                <option>10:00</option>
                                <option>11:00</option>
                                <option>12:00</option>
                                <option>13:00</option>
                                <option>14:00</option>
                                <option>15:00</option>
                                <option>16:00</option>
                                <option>17:00</option>
                                <option>18:00</option>
                                <option>19:00</option>
                                <option>20:00</option>
                                <option>21:00</option>
                                <option>22:00</option>
                                <option>23:00</option>
                                <option>24:00</option>
                            </select>
                            -
                            <select id="sel1" name="jam_selesai" class="opsi">
                                <option>00:00</option>
                                <option>01:00</option>
                                <option>02:00</option>
                                <option>03:00</option>
                                <option>04:00</option>
                                <option>05:00</option>
                                <option>06:00</option>
                                <option>07:00</option>
                                <option>08:00</option>
                                <option>09:00</option>
                                <option>10:00</option>
                                <option>11:00</option>
                                <option>12:00</option>
                                <option>13:00</option>
                                <option>14:00</option>
                                <option>15:00</option>
                                <option>16:00</option>
                                <option>17:00</option>
                                <option>18:00</option>
                                <option>19:00</option>
                                <option>20:00</option>
                                <option>21:00</option>
                                <option>22:00</option>
                                <option>23:00</option>
                                <option>24:00</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row u-mb-medium">
                    <input type="submit" class="c-btn c-btn--success c-btn--fullwidth" name="submit" value="Pilih Jadwal">
                </div>
        </div>
        </form>

</div>
</main>
</div>
<script src="<?php echo base_url('resources/'); ?>js/main.min.js"></script>
</body>
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
                $('[name="edit_no_ktp"]').val(data.no_ktp);
                $('[name="edit_nama_bank"]').val(data.nama_bank);
                $('[name="edit_nama_bank"]').select2().trigger('change');
                $('[name="edit_nama_bank"]').select2({
                    minimumResultsForSearch: Infinity
                });
                $('[name="edit_nomor_rekening"]').val(data.nomor_rekening);
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