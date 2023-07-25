<br>
<div class="widget widget-search">
<?php
echo "<div class='header-search'>
	".form_open('berita/index')."
		<input type='text' placeholder='Masukkan Pencarian + Enter.....' name='kata' class='search-input' required/>
		<input type='submit' value='Search' name='cari' class='search-button'/>
	</form>
</div>";
?>
</div>
<div style="clear:both"></div>
<div class="widget">
	<h3>Principal</h3>
	<div class="widget-articles">
		<center>
			<?php
			$kepsek = $this->model_app->view_where('users',array('username'=>'kepala'))->row_array();
			echo "<img style='border:3px solid #fff' width='170px' src='".base_url()."asset/foto_user/$kepsek[foto]'>
			<p><b>Kepala Sekolah</b><br> $kepsek[nama_lengkap] <br>";
			$sekolah1 = $this->model_app->view_where_ordering('halamanstatis',array('kelompok'=>'0'),'urutan','ASC');
			foreach ($sekolah1 as $s) {
				echo "<a style='color:red' href='".base_url()."halaman/detail/$s[judul_seo]'>Baca Sambutan</a>";
			}
			?>
			
			</p>
		</center>
	</div>
</div>

<div class="widget">
	<h3>Artikel Terpopuler</h3>
	<div class="widget-articles">
		<ul>
			<li>
				<?php 
					$populer = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.status' => 'Y'),'dibaca','DESC',0,5);
					foreach ($populer->result_array() as $r2x) {
					$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2x['id_berita']))->num_rows();
					echo "<li>
							<div class='article-photo'>";
								if ($r2x['gambar'] ==''){
									echo "<a href='".base_url()."berita/detail/$r2x[judul_seo]' class='hover-effect'><img style='width:59px; height:42px;' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='' /></a>";
								}else{
									echo "<a href='".base_url()."berita/detail/$r2x[judul_seo]' class='hover-effect'><img style='width:59px; height:42px;' src='".base_url()."asset/foto_berita/$r2x[gambar]' alt='' /></a>";
								}
							echo "</div>
							<div class='article-content'>
								<h4><a href='".base_url()."berita/detail/$r2x[judul_seo]'>$r2x[judul]</a><a href='".base_url()."berita/detail/$r2x[judul_seo]' class='h-comment'>$total_komentar</a></h4>
								<span class='meta'>
									<a href='".base_url()."berita/detail/$r2x[judul_seo]'><span class='icon-text'>&#128340;</span>$r2x[jam], ".tgl_indo($r2x['tanggal'])."</a>
								</span>
							</div>
						  </li>";
					}
				?>
			</li>
		</ul>
	</div>
</div>

<div class="widget">
	<h3>Link Terkait</h3>
	<ul style="padding:0px 15px 0px 15px" class="article-list">
		<?php 
			$link_terkait = $this->model_utama->view_ordering_limit('link_terkait','id_link','DESC',0,50);
			foreach ($link_terkait->result_array() as $row) {	
			echo "<li><a target='BLANK' href='$row[url]'>$row[judul]</a></li>";
			}
		?>
	</ul>
</div>