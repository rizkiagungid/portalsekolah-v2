<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'sms',
            type: 'column'
         },   
         title: {
            text: 'Laporan Sebaran Lulusan Tahun <?php echo "$tahunn"; ?>'
         },
         xAxis: {
            categories: ['Universitas / Jumlah']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
            
            $link = $this->db->query("SELECT * FROM link_terkait a JOIN grafik_lulusan b ON a.id_link=b.id_link where b.tahun='$tahunn'");
            foreach ($link->result_array() as $ret) {
              $id_link=$ret['id_link'];     
              $kampus=$ret['judul'];   
                $sql_jumlah = $this->db->query("SELECT * FROM grafik_lulusan WHERE id_link='$id_link' AND tahun='$tahunn'");
                foreach ($sql_jumlah->result_array() as $data) {
                    $jumlah = $data['jumlah']; 
                    if ($jumlah >= 1){
                       $total = $data['jumlah']; 
                    }else{
                       $total = 0;
                    }                
                }             
                  ?>
                  {
                      showInLegend: false,
                      name: '<?php echo $kampus; ?>',
                      data: [<?php echo $total; ?>]
                  },
            <?php } ?>
            ]
      });
   });  
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/modules/exporting.js"></script>
<div style='width:90%; height:300px' id='sms'></div>

