<section class="newspromotion-page pos-rel">
   <div class="container ptb-60 text-center">
      <div class="mt-5 p-title-bg">
         <h2 class="ff_rukdeaw font-h2">ข่าวสารและโปรโมชั่น</h2>         
      </div>
      <div class="row news-list mt-5">
         <?php if($info){foreach($info as $item){ $link = ($item['np_type']==3 ? $item['np_link'] : base_url('Newspromotion/detail/'.$item['np_id'])); ?>
            <div class="col-md-4 col-sm-6 news-item">
               <a href="<?php echo $link; ?>" <?php echo ($item['np_type'] == 3 ? 'target="_blank"' : ''); ?>>
                  <div class="news-img">
                     <img src="<?php echo base_url($item['np_thumbnail']); ?>">
                  </div>
                  <div class="news-title">
                     <span class="font-h5"><?php echo $item['np_name']; ?></span>
                  </div>
               </a>
            </div>
         <?php } } ?>         
      </div>
      <?php  if($count > 9){ ?>
         <div class="text-center">
            <button id="btn-more" class="btn btn-warning">เพิ่มเติม</button>
         </div>
      <?php } ?>
   </div>
</section>
<script>
   $(function(){
      var api_url = '<?php echo base_url('api/V1/newspromotion'); ?>';
      $('#btn-more').on('click',function(){
         var clist = $('.news-item').length;
         $.ajax({
            type: "POST",
            url: api_url,
            data: {start:clist},
            dataType: "json",
            success: function (response) {
               $.each(response, function(i, item) {
                  var link = '';
                  var target = '';
                  if(item.np_type==3){
                     link =  item.np_link;
                     target = 'target="_blank"';
                  }else{
                     link =  '<?php echo base_url('Newspromotion/detail/'); ?>'+item.np_id;
                  }
                  var html = '';
                  html += '<div class="col-md-4 col-sm-6 news-item">';
                  html += '<a href="'+link+'" '+target+'>';
                  html += '<div class="news-img">';
                  html += '<img src="'+item.np_thumbnail+'">';
                  html += '</div><div class="news-title">';
                  html += '<span class="font-h5">'+item.np_name+'</span></div></a></div>';
                  console.log(target);
                  $('.news-list').append(html);
               });
            }
         });
      });
   });
</script>