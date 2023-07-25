  <a style='color:#000' href='<?php echo base_url(); ?>administrator/listberita'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Berita</span>
        <?php $jmla = $this->model_app->view('berita')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmla; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url(); ?>administrator/halamanbaru'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Halaman</span>
        <?php $jmlb = $this->model_app->view('halamanstatis')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlb; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url(); ?>administrator/agenda'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Agenda</span>
        <?php $jmlc = $this->model_app->view('agenda')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlc; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url(); ?>administrator/manajemenuser'>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Users</span>
        <?php $jmld = $this->model_app->view('users')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmld; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

<section class="col-lg-7 connectedSortable">
  <?php 
    $jmlpesan = $this->model_app->view_where('hubungi', array('dibaca'=>'N'))->num_rows(); 
    $jmlberita = $this->model_app->view_where('komentar', array('aktif'=>'N'))->num_rows(); 
    $jmlvideo = $this->model_app->view_where('komentarvid', array('aktif'=>'N'))->num_rows(); 
  ?>
  <div class='box'>
    <div class='box-header'>
      <h3 class='box-title'>Application Buttons</h3>
    </div>
    <div class='box-body'>
      <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda 
          atau pilih ikon-ikon pada Control Panel di bawah ini : </p>
      <a href="<?php echo base_url(); ?>administrator/identitaswebsite" class='btn btn-app'><i class='fa fa-th'></i> Identitas</a>
      <a href="<?php echo base_url(); ?>administrator/menuwebsite" class='btn btn-app'><i class='fa fa-th-large'></i> Menu</a>
      <a href="<?php echo base_url(); ?>administrator/halamanbaru" class='btn btn-app'><i class='fa fa-file-text'></i> Halaman</a>
      <a href="<?php echo base_url(); ?>administrator/listberita" class='btn btn-app'><i class='fa fa-television'></i> Berita</a>
      <a href="<?php echo base_url(); ?>administrator/kategoriberita" class='btn btn-app'><i class='fa fa-bars'></i> Kategori</a>
      <a href="<?php echo base_url(); ?>administrator/tagberita" class='btn btn-app'><i class='fa fa-tag'></i> Tag Berita</a>
      <a href="<?php echo base_url(); ?>administrator/komentarberita" class='btn btn-app'><span class='badge bg-green'><?php echo $jmlberita; ?></span><i class='fa fa-comments'></i> Komen. Berita</a>
      <a href="<?php echo base_url(); ?>administrator/sensorkomentar" class='btn btn-app'><i class='fa fa-bell-slash'></i> Sensor</a>
      <a href="<?php echo base_url(); ?>administrator/album" class='btn btn-app'><i class='fa fa-camera-retro'></i> Album</a>
      <a href="<?php echo base_url(); ?>administrator/gallery" class='btn btn-app'><i class='fa fa-camera'></i> Gallery</a>
      <a href="<?php echo base_url(); ?>administrator/playlist" class='btn btn-app'><i class='fa fa-caret-square-o-right'></i> Playlist</a>
      <a href="<?php echo base_url(); ?>administrator/video" class='btn btn-app'><i class='fa fa-play'></i> Video</a>
      <a href="<?php echo base_url(); ?>administrator/tagvideo" class='btn btn-app'><i class='fa fa-tags'></i> Tag Video</a>
      <a href="<?php echo base_url(); ?>administrator/komentarvideo" class='btn btn-app'><span class='badge bg-blue'><?php echo $jmlvideo; ?></span><i class='fa fa-comments-o'></i> Komen. Video</a>
      <a href="<?php echo base_url(); ?>administrator/iklanatas" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Atas</a>
      <a href="<?php echo base_url(); ?>administrator/iklansidebar" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Sidebar</a>
      <a href="<?php echo base_url(); ?>administrator/iklanhome" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Tengah</a>
      <a href="<?php echo base_url(); ?>administrator/logowebsite" class='btn btn-app'><i class='fa fa-circle-thin'></i> Logo</a>
      <a href="<?php echo base_url(); ?>administrator/templatewebsite" class='btn btn-app'><i class='fa fa-file'></i> Template</a>
      <a href="<?php echo base_url(); ?>administrator/background" class='btn btn-app'><i class='fa fa-circle'></i> Background</a>
      <a href="<?php echo base_url(); ?>administrator/agenda" class='btn btn-app'><i class='fa fa-calendar-minus-o'></i> Agenda</a>
      <a href="<?php echo base_url(); ?>administrator/agenda" class='btn btn-app'><i class='fa fa-calendar-minus-o'></i> Sekilas Info</a>
      <a href="<?php echo base_url(); ?>administrator/jajakpendapat" class='btn btn-app'><i class='fa fa-bar-chart-o'></i> Polling</a>
      <a href="<?php echo base_url(); ?>administrator/download" class='btn btn-app'><i class='fa fa-download'></i> Download</a>
      <a href="<?php echo base_url(); ?>administrator/alamat" class='btn btn-app'><i class='fa fa-bed'></i> Alamat</a>
      <a href="<?php echo base_url(); ?>administrator/pesanmasuk" class='btn btn-app'><span class='badge bg-yellow'><?php echo $jmlpesan; ?></span><i class='fa fa-envelope'></i> Pesan</a>
      <a href="<?php echo base_url(); ?>administrator/manajemenuser" class='btn btn-app'><i class='fa fa-users'></i> Users</a>
    </div>
  </div>
</section><!-- /.Left col -->

<section class="col-lg-5 connectedSortable">
    <?php include "grafik.php"; ?>
</section><!-- right col -->
