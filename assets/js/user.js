$(function(){
   $('.form-group').on('click',function(){
      $(this).find('.text-danger.small').hide();
   })   
});

$(window).scroll(function() {
   if ($(window).scrollTop() > 50) {
      $('.btn-manage').addClass('btn-manage-fixed');
   }else{
      $('.btn-manage').removeClass('btn-manage-fixed');
   }
});

function Delete(url,ctrl,code){
   var ms = "ยืนยันการลบข้อมูล";
   if(ctrl=="Position"){
      ms = "ยืนยันการลบข้อมูล\n(รายชื่อบุคลากรสาขานี้ จะถูกลบออกด้วย)";
   }
   var r = confirm(ms);
   if (r == true) {
      $.post(url,{id:code},function(resp){
         window.location.reload();
      });
   }
}

function isEnglishchar(str){   
   var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890._-";   
   var str_length=str.length;   
   var isEnglish=true;   
   var Char_At="";   
   for(i=0;i<str_length;i++){   
      Char_At=str.charAt(i);   
      if(orgi_text.indexOf(Char_At)==-1){   
         isEnglish=false;   
         break;
      }      
   }
   return isEnglish; 
}

function readURL(input,imgid='show_img') {
   if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function (e) {
       $('#'+imgid).attr('src', e.target.result);
     }
     reader.readAsDataURL(input.files[0]);
   }
}

function gallery(input){
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#show_img').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
}

function clink(link){
   let link1 = link.substr(0,7);
   let link2 = link.substr(0,8);
   if(link1 != 'http://' && link2 != 'https://'){
      return false;
   }else{
      return true;
   }
}