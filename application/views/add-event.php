<div class="col-md-7 col-xl-6">
  <main>
    <!-- <button class="c-btn c-btn--info" style="float:right;" data-toggle="modal" onclick="edit_instruktur('<?php echo $instruktur_details->id ?>')"><i class="fa fa-pencil u-mr-xsmall"></i>Edit Profil</button> -->
    <h2 class="u-h3 u-mb-small">Events Control</h2>

    <div class="c-card u-p-medium u-text-small u-mb-small">
      <h6 class="u-text-bold">Tambah Event</h6>
      <form class="" action="<?php echo site_url('events/create_event'); ?>" method="post">
        <div class="col-sm-12">
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Jumlah Sesi</label>
              <input class="c-input" type="text" name="jumlah_sesi" id="jumlah_sesi" placeholder="Jumlah Sesi">
            </div>
          </div>
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Jumlah Murid</label>
              <input class="c-input" type="text" name="jumlah_murid" id="jumlah_murid" placeholder="Jumlah Murid">
            </div>
          </div>
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Durasi</label>
              <input class="c-input" type="text" name="durasi" id="durasi" placeholder="Durasi">
            </div>
          </div>
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Harga</label>
              <input class="c-input" type="text" name="harga" id="harga" placeholder="Harga">
            </div>
          </div>
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Jadwal</label>
              <input class="c-input" type="text" name="jadwal" id="jadwal" placeholder="Jadwal">
            </div>
          </div>
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Tempat</label>
              <input class="c-input" type="text" name="tempat" id="tempat" placeholder="Tempat">
            </div>
          </div>
          <div class="row u-mb-medium">
            <div class="c-field">
              <label class="c-field__label" for="input13">Agenda</label>
              <input class="c-input" type="text" name="agenda" id="agenda" placeholder="Agenda">
            </div>
          </div>
          <div class="row u-mb-medium">
            <input type="submit" class="c-btn c-btn--success c-btn--fullwidth" name="submit" value="Tambah Event">
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