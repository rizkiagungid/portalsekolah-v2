<div class="full-width">
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
				<div class="clear-float"></div>
			</div>
			<div>
				<a href="javascript:printArticle();" class="small-button"><span class="icon-text">&#59158;</span>&nbsp;&nbsp;Print this article</a>
				<a href="#" class="small-button"><span class="icon-text">&#9993;</span>&nbsp;&nbsp;Send e-mail</a>
			</div>
		</div>

		<h1><?php echo "<b>$rows[judul]</b>"; ?></h1>
		<div class="author">
			<span class="hover-effect left">
			<?php $test = md5(strtolower(trim($rows['email']))); 
				echo "<img src='http://www.gravatar.com/avatar/$test.jpg?s=100'/>";
			?>
			</span>
			<div class="a-content">
				<span>By <b><?php echo "$rows[nama_lengkap]"; ?></b></span>
				<span class="meta"><?php echo tgl_indo($rows['tgl_posting']).", $rows[jam] WIB"; ?></span>
			</div>
		</div>
	</div>
</div>

<div class="main-page left">
	<div class="single-block">
		<div class="content-block main left">
			<div class="block">
				<div class="block-content">
					<div class="shortcode-content">
						<div class="paragraph-row">
							<div class="column12">
								<?php 
									if (trim($rows['gambar'])!=''){
										echo "<img style='width:100%' src='".base_url()."asset/foto_statis/$rows[gambar]'>";
									}
									if ($rows['isi_halaman']==''){
										echo "<center style='padding:15%; font-weight:bold; color:red'>Maaf, Belum ada Informasi pada Halaman ini.</center>"; 
									}else{
										echo "$rows[isi_halaman]";
									} 
								?>
							</div>
						</div><br>

						<?php
						$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',8,1)->row_array();
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
								<strong>Author : </strong>
								<?php echo "<a href='#'>$rows[nama_lengkap] - $rows[email]</a>";	?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class='main-sidebar right' style='width: 320px;'>
	<?php include "sidebar_kanan.php"; ?>
</div>