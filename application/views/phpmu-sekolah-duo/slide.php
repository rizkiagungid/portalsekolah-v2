    <div id="jssor_1" class='jssor_1' style="margin-top:-18px;height: 190px;">
        <!-- Loading Screen -->
        <div data-u="loading" class='loading'>
            <div class='slide1'></div>
            <div class='slide2'></div>
        </div>
        <div data-u="slides" class='slides'>
            <?php
                $slide1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC',0,5);
                $no=1;
                foreach ($slide1->result_array() as $row) {
                    if ($row['gambar'] ==''){ $foto_slide = 'no-image.jpg'; }else{ $foto_slide = $row['gambar']; }
                    if (strlen($row['judul']) > 40){ $judul = substr($row['judul'],0,40).',..';  }else{ $judul = $row['judul']; }
                    echo "<div>
                            <img data-u='image' src='".base_url()."asset/foto_berita/$foto_slide'/>
                            <div class='caption' u='caption' ><p>Caption text</p></div>
                            <div data-u='thumb'><a style='color:#fff' href='".base_url()."berita/detail/$row[judul_seo]'>
                            </a></div>
                        </div>"; 
                    $no++;
                }
            ?>
        </div>
        <!-- Thumbnail Navigator -->
    </div>
    