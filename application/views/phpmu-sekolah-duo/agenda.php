					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									<div class="block">
										<div class="block-title">
											<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>											
											<h2>Agenda</h2>	
										</div>
										<div class="block-content">
											<?php
											  foreach ($agenda->result_array() as $r) {	
												  $tgl_posting = tgl_indo($r['tgl_posting']);
												  $tgl_mulai   = tgl_indo($r['tgl_mulai']);
												  $tgl_selesai = tgl_indo($r['tgl_selesai']);
												  $baca = $r['dibaca']+1;
												  $judull = substr($r['tema'],0,33); 
												  $isi_agenda =(strip_tags($r['isi_agenda'])); 
												  $isi = substr($isi_agenda,0,280); 
												  $isi = substr($isi_agenda,0,strrpos($isi," "));
												  
												  echo "<div class='wide-article'>
															<div class='article-photo'>";
															if ($r['gambar']==''){
																echo "<a class='hover-effect' href='".base_url()."agenda/detail/$r[tema_seo]'><img class='img-content' src='".base_url()."asset/foto_agenda/small_no-image.jpg'></a>";
															}else{
																echo "<a class='hover-effect' href='".base_url()."agenda/detail/$r[tema_seo]'><img class='img-content' src='".base_url()."asset/foto_agenda/$r[gambar]'></a>";
															}	
															echo "</div>
															<div class='article-content'>
																<h2><a title='$r[tema]' href='".base_url()."agenda/detail/$r[tema_seo]'>$judull</a></h2>
																<span class='meta'>
																	<a href='".base_url()."agenda/detail/$r[tema_seo]'><span class='icon-text'>&#128100;</span>$r[nama_lengkap]</a>
																	<a href='".base_url()."agenda/detail/$r[tema_seo]'><span class='icon-text'>&#128340;</span>$tgl_posting - $baca view</a>
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