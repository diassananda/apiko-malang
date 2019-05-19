  <div class="row" style="margin-right:0px;margin-left:0px;">
    <div class="col-6">
      <main>
        <h2 class="u-h3 u-mb-small">Pemesanan Instruktur</h2>
        <div class="c-card u-p-medium u-text-small u-mb-small">
          <h6 class="u-text-bold">Form Pemesanan</h6>
          <form class="" action="<?php echo site_url('order/pesan_event'); ?>" method="post" onClick="return confirm('Apa anda yakin ingin memesan event ini?');">
            <input type="hidden" name="id_instruktur" value="<?php echo $instruktur_detail->id_instruktur ?>">
            <input type="hidden" name="id_member" value="<?php echo $member_detail->id ?>">
            <input type="hidden" name="id_event" value="<?php echo $instruktur_detail->id ?>">
            <input type="hidden" name="pendaftar" value="<?php echo $instruktur_detail->pendaftar ?>">
            <div class="col-sm-12">
              <div class="row u-mb-medium">
                <div class="c-field">
                  <label class="c-field__label" for="input13">Nama</label>
                  <input class="c-input" type="text" name="nama" id="nama" placeholder="nama" value="<?php echo $member_detail->nama; ?>" disabled>
                </div>
              </div>
              <div class="row u-mb-medium">
                <div class="c-field">
                  <label class="c-field__label" for="input13">No. Telpon</label>
                  <input class="c-input" type="text" name="no telepon" id="no telepon" placeholder="no telepon" value="<?php echo $member_detail->no_telepon; ?>" disabled>
                </div>
              </div>
              <div class="row u-mb-medium">
                <div class="c-field">
                  <label class="c-field__label" for="input13">Lokasi</label>
                  <input class="c-input" type="text" value="<?php echo $instruktur_detail->tempat; ?>" disabled>
                </div>
              </div>
              <?php if ($instruktur_detail->jumlah_murid - $instruktur_detail->pendaftar != 0) { ?>
                <div class="row u-mb-medium">
                  <input type="submit" class="c-btn c-btn--success c-btn--fullwidth" name="submit" value="Pesan">
                </div>
              <?php } else { ?>
                <div class="row u-mb-medium">
                  <input type="submit" class="c-btn c-btn--danger c-btn--fullwidth" name="submit" value="Kuota Penuh" disabled>
                </div>
              <?php } ?>
            </div>
          </form>
        </div>
      </main>
    </div>

    <div class="col-6">
      <main>
        <h2 class="u-h3 u-mb-small">Detail Pemesanan</h2>
        <div class="c-card u-p-medium u-text-small u-mb-small">
          <h6 class="u-text-bold">Informasi Instruktur</h6>

          <dl class="u-flex u-pv-small u-border-bottom">
            <dt class="u-width-25">Nama</dt>
            <dd><?php echo $instruktur_detail->nama ?></dd>
          </dl>

          <dl class="u-flex u-pv-small u-border-bottom">
            <dt class="u-width-25">Jenis Olahraga</dt>
            <dd>
              <?php echo $instruktur_detail->agenda ?>
            </dd>
          </dl>
        </div>
        <div class="c-table-responsive@desktop">
          <table class="c-table">
            <caption class="c-table__title">
              <div class="row">
                <div class="col-6">
                  Kelas <small>Detail Kelas</small>
                </div>
              </div>
            </caption>
            <thead class="c-table__head c-table__head--slim">
              <tr class="c-table__row">
                <th class="c-table__cell c-table__cell--head no-sort">Durasi</th>
                <th class="c-table__cell c-table__cell--head no-sort">Sisa Kuota</th>
                <th class="c-table__cell c-table__cell--head no-sort">Sesi</th>
                <th class="c-table__cell c-table__cell--head no-sort">Harga</th>
                <th class="c-table__cell c-table__cell--head no-sort">Jadwal</th>
              </tr>
            </thead>

            <tbody>
              <tr class="c-table__row">
                <td class="c-table__cell"><?php echo $instruktur_detail->durasi ?> Menit</td>
                <td class="c-table__cell"><?php echo ($instruktur_detail->jumlah_murid - $instruktur_detail->pendaftar) ?></td>
                <td class="c-table__cell"><?php echo $instruktur_detail->jumlah_sesi ?></td>
                <td class="c-table__cell">Rp <?php echo $instruktur_detail->harga ?>,-</td>
                <td class="c-table__cell"><?php echo $instruktur_detail->jadwal ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  </div>
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