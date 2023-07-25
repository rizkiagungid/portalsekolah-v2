<div class="main-page left">
	<div class="double-block">
		<div class="content-block main right utama">					
			<div class="block">
				<?php 
					$sambutan = $this->model_app->view_where_ordering('halamanstatis',array('kelompok'=>'0'),'urutan','ASC');
					foreach ($sambutan as $s) {
						echo "<h2>$s[judul]</h2>";
								if (trim($s['gambar'])!=''){
									echo "<img style='width:150px; float:left; margin:10px' src='".base_url()."asset/foto_statis/$s[gambar]'>";
								}
							echo "<p style='text-align:justify'>$s[isi_halaman]</p>";
					}
				?>
			</div>
			<br>
			<div class="block">
				<div class="block-content">
					<?php 
						$terbaru = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.status' => 'Y', 'berita.headline'=>'N'),'id_berita','DESC',0,3);
						foreach ($terbaru->result_array() as $r1) {
							$tglr = tgl_indo($r1['tanggal']);
							$isi_berita = strip_tags($r1['isi_berita']); 
							$isi = substr($isi_berita,0,220); 
							$isi = substr($isi_berita,0,strrpos($isi," "));
							$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
							echo "<div class='wide-article'>
								<div class='article-photo'>";
									if ($r1['gambar'] ==''){
										echo "<a class='hover-effect' href='".base_url()."berita/detail/$r1[judul_seo]'><img class='img-content' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='' /></a>";
									}else{
										echo "<a class='hover-effect' href='".base_url()."berita/detail/$r1[judul_seo]'><img class='img-content' src='".base_url()."asset/foto_berita/$r1[gambar]' alt='' /></a>";
									}
							echo "</div>
							
								<div class='article-content'>
									<h2><a href='".base_url()."berita/detail/$r1[judul_seo]'><b>$r1[judul]</b></a></h2>
									<span class='meta'>
										<a href='".base_url()."berita/detail/$r1[judul_seo]'><span class='icon-text'>&#128340;</span>$r1[jam], $tglr - Oleh : $r1[nama_lengkap]</a>
									</span>
									<p>$isi . . . <a href='".base_url()."berita/detail/$r1[judul_seo]' class='h-comment'>$total_komentar</a></p>
								</div>
							</div>";
						}
					?>
					<a href="<?php echo base_url(); ?>berita/index" class="more">Lihat Semua Berita</a>
				</div>

			</div>


			<div class="block">
				<div class="block-content">
				<ul class="article-block-big">
				<?php 
					$no = $this->uri->segment(3)+1;
					$album = $this->model_utama->view_where_ordering_limit('album',array('aktif' => 'Y'),'id_album','DESC',0,4);
					foreach ($album->result_array() as $h) {	
						$total_foto = $this->model_utama->view_where('gallery',array('id_album' => $h['id_album']))->num_rows();
						echo "<li style='width:148px'>
								<div style='overflow:hidden; height:96px;' class='article-photo'>
									<a href='".base_url()."albums/detail/$h[album_seo]' class='hover-effect'>";
										if ($h['gbr_album'] ==''){
											echo "<a class='hover-effect' href='".base_url()."albums/detail/$h[album_seo]'><img style='width:215px' src='".base_url()."asset/img_album/no-image.jpg' alt='no-image.jpg' /></a>";
										}else{
											echo "<a class='hover-effect' href='".base_url()."albums/detail/$h[album_seo]'><img style='width:215px' src='".base_url()."asset/img_album/$h[gbr_album]' alt='$h[gbr_album]' /></a>";
										}
								echo "</a>
								</div>
								<div class='article-content'>
									<span style='font-size:14px; color:#8a8a8a;'><center>Ada $total_foto Foto</center></span>
								</div>
							  </li>";
					}
				?>
				</ul>
				<a href="<?php echo base_url(); ?>albums" class="more">Lihat Semua Gallery</a>
				</div>
			</div>

			<div class="block">
				<div class="block-content">
				<div class="google-maps">
					<?php $iden = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array(); ?>
					<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$iden[maps]"; ?>"></iframe>
				</div>
				</div>
			</div>

		</div>			
	</div>
</div>

<div class="main-sidebar right mobile">
	<?php include "sidebar_kanan.php"; ?>
</div>

<div class="main-sidebar right desktop" style='width:300px'>
	<?php include "sidebar_kanan.php"; ?>
</div>
