<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">ค่าบริการการจัดส่ง</h1></h1>
            </div>
            <div class="col-sm-6">
               <div class="text-right">
                  <a href="<?php echo base_url('admin/Shippingrate/form'); ?>" type="button" class="btn btn-create btn-success">เพิ่มใหม่</a>
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
                  <td>การจัดส่ง</td>
                  <td align="center">จำนวน</td>
						<td width="100" align="right">ราคา</td>
						<td width="100" align="center">การใช้งาน</td>
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
                  <td>
							<?php foreach($cates as $cate){ if($cate['id'] == $item['shipping_id']){ echo $cate['name']; } } ?>
						</td>
						<td align="center"><?php echo $item['first_qty'].' - '.$item['last_qty']; ?> ซอง</td>
						<td align="right"><?php echo $item['shipping_rate']; ?> ฿</td>
                  <td align="center">
                     <div class="<?php echo ($item['status'] == '1' ? 'status-true' : 'status-false'); ?>"></div>
                  </td>
                  <td align="center" class="manage-list">
                     <a href="<?php echo base_url('admin/Shippingrate/edit/'.$item['id']); ?>" class="view mr-3">
                        <i class="far fa-edit"></i>
                     </a>
                     <i class="far fa-trash-alt" onClick="Delete('<?php echo base_url("admin/Shippingrate/Delete"); ?>','Banner','<?php echo $item['id']; ?>');"></i>
                  </td>
               </tr>
               <?php $i++;} }else{ ?>
               <tr><td align="center" colspan="6">ยังไม่มีข้อมูล <a href="<?php echo base_url('admin/Shippingrate/form'); ?>">เพิ่มข้อมูล</a></td></tr>
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
