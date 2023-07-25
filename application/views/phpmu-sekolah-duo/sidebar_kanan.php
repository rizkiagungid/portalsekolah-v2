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
			<center><b>Kepala Sekolah</b><br> $kepsek[nama_lengkap] <br></center>";
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
	<h3>Pengumuman Terbaru</h3>
		<ul class="article-list">
				<?php
					$no = 1; 
					$pengumuman = $this->model_app->view_ordering_limit('pengumuman','id_pengumuman','DESC',0,5);
					foreach ($pengumuman->result_array() as $row) {
					$ex = explode(' ', $row['tanggal']);
						if ($row['file_download']==''){ $file = 'Tidak Ada File yang Di sertakan/lampirkan'; $color = 'red'; $ket = ''; }else{ $file = $row['file_download']; $color = 'blue'; $ket = 'Download Lampiran file :'; }
						echo "<li style='padding:0px 10px'>
								<div class='article-content'>
									<span class='meta'>
										<a style='color:#000' href='#'><span class='icon-text'>&#128340;</span>".$ex[1].", ".tgl_indo($ex[0])."</a>
									</span>
									<h3 style='margin-bottom:7px;'><a href='#'>$row[judul]</a></h3>
									
								</div>
							  </li>";
						$no++;
					}
				?>
		</ul>
		<a href="<?php echo base_url()."pengumuman"; ?>" class="more">Lihat Semua</a>
</div>

<div class="widget">
	<h3>Berita Populer</h3>
		<ul class="article-list">
				<?php 
					$populer = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.status' => 'Y','berita.headline' => 'N'),'dibaca','DESC',0,5);			
					foreach ($populer->result_array() as $r2x) {
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
</div>

<div class="widget">
	<h3>AGENDA KEGIATAN</h3>
		<ul class="article-list">
				<?php 
					$agenda = $this->model_utama->view_ordering_limit('agenda','id_agenda','DESC',0,3);
					foreach ($agenda->result_array() as $r) {
					$tgl_mulai   = tgl_indo($r['tgl_mulai']);
					$tgl_selesai = tgl_indo($r['tgl_selesai']);
					echo "<li>
							<div class='article'>
								<h3 style='margin:2px;'><a href='".base_url()."agenda/detail/$r[tema_seo]'>$r[tema]</a></h3>
								<span class='meta'>
									<a href='".base_url()."agenda/detail/$r[tema_seo]'><span class='icon-text'>&#128340;</span>$tgl_mulai s/d $tgl_selesai</a>
								</span>
							</div>
						  </li>";
					}
				?>
		</ul>
</div>

<div class="widget">
	<h3>STATISTIK PENGUNJUNG</h3>
		<ul class="article-list">
          <?php 
              $pengunjung       = $this->db->query("SELECT * FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY ip")->num_rows();
              $totalpengunjung  = $this->db->query("SELECT COUNT(hits) as total FROM statistik")->row_array();
              $hits             = $this->db->query("SELECT SUM(hits) as total FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal")->row_array();
              $totalhits        = $this->db->query("SELECT SUM(hits) as total FROM statistik")->row_array();
              $bataswaktu       = time() - 300;
              $pengunjungonline = $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'")->num_rows();
              echo "<li><div class='article'><h3 style='margin:2px;'>User Online <span class='right button' style='padding:2px 10px'>$pengunjungonline</span></h3></div></li>
                    <li><div class='article'><h3 style='margin:2px;'>Today Visitor <span class='right button' style='padding:2px 10px'>$pengunjung</span></h3></div></li>
                    <li><div class='article'><h3 style='margin:2px;'>Hits hari ini <span class='right button' style='padding:2px 10px'>$hits[total]</span></h3></div></li>
                    <li><div class='article'><h3 style='margin:2px;'>Total pengunjung <span class='right button' style='padding:2px 10px; background:#bf0000; color:#ffffff;'>$totalpengunjung[total]</span></h3></div></li>
                    <li><div class='article'><h3 style='margin:2px;'>IP Anda <span class='right button' style='padding:2px 10px; background:#ff3d3d; color:#ffffff;'>".$_SERVER['REMOTE_ADDR']."</span></h3></div></li>";
          ?>
        </ul>
</div>