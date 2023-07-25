					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									<div class="block">
										<div class="block-title">
											<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>
											<h2>Artikel Tag "<?php echo "$rows[nama_tag]"; ?>"</h2>
										</div>
										<div class="block-content">
											<?php
											  foreach ($beritatag->result_array() as $r) {	
												  $baca = $r['dibaca']+1;	
												  $isi_berita =(strip_tags($r['isi_berita'])); 
												  $isi = substr($isi_berita,0,220); 
												  $isi = substr($isi_berita,0,strrpos($isi," ")); 
												  $judul = $r['judul']; 
												  $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r['id_berita']))->num_rows();
												  
												  echo "<div class='wide-article'>
															<div class='article-photo'>
																<a href='".base_url()."berita/detail/$r[judul_seo]' class='hover-effect'>";
																	if ($r['gambar'] == ''){
																		echo "<img class='img-content' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' />";
																	}else{
																		echo "<img class='img-content' src='".base_url()."asset/foto_berita/$r[gambar]' alt='$r[gambar]' />";
																	}
																echo "</a>
															</div>
															<div class='article-content'>
																<h2><a title='$r[judul]' href='".base_url()."berita/detail/$r[judul_seo]'>$judul</a><a href='".base_url()."berita/detail/$r[judul_seo]' class='h-comment'>$total_komentar</a></h2>
																<span class='meta'>
																	<a href='".base_url()."berita/detail/$r[judul_seo]'><span class='icon-text'>&#128100;</span>$r[nama_lengkap]</a>
																	<a href='".base_url()."berita/detail/$r[judul_seo]'><span class='icon-text'>&#128340;</span>$r[jam], ".tgl_indo($r['tanggal'])."</a>
																</span>
																<p>$isi . . .</p>
															</div>
														</div>";
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
					
				<!-- END .wrapper -->
				</div>
				
			</div>