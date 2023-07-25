<?php
	$tgl_posting   = tgl_indo($rows['tgl_posting']);
	$tgl_mulai   = tgl_indo($rows['tgl_mulai']);
	$tgl_selesai = tgl_indo($rows['tgl_selesai']);
	$isi_agenda=nl2br($rows['isi_agenda']);
	$baca = $rows['dibaca']+1;
?>	
<div class="main-page left">
	<div class="single-block">
		<div class="content-block main left">
			<div class="block">
				<div class="block-title">
					<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>
					<h2><?php echo "$rows[tema]"; ?></h2>
				</div>
				<div class="block-content">
					<div class="shortcode-content">
						<div class="paragraph-row">
							<div class="column12">
								<?php 
									echo "<img width='100%' src='".base_url()."asset/foto_agenda/$rows[gambar]'><hr>
										  <table>
										  <tr><td width=65px><b>Tema</b><br><br></td> <td width=15px> : </td> 	<td>$rows[isi_agenda]<br><br></td></tr>
										  <tr><td><b>Tanggal</b></td> 	<td> : </td> <td>$tgl_mulai s/d $tgl_selesai</td></tr>
										  <tr><td><b>Tempat</b></td> 	<td> : </td> <td>$rows[tempat]</td></tr>
										  <tr><td><b>Jam</b></td> 	<td> : </td> <td>$rows[jam]</td></tr>
										  </table><br><br>";
								?>
							</div>
						</div>
						<?php
						$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',7,1)->row_array();
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
								<?php echo "<a href='#'>$rows[nama_lengkap] - $rows[email]</a>";	
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class='main-sidebar right'>
	<?php include "sidebar_kanan.php"; ?>
</div>