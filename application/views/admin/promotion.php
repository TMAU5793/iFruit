<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">ข้อมูลโปรโมชั่น</h1></h1>
            </div>
            <div class="col-sm-6">
               <div class="text-right">
                  <a href="<?php echo base_url('admin/Promotion/form'); ?>" type="button" class="btn btn-create btn-success">เพิ่มใหม่</a>
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
                  <td>ชื่อโปรโมชั่น</td>
                  <td width="150" align="center">เริ่มใช้งานโปรโมชั่น</td>
                  <td width="150" align="center">สิ้นสุดโปรโมชั่น</td>
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
                  <td><?php echo $item['title']; ?></td>
                  <td align="center">
                     <div class="<?php echo ($item['status'] == '1' ? 'status-true' : 'status-false'); ?>"></div>
                  </td>
                  <td></td>
                  <td align="center" class="manage-list">
                     <a href="<?php echo base_url('admin/Promotion/edit/'.$item['id']); ?>" class="view mr-3">
                        <i class="far fa-edit"></i>
                     </a>
                     <i class="far fa-trash-alt" onClick="Delete('<?php echo base_url("admin/Promotion/Delete"); ?>','Work','<?php echo $item['id']; ?>');"></i>
                  </td>
               </tr>
               <?php $i++;} }else{ ?>
               <tr><td align="center" colspan="5">ยังไม่มีข้อมูล <a href="<?php echo base_url('admin/Promotion/form'); ?>">เพิ่มข้อมูล</a></td></tr>
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