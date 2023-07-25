            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengumuman</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_pengumuman'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Tanggal</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $ex = explode(' ', $row['tanggal']);
                    $tgl_Posting = tgl_indo($ex[0]);
                    if ($row['file_download']==''){ $download = '<span style="color:red">Tidak ada File</span>'; }else{ $download = '<span>Download File</span>'; }
                    echo "<tr><td>$no</td>
                              <td>$row[judul]</td>
                              <td><a title='$row[file_download]' href='".base_url()."download/file_pengumuman/$row[file_download]'>$download</a></td>
                              <td>$tgl_Posting ".$ex[1]."</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_pengumuman/$row[id_pengumuman]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_pengumuman/$row[id_pengumuman]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>