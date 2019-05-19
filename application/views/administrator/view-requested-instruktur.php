<div class="row u-mb-large">
    <div class="col-12">
        <div class="c-table-responsive@desktop">
            <table class="c-table" id="datatable">
                <caption class="c-table__title">
                  <div class="row">
                  <div class="col-6">
                    Instrukturs <small>Daftar Pendaftar Instruktur</small>
                  </div>
                </div>
                </caption>



                <thead class="c-table__head c-table__head--slim">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head no-sort">No.</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Nama</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Jenis Kelamin</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Alamat</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Email</th>
                        <th class="c-table__cell c-table__cell--head no-sort">No. Telp</th>
                        <th class="c-table__cell c-table__cell--head no-sort">Option</th>
                    </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 1;
                  foreach ($instrukturs as $instruktur):

                  if (strlen($instruktur->alamat) >= 15)
                  {
                    $alamat = character_limiter($instruktur->alamat, 15);
                  }
                  else
                  {
                    $alamat = $instruktur->alamat;
                  }

                  ?>
                    <tr class="c-table__row">
                        <td class="c-table__cell"><?php echo $no; ?></td>
                        <td class="c-table__cell"><?php echo $instruktur->nama; ?></td>
                        <td class="c-table__cell"><?php echo $instruktur->jenis_kelamin; ?></td>
                        <td class="c-table__cell"><?php echo $alamat; ?></td>
                        <td class="c-table__cell"><?php echo $instruktur->email; ?></td>
                        <td class="c-table__cell"><?php echo $instruktur->no_telepon; ?></td>
                        <td class="c-table__cell">
                          <div class="c-dropdown dropdown">
                              <button class="c-btn c-btn--fancy has-dropdown dropdown-toggle" id="dropdownMenuButton12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Konfirmasi</button>

                              <div class="c-dropdown__menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="c-dropdown__item dropdown-item" onclick="detail('<?php echo $instruktur->id ?>')"><i class="fa fa-info-circle u-mr-xsmall"></i>Detail Pendaftar</a>
                                  <a class="c-dropdown__item dropdown-item" onclick="conf('<?php echo $instruktur->id ?>')"><i class="fa fa-check u-mr-xsmall"></i>Terima Pendaftar</a>
                                  <a class="c-dropdown__item dropdown-item" onclick="reject('<?php echo $instruktur->id ?>')"><i class="fa fa-close u-mr-xsmall"></i>Tolak Pendaftar</a>
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


      <!-- Modal Instruktur -->
      <div class="c-modal modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" data-backdrop="static">
      <div class="c-modal__dialog modal-dialog" role="document">
      <div class="c-modal__content">

        <div class="c-modal__header">
            <h3 class="c-modal__title">Detail Pendaftar Instruktur</h3>

            <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-close"></i>
            </span>
        </div>

        <div class="c-modal__subheader">
            <p>Berikut detail pendaftar instruktur.</p>
        </div>

        <div class="c-modal__body">
            <div class="row">
              <div class="col-12">
                <form class="" action="<?php echo site_url('administrator/instrukturs/confirm_instruktur_modal') ?>" method="post">

                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_nama">Nama Lengkap</label>
                    <input class="c-input" type="hidden" name="edit_id" id="edit_id" placeholder="" value="">
                    <input class="c-input" type="text" name="edit_nama" id="edit_nama" placeholder="" value="" disabled>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_no_ktp">No. KTP</label>
                    <input class="c-input" type="text" name="edit_no_ktp" id="edit_no_ktp" placeholder="" value="" disabled>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_jenis_kelamin">Jenis Kelamin</label>
                    <select class="c-select" name="edit_jenis_kelamin" id="edit_jenis_kelamin" style="width:100%" disabled>
                        <option disabled>Pilih Jenis Kelamin</option>
                        <option>Perempuan</option>
                        <option>Laki-laki</option>
                    </select>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_alamat">Alamat</label>
                    <textarea class="c-input" name="edit_alamat" id="edit_alamat" disabled></textarea>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_email">Email</label>
                    <input class="c-input" type="text" name="edit_email" id="edit_email" placeholder="" value="" disabled>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_no_telepon">Nomor Telepon</label>
                    <input class="c-input" type="text" name="edit_no_telepon" id="edit_no_telepon" placeholder="" value="" disabled>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_lama_melatih">Lama Melatih <small>(dalam tahun)</small></label>
                    <input class="c-input" type="text" name="edit_lama_melatih" id="edit_lama_melatih" placeholder="" value="" disabled>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_pengalaman_melatih">Pengalaman Melatih</label>
                    <textarea class="c-input" name="edit_pengalaman_melatih" id="edit_pengalaman_melatih" disabled></textarea>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_keahlian_khusus">Keahlian Khusus</label>
                    <textarea class="c-input" name="edit_keahlian_khusus" id="edit_keahlian_khusus" disabled></textarea>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="edit_sertifikasi">Sertifikasi</label>
                    <textarea class="c-input" name="edit_sertifikasi" id="edit_sertifikasi" disabled></textarea>
                </div>
                
                
               
              </form>
            </div>
            </div>
        </div>

      </div><!-- // .c-modal__content -->
      </div><!-- // .c-modal__dialog -->
      </div><!-- // .c-modal -->

      <script src="<?php echo base_url(); ?>resources/js/main.min.js"></script>
      <script type="text/javascript">

      function detail(id)
      {
      //Ajax Load data from ajax
      $.ajax({
          url : "<?php echo site_url('administrator/instrukturs/get_detail_instruktur')?>/" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
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
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
      }

      function conf(id) {
         var url="<?php echo site_url();?>";
         var r = confirm("Apakah anda yakin menerima pendaftaran instruktur ini?");
         if (r == true) {
             window.location = url+"/administrator/instrukturs/confirm_instruktur/"+id;
         } else {
             return false;
         }
      }

      function reject(id) {
         var url="<?php echo site_url();?>";
         var r = confirm("Apakah anda yakin menolak pendaftaran instruktur ini?");
         if (r == true) {
             window.location = url+"/administrator/instrukturs/reject_instruktur/"+id;
         } else {
             return false;
         }
      }
      </script>
  </body>
</html>
