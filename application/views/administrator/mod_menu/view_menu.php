            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Menu Website (Multilevel)</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_menuwebsite'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Menu</th>
                        <th>Level Menu</th>
                        <th>Link</th>
                        <th>Aktif</th>
                        <th>Position</th>
                        <th>Urutan</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $cmenu = $this->model_app->view_where('menu',array('id_menu'=>$row['id_parent']))->row_array();
                    if ($cmenu['id_parent']==''){ $menu = 'Menu Utama'; }else{ $menu = $cmenu['nama_menu']; }
                    echo "<tr><td>$no</td>
                              <td>$row[nama_menu]</td>
                              <td>$menu</td>
                              <td><a target='_BLANK' href='".base_url()."$row[link]'>$row[link]</a></td>
                              <td>$row[aktif]</td>
                              <td>$row[position]</td>
                              <td>$row[urutan]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_menuwebsite/$row[id_menu]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_menuwebsite/$row[id_menu]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>