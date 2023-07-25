<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Halaman Baru</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_halamanbaru',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>   <td><input type='text' class='form-control' name='a'></td></tr>
                    <tr><th scope='row'>Isi Halaman</th>                 <td><textarea id='editor1' class='form-control' name='b'></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                    <td><input type='file' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Kelompok</th>   <td><select name='d' class='form-control'>
                                                               <option value='4'>- Pilih -</option>"; 
                                                               $data = array('0','1','2','3');
                                                               $value = array('Sambutan Kepsek','Profile Sekolah','Sarana dan Prasarana','Lainnya');
                                                               for ($i=0; $i < 4; $i++) { 
                                                                 echo "<option value='".$data[$i]."'>".$value[$i]."</option>";
                                                               }
                                                          echo "</select></td></tr>
                    <tr><th scope='row'>Urutan</th>   <td><input type='number' class='form-control' name='e' value='0'></td></tr>
                  </tbody>
                  </table>
                </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();
