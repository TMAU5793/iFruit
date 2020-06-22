<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">ข้อมูลข่าวสาร โปรโมชั่น</h1></h1>
            </div>
            <div class="col-sm-6">
               <div class="text-right">
                  <a href="<?php echo base_url('admin/Newspromotion/form'); ?>" type="button" class="btn btn-create btn-success">เพิ่มใหม่</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <section class="content">
      <div class="container">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <td width="50">ลำดับ</td>
                  <td>ชื่อข่าวสาร โปรโมชั่น</td>
                  <td width="150" align="center">ประเภทบทความ</td>
                  <td width="150" align="center">เริ่มใช้งานโปรโมชั่น</td>
                  <td width="150" align="center">สิ้นสุดโปรโมชั่น</td>
                  <td width="100" align="center">สถานะ</td>
                  <td width="100" align="center">การจัดการ</td>
               </tr>
            </thead>
            <tbody>
               <?php
                  if($info){
                     $i=1;
                     foreach ($info as $item) {
               ?>
               <tr>
                  <td align="center"><?php echo $i; ?></td>
                  <td><?php echo $item['np_name']; ?></td>
                  <td align="center"><?php echo ($item['np_type']==2 ? 'โปรโมชั่น' : ($item['np_type']==3 ? 'ลิงค์' : 'ข่าวสาร')); ?></td>
                  <td align="center"><?php echo ($item['np_type']==2 ? $item['np_start'] : '-'); ?></td>
                  <td align="center"><?php echo ($item['np_type']==2 ? $item['np_end'] : '-'); ?></td>
                  <td align="center">
                     <div class="<?php echo ($item['np_status'] == '1' ? 'status-true' : 'status-false'); ?>"></div>
                  </td>
                  <td align="center" class="manage-list">
                     <a href="<?php echo base_url('admin/Newspromotion/edit/'.$item['np_id']); ?>" class="view mr-3">
                        <i class="far fa-edit"></i>
                     </a>
                     <i class="far fa-trash-alt" onClick="Delete('<?php echo base_url("admin/Newspromotion/Delete"); ?>','Work','<?php echo $item['np_id']; ?>');"></i>
                  </td>
               </tr>
               <?php $i++;} }else{ ?>
               <tr><td align="center" colspan="5">ยังไม่มีข้อมูล <a href="<?php echo base_url('admin/Newspromotion/form'); ?>">เพิ่มข้อมูล</a></td></tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<script type="text/javascript">
   
</script>