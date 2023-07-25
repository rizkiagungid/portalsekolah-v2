            <div class="full-width">
              <div class="block">
                <div class="block-title">
                    <?php 
                    if (isset($_POST['tahun'])){
                      $tahunn = strip_tags($_POST['tahun']);
                    }else{
                      $tahunn = date("Y");
                    }
                    echo "<h2>Data Sebaran Lulusan Tahun $tahunn
                          <form style='float:right;' action='".base_url()."alumni' method='POST'>";
                          echo "Lihat Data Tahun &nbsp; &nbsp; &nbsp; <select style='margin-top:-2px' name='tahun'>";
                            $year = date("Y");
                            for($n=2004; $n<=$year; $n++){ 
                              if ($tahunn == $n){
                                echo "<option value='$n' selected>$n</option>";
                              }else{
                                echo "<option value='$n'>$n</option>";
                              } 
                            }                       
                            echo "</select>
                            <input style='padding:0px 6px 0px 6px; margin-top:-2px' type='submit' name='filter' value='Lihat'>&nbsp; &nbsp;";
                        echo "</form>";
                      ?>
                  </h2>
                </div>
                <div class="block-content">
                  <div class="map-border">
                    <ul class="article-block-big">
                      <?php include "alumni_grafik.php"; ?>
                    </ul>

                    <table class='table-download' style='color:#000; font-weight:bold; border:1px solid #e3e3e3;' width='100%'>
                      <tr style='background:#8a8a8a'>
                        <th width='50px'>No </th>
                        <th>Nama Kampus / Universitas </th>
                        <th>Website</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php
                        $no = 1;
                        $tampil = $this->db->query("SELECT * FROM grafik_lulusan a JOIN link_terkait b ON a.id_link=b.id_link where a.tahun='$tahunn'");
                        foreach ($tampil->result_array() as $r) {
                            echo "<tr>
                                  <td>$no</td>
                                    <td>$r[judul]</td>
                                    <td><a style='color:blue' href='$r[url]'>$r[url]</a></td>
                                    <td>$r[jumlah] Orang</td>
                                  </tr>";
                          $no++;
                        }
                        echo "</table>";
                      ?>
                  </div>
                </div>
              </div>
            </div>