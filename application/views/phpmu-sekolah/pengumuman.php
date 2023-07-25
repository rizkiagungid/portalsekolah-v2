<div class="main-content">
	<div class="main-page left">
		<div class="double-block">
			<div class="content-block main left">
				<div class="block">
					<div class="block-title">
						<a href="<?php echo base_url(); ?>" class="right">Back to homepage</a>											
						<h2>Pengumuman</h2>	
					</div>
					<br>
					<ul class="article-list">
						<?php
								$no = $this->uri->segment(3)+1; 
								foreach ($pengumuman->result_array() as $row) {
									if ($row['file_download']==''){ $file = 'Tidak Ada File yang Di sertakan/lampirkan'; $color = 'red'; $ket = ''; }else{ $file = $row['file_download']; $color = 'blue'; $ket = 'Download Lampiran file :'; }
									echo "<li style='padding:0px 10px; list-style-type: none;'>
											<div style='margin-top:-10px' class='article'>
											<h3 style='margin-bottom:5px;'>$no. $row[judul] </h3>
												<span style='color:#dd8229'> $ket</span>
												<a style='color:$color; font-style:italic' href='".base_url()."download/file/$file'>$file</a><br>
												<span>$row[keterangan]</span>
											</p>
											</div>
										</li><br>";
									$no++;
								}
							?>			
						<div class="pagination">
							<?php echo $this->pagination->create_links(); ?>
						</div>
					</ul>
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