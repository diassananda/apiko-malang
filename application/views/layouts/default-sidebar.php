<div class="row" style="margin-right:0px;margin-left:0px;">
  <?php if($this->session->userdata('akses_level') == "Instruktur" && $this->session->userdata('id') == $instruktur_details->id){ ?>
    <div class="col-xl-3 u-hidden-down@wide">
        <aside class="c-menu u-ml-medium">
            <h4 class="c-menu__title">Menu</h4>
            <ul class="u-mb-medium">
                <li class="c-menu__item">
                    <a class="c-menu__link is-active" href="<?php echo site_url('instruktur/profile/'.$this->session->userdata('id')) ?>">
                        <i class="fa fa-user-o u-mr-xsmall"></i>Profil
                    </a>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="#">
                        <i class="c-menu__icon fa fa-book"></i>Lihat Jadwal
                    </a>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="<?php echo site_url('events/create_event'); ?>">
                        <i class="c-menu__icon fa fa-plus-square"></i>Tambah Jadwal Event
                    </a>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="<?php echo site_url('regulers/create_reguler'); ?>">
                        <i class="c-menu__icon fa fa-plus-square"></i>Tambah Jadwal Reguler
                    </a>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="<?php echo site_url('pakets/create_paket'); ?>">
                        <i class="c-menu__icon fa fa-plus-square"></i>Tambah Jadwal Paket
                    </a>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="<?php echo site_url('home/hapus/'), $this->session->userdata('id'); ?>" onClick="return confirm('Apa anda yakin ingin menghapus akun ini?');">
                        <i class="c-menu__icon fa fa-trash"></i>Hapus Akun
                    </a>
                </li>
              </ul>
        </aside>
    </div>
    <?php } else if( $this->session->userdata('akses_level') == "Member" && ($this->uri->segment('1') == "member" || $this->uri->segment('1') == "order")) { ?>
    <div class="col-xl-3 u-hidden-down@wide">
        <aside class="c-menu u-ml-medium">
            <h4 class="c-menu__title">Menu</h4>
            <ul class="u-mb-medium">
                <li class="c-menu__item">
                    <?php if ($this->uri->segment('2') == "profile" ){ ?>
                    <a class="c-menu__link is-active" href="<?php echo site_url('member/profile/'.$this->session->userdata('id')) ?>">
                        <i class="fa fa-user-o u-mr-xsmall"></i>Profil
                    </a>
                    <?php } else { ?>
                    <a class="c-menu__link" href="<?php echo site_url('member/profile/'.$this->session->userdata('id')) ?>">
                        <i class="fa fa-user-o u-mr-xsmall"></i>Profil
                    </a>
                    <?php }?>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="#">
                        <i class="c-menu__icon fa fa-book"></i>Lihat Jadwal
                    </a>
                </li>
                <li class="c-menu__item">
                <?php if ($this->uri->segment('2') == "pembayaran" ){ ?>
                    <a class="c-menu__link is-active" href="<?php echo site_url('order/pembayaran/'), $this->session->userdata('id');?>">
                        <i class="c-menu__icon fa fa-shopping-cart"></i>Lihat Pembayaran
                    </a>
                <?php } else { ?>
                    <a class="c-menu__link" href="<?php echo site_url('order/pembayaran/'), $this->session->userdata('id');?>">
                        <i class="c-menu__icon fa fa-shopping-cart"></i>Lihat Pembayaran
                    </a>
                <?php }?>
                </li>
                <li class="c-menu__item">
                    <a class="c-menu__link" href="<?php echo site_url('home/hapus/'), $this->session->userdata('id'); ?>" onClick="return confirm('Apa anda yakin ingin menghapus akun ini?');">
                        <i class="c-menu__icon fa fa-trash"></i>Hapus Akun
                    </a>
                </li>
              </ul>
        </aside>
    </div>
  <?php } ?>

  <script src="<?php echo base_url(); ?>resources/js/main.min.js"></script>
      <script type="text/javascript">
function hapus(id) {
         var url="<?php echo site_url();?>";
         var r = confirm("Apakah anda yakin hapus instruktur ini?");
         if (r == true) {
             window.location = url+"instrukturs/hapus_instruktur/"+id;
         } else {
             return false;
         }
      }
      </script>
