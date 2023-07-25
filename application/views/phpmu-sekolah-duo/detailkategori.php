					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									<div class="block">
										<div class="block-title">
											<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>
											<h2>Artikel Kategori "<?php echo "$rows[nama_kategori]"; ?>"</h2>
										</div>
										<div class="block-content">
											<?php
											if ($beritakategori->num_rows()>1){
											  foreach ($beritakategori->result_array() as $r1) {
											  		$tglr = tgl_indo($r1['tanggal']);	
												  $baca = $r1['dibaca']+1;	
												  $isi_berita =(strip_tags($r1['isi_berita'])); 
												  $isi = substr($isi_berita,0,220); 
												  $isi = substr($isi_berita,0,strrpos($isi," ")); 
												  $judul = $r1['judul']; 
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
											}else{
												echo "<center style='padding:20%'>Maaf Belum ada Artikel pada halaman ini.</center>";
											}
										?>
											<div class="pagination">
												<?php echo $this->pagination->create_links(); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="main-sidebar right">
							<?php include "sidebar_kanan.php"; ?>
						</div>
						<div class="clear-float"></div>
					</div>