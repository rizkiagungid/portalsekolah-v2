<!DOCTYPE HTML>
<html lang = "en">
<head>
<title><?php echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow">
	<meta name="description" content="<?php echo $this->db->escape_str($description); ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<meta name="author" content="phpmu.com">
	<meta name="robots" content="all,index,follow">
	<meta http-equiv="Content-Language" content="id-ID">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">
	<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
	<?php if ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail'){ $rows = $this->model_utama->view_where('berita',array('judul_seo' => $this->uri->segment(3)))->row_array();
	   echo '<meta property="og:title" content="'.$title.'" />
			 <meta property="og:type" content="article" />
			 <meta property="og:url" content="'.base_url().'berita/detail/'.$this->uri->segment(3).'" />
			 <meta property="og:image" content="'.base_url().'asset/foto_berita/'.$rows['gambar'].'" />
			 <meta property="og:description" content="'.$this->db->escape_str($description).'"/>';
	} ?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo favicon(); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/reset.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/main-stylesheet.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/shortcode.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/fonts.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/responsive.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/style.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/ideaboxWeather.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/slide/slide.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/lightbox/lightbox.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/jscript/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/jscript/jquery-latest.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/jscript/theme-scripts.js"></script>
	<?php if ($this->uri->segment(1)=='main' OR $this->uri->segment(1)==''){ ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/slide/js/jssor.slider-23.1.0.mini.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/slide/js/slide.js"></script>
	<?php } ?>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>
		$(document).ready(function(){
		    $("#hide").click(function(){
		        $("#fbbanner").hide();
		    });
		});
	</script>
</head>

<body>
<div id='Back-to-top'>
  <img alt='Scroll to top' src='http://members.phpmu.com/asset/css/img/top.png'/>
