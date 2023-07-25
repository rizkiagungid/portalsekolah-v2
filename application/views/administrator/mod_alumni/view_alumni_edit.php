<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit alumni</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_alumni',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_grafik]'>
                    <tr><th width='120px' scope='row'>Nama Kampus</th>  <td><select name='a' class='form-control' required>
                                                                            <option value='' selected>- Pilih -</option>";
                                                                            foreach ($record as $row){
                                                                              if($rows['id_link']==$row['id_link']){
                                                                                echo "<option value='$row[id_link]' selected>$row[judul]</option>";
                                                                              }else{
                                                                                echo "<option value='$row[id_link]'>$row[judul]</option>";
                                                                              }
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Jumlah</th>                     <td><input type='number' class='form-control' name='b' value='$rows[jumlah]'></td></tr>
                    <tr><th scope='row'>Tahun</th>                      <td><input type='number' class='form-control' name='c' value='$rows[tahun]'></td></tr>
                  </tbody>
                  </table>
                </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();