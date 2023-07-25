<div class="main-page left">
	<div class="single-block">
		<div class="content-block main left">
			<div class="block">
				<div class="block-title">
					<a href="#" class="right"><?php echo ($rows['hits_album']+1)."view"; ?></a>
					<h2><?php echo "$rows[jdl_album]"; ?></h2>
				</div>

				<div class="block-content">
					<div class="shortcode-content">
						<div class="paragraph-row">

							<div class="column12">
							<div class="block-content">
								<?php echo "$rows[keterangan]"; ?>
								<hr style='margin:10px'>
									<ul class='article-block-big'>
										<?php
										$no=$this->uri->segment(4)+1;
										  foreach ($detailalbum->result_array() as $h) {	
												echo "<li style='width:100%; margin-left:-13px;'>
														<div class='article-photo'>
															<h3>$no. $h[jdl_gallery]</h3>
															<img class='jslghtbx-thmb' style='width:87%' title='$h[jdl_gallery]' src='".base_url()."asset/img_galeri/$h[gbr_gallery]' alt='$h[jdl_gallery]' data-jslghtbx='".base_url()."asset/img_galeri/$h[gbr_gallery]' data-jslghtbx-group='group3' data-jslghtbx-caption='$h[keterangan]' /><br>
															<p>$h[keterangan]</p>
														</div>
													  </li>";
												$no++;
											}
										?>
									</ul>

									<div class='pagination'>
										<?php echo $this->pagination->create_links(); ?>
									</div>
							</div>
							</div>
						</div>
						<br>
						
						<?php
							$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',5,1)->row_array();
							echo "<a href='$ia[url]' target='_blank'>";
								$string = $ia['gambar'];
								if ($ia['gambar'] != ''){
									if(preg_match("/swf\z/i", $string)) {
										echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
									} else {
										echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
									}
								}
							echo "</a>";
						?>

						<div class="article-title">
							<div class="share-block right">
								<div>
									<div class="share-article left">
										<span>Social media</span>
										<strong>Share this article</strong>
									</div>
									<div class="left">
										<script language="javascript">
										document.write("<a href='http://www.facebook.com/share.php?u=" + document.URL + " ' target='_blank' class='custom-soc icon-text'>&#62220;</a> <a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62217;</a> <a href='https://plus.google.com/share?url=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62223;</a>");
										</script>
										<a href="#" class="custom-soc icon-text">&#62232;</a>
										<a href="#" class="custom-soc icon-text">&#62226;</a>
									</div>
								</div>
								
							</div>

							<div style="margin-top:0px" class="article-tags tag-cloud">
								<?php echo "<a href='#'>$rows[hari], ".tgl_indo($rows['tgl_posting'])." - $rows[jam] WIB</a>"; ?>
							</div>
						</div>
					</div>
				</div>
			<div id="fb-root"></div>
				<div id="viewcomment" class="block-title">
					<a href="#writecomment" class="right">Write a Facebook Comment</a>
					<h2>
						Komentar dari Facebook
					</h2>
				</div>
				<div class="block-content">
					<div class="comment-block">
						<div class="fb-comments" data-href="<?php echo base_url().'/albums/detail/'.$rows['album_seo']; ?>" data-width="640" data-numposts="5" data-colorscheme="light"></div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class='main-sidebar right' style='width: 320px;'>
	<?php include "sidebar_kanan.php"; ?>
</div>