</div>
		<div class="boxed active">		
			<div class="header">
				<?php 
				include "header.php"; 
				if ($this->uri->segment(1)=='main' OR $this->uri->segment(1)==''){
					$cekslide = $this->model_utama->view_single('berita',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC');
					if ($cekslide->num_rows() > 0){
					  include "slide.php";
					}
				}
				?>
			</div>
			
			<div class="content">
				<div class="wrapper">	
					<center>
					<?php
					  $iklanatas = $this->model_utama->view('iklanatas');
					  foreach ($iklanatas->result_array() as $b) {
						$string = $b['gambar'];
						if ($b['gambar'] != ''){
							if(preg_match("/swf\z/i", $string)) {
								echo "<embed width='100%' src='".base_url()."asset/foto_iklanatas/$b[gambar]' quality='high' type='application/x-shockwave-flash'>";
							} else {
								echo "<a href='$b[url]' target='_blank'><img width='100%' src='".base_url()."asset/foto_iklanatas/$b[gambar]' alt='$b[judul]' /></a>
									  <a href='$b[url]' class='ad-link'><span class='icon-text'>&#9652;</span>$b[judul]<span class='icon-text'>&#9652;</span></a>";
							}
						}
					  }
					?>
					</center>
					<div class="main-content">
						<?php echo $contents; ?>
					<div class="clear-float"></div>
					</div>

				</div>

			</div>

			<div class="block">
				<div class="block-content">

				<div class="paragraph-row">
					<div class="column4" style='padding:0 10px'>
						<?php $r1 = $this->model_utama->view_where('kategori',array('sidebar' => 1))->row_array(); ?>
						<div class="widget"><h3>Berita <?php echo $r1['nama_kategori']; ?></h3></div>
						
						<ul class="article-list" style='height:300px; overflow:scroll;'>
							<?php 
								$kategori1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r1['id_kategori'],'berita.status' => 'Y','berita.headline' => 'N'),'id_berita','DESC',0,10);			
								foreach ($kategori1->result_array() as $r2x) {
								$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2x['id_berita']))->num_rows();
									echo "<li style='padding:0px 10px'>
											<div class='article-content'>
												<span class='meta'>
													<a style='color:#000' href='".base_url()."berita/detail/$r2x[judul_seo]'><span class='icon-text'>&#128340;</span>$r2x[jam], ".tgl_indo($r2x['tanggal'])."</a>
												</span>
												<h3 style='margin-bottom:7px;'><a href='".base_url()."berita/detail/$r2x[judul_seo]'>$r2x[judul]</a></h3>
												
											</div>
										  </li>";
								}
							?>
						</ul>
						<a href="<?php echo base_url()."kategori/detail/$r1[kategori_seo]"; ?>" class="more">Lihat Semua</a>
					</div>

					<div class="column4">
						<?php $r2 = $this->model_utama->view_where('kategori',array('sidebar' => 2))->row_array(); ?>
						<div class="widget"><h3>Berita <?php echo $r2['nama_kategori']; ?></h3></div>
						
						<ul class="article-list" style='height:300px; overflow:scroll;'>
							<?php 
								$kategori2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r2['id_kategori'],'berita.status' => 'Y','berita.headline' => 'N'),'id_berita','DESC',0,10);			
								foreach ($kategori2->result_array() as $r2x) {
								$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2x['id_berita']))->num_rows();
									echo "<li style='padding:0px 10px'>
											<div class='article-content'>
												<span class='meta'>
													<a style='color:#000' href='".base_url()."berita/detail/$r2x[judul_seo]'><span class='icon-text'>&#128340;</span>$r2x[jam], ".tgl_indo($r2x['tanggal'])."</a>
												</span>
												<h3 style='margin-bottom:7px;'><a href='".base_url()."berita/detail/$r2x[judul_seo]'>$r2x[judul]</a></h3>
												
											</div>
										  </li>";
								}
							?>
						</ul>
						<a href="<?php echo base_url()."kategori/detail/$r2[kategori_seo]"; ?>" class="more">Lihat Semua</a>
	
					</div>

					<div class="column4">
						<?php $r3 = $this->model_utama->view_where('kategori',array('sidebar' => 3))->row_array(); ?>
						<div class="widget"><h3>Berita <?php echo $r3['nama_kategori']; ?></h3></div>
						
						<ul class="article-list" style='height:300px; overflow:scroll;'>
							<?php 
								$kategori3 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r3['id_kategori'],'berita.status' => 'Y','berita.headline' => 'N'),'id_berita','DESC',0,10);			
								foreach ($kategori3->result_array() as $r2x) {
								$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2x['id_berita']))->num_rows();
									echo "<li style='padding:0px 10px'>
											<div class='article-content'>
												<span class='meta'>
													<a style='color:#000' href='".base_url()."berita/detail/$r2x[judul_seo]'><span class='icon-text'>&#128340;</span>$r2x[jam], ".tgl_indo($r2x['tanggal'])."</a>
												</span>
												<h3 style='margin-bottom:7px;'><a href='".base_url()."berita/detail/$r2x[judul_seo]'>$r2x[judul]</a></h3>
												
											</div>
										  </li>";
								}
							?>
						</ul>
						<a href="<?php echo base_url()."kategori/detail/$r3[kategori_seo]"; ?>" class="more">Lihat Semua</a>
					</div>
				</div>
				</div>
			</div>

			<footer>
				<div class="footer">
					<?php 
						include "footer.php";
						$this->model_utama->kunjungan(); 
					?>
				</div>
			</footer>
		</div>
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/background/<?php echo background(); ?>/js/bootstrap.js"></script>
		<script type="text/javascript">
	        $(document).ready(function(){
	              $(window).load(function(){
	                  $('#myModal').modal('show');
	              });
	        });
	    </script>
		<script type='text/javascript'>

		$(function() { $(window).scroll(function() {
		    if($(this).scrollTop()>400) { $('#Back-to-top').fadeIn(); }else { $('#Back-to-top').fadeOut();}});
		    $('#Back-to-top').click(function() {
		        $('body,html')
		        .animate({scrollTop:0},300)
		        .animate({scrollTop:40},200)
		        .animate({scrollTop:0},130)
		        .animate({scrollTop:15},100)
		        .animate({scrollTop:0},70);
		        });
		});

		function jam(){
			var waktu = new Date();
			var jam = waktu.getHours();
			var menit = waktu.getMinutes();
			var detik = waktu.getSeconds();
			 
			if (jam < 10){ jam = "0" + jam; }
			if (menit < 10){ menit = "0" + menit; }
			if (detik < 10){ detik = "0" + detik; }
			var jam_div = document.getElementById('jam');
			jam_div.innerHTML = jam + ":" + menit + ":" + detik;
			setTimeout("jam()", 1000);
		} jam();

		</script>

	<script type="text/javascript">
      (function (jQuery) {
      $.fn.ideaboxWeather = function (settings) {
      var defaults = {
      modulid   :'Swarakalibata',
      width :'100%',
      themecolor    :'#2582bd',
      todaytext :'Hari Ini',
      radius    :true,
      location  :' Jakarta',
      daycount  :7,
      imgpath   :'img_cuaca/', 
      template  :'vertical',
      lang  :'id',
      metric    :'C', 
      days  :["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"],
      dayssmall :["Mg","Sn","Sl","Rb","Km","Jm","Sa"]};
      var settings = $.extend(defaults, settings);

      return this.each(function () {
      settings.modulid = "#" + $(this).attr("id");
      $(settings.modulid).css({"width":settings.width,"background":settings.themecolor});

      if (settings.radius)
      $(settings.modulid).addClass("ow-border");

      getWeather();
      resizeEvent();

      $(window).on("resize",function(){
      resizeEvent();});

      function resizeEvent(){
      var mW=$(settings.modulid).width();

      if (mW<200){
      $(settings.modulid).addClass("ow-small");}
      else{
      $(settings.modulid).removeClass("ow-small");}}

      function getWeather(){$.get("http://api.openweathermap.org/data/2.5/forecast/daily?q="+settings.location+"&mode=xml&units=metric&cnt="+settings.daycount+"&lang="+settings.lang+"&appid=b318ee3082fcae85097e680e36b9c749", function(data) {
      var $XML = $(data);
      var sstr = "";
      var location = $XML.find("name").text();
      $XML.find("time").each(function(index,element) {
      var $this = $(this);
      var d = new Date($(this).attr("day"));
      var n = d.getDay();
      var metrics = "";
      if (settings.metric=="F"){
      metrics = Math.round($this.find("temperature").attr("day") * 1.8 + 32)+"°F";}
      else{
      metrics = Math.round($this.find("temperature").attr("day"))+"°C";}

      if (index==0){
      if (settings.template=="vertical"){
      sstr=sstr+'<div class="ow-today">'+
      '<span><img src="<?php echo base_url(); ?>asset/'+settings.imgpath+$this.find("symbol").attr("var")+'.png"/></span>'+
      '<h2>'+metrics+'<span>'+ucFirst($this.find("symbol").attr("name"))+'</span><b>'+location+' - '+settings.todaytext+'</b></h2>'+
      '</div>';}
      else{
      sstr=sstr+'<div class="ow-today">'+
      '<span><img src="<?php echo base_url(); ?>asset/'+settings.imgpath+$this.find("symbol").attr("var")+'.png"/></span>'+
      '<h2>'+metrics+'<span>'+ucFirst($this.find("symbol").attr("name"))+'</span><b>'+location+' - '+settings.todaytext+'</b></h2>'+
      '</div>';}}
      else{
      if (settings.template=="vertical"){
      sstr=sstr+'<div class="ow-days">'+
      '<span>'+settings.days[n]+'</span>'+
      '<p><img src="<?php echo base_url(); ?>asset/'+settings.imgpath+$this.find("symbol").attr("var")+'.png" title="'+ucFirst($this.find("symbol").attr("name"))+'"> <b>'+metrics+'</b></p>'+
      '</div>';}
      else{
      sstr=sstr+'<div class="ow-dayssmall" style="width:'+100/(settings.daycount-1)+'%">'+
      '<span title='+settings.days[n]+'>'+settings.dayssmall[n]+'</span>'+
      '<p><img src="<?php echo base_url(); ?>asset/'+settings.imgpath+$this.find("symbol").attr("var")+'.png" title="'+ucFirst($this.find("symbol").attr("name"))+'"></p>'+
      '<b>'+metrics+'</b>'+
      '</div>';}}});

      $(settings.modulid).html(sstr); 
      });}

      function ucFirst(string) {
      return string.substring(0, 1).toUpperCase() + string.substring(1).toLowerCase();}});
      };
      })(jQuery);

      $(document).ready(function(){
      $('#example1').ideaboxWeather({
      location      :' Jakarta, ID'});});
    </script>
</body>
</html>