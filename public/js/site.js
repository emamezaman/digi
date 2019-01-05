
var url_site = 'http://localhost:8000';
$("#product-cat li").hover(function(){
    $('ul',this).show();
},function(){
    $('ul',this).hide();
});
$(".sub-menu1 li").hover(function(){
    $('.menu-box',this).show();
},function(){
    $('.menu-box',this).hide();
});
//--------------------------------------------------------------slide amazing-----------------------------
var curent_amazing=0;
var count_amazing=0;
var  func_interval='';
 function load_slider_amazing(count){ 
  count_amazing=count;
 func_interval = setInterval(next_amazing_slide,3000);
}

 next_amazing_slide = function(){
  $(".amazing_product").hide();
  $(".amazing_footer").attr('class','off_amazing amazing_footer');
  $(".amazing_span").attr('class','amazing_span no_tick');
 
 curent_amazing++;
 $("#amazing_product_" + curent_amazing).show();
 $("#amazing_footer_" + curent_amazing).attr('class','active_amazing amazing_footer');
 $("#amazing_span_" + curent_amazing).attr('class','amazing_span tick');

 if(curent_amazing == count_amazing - 1){
   curent_amazing = -1;
}
 
} 
  function show_amazing(i,len){
       curent_amazing=i;
       $(".amazing_product").hide();
       $(".amazing_footer").attr('class','off_amazing amazing_footer');
       $(".amazing_span").attr('class','amazing_span no_tick');
       $("#amazing_product_" + i).show();
       $("#amazing_footer_" + i).attr('class','active_amazing amazing_footer');
       $("#amazing_span_" + i).attr('class','amazing_span tick');

    }
    $(".amazing_footer").hover(function(){
        clearInterval(func_interval);
    },function(){
        load_slider_amazing(count_amazing);
    });
  


//--------------------------------------------------------------slide amazing-----------------------------

 // script page index  // sleder script
//
//var img_count = 0;
//var img = 0;
//    load_slider= function(count){
//    	img_count = count;
//    setInterval(next,3000);
// }
//
//
//
// next = function(){
//  for(var i=0;i<img_count;i++){
//      $("#slide_img_" + i).css('display','none');
//        document.getElementById('slider_li_' + i).className = 'slide_li';
//        document.getElementById('slider_span_' + i).className = 'ab1';
//  }
//
//  if(img == img_count-1)
//  {
//    img = -1;
//  }
//  img = img + 1;
//
//     $("#slide_img_" + img).css('display','block');
//     document.getElementById('slider_li_' + img).className = 'slider_li_active ';
//     document.getElementById('slider_span_' + img).className = 'ab';
// }
//
//
// previous = function(){
//   $("#slide_img_" + img).css('display','none');
//       document.getElementById('slider_li_' + img).className = 'slide_li';
//        document.getElementById('slider_span_' + img).className = 'ab1';
//          img = img - 1;
//    if(img == -1){
//      img = img_count - 1;
//   }
// $("#slide_img_" + img).css('display','block');
//    document.getElementById('slider_li_' + img).className = 'slider_li_active';
//     document.getElementById('slider_span_' + img).className = 'ab';
//    }
//    //======================================
//    $(".slider_li li").click(function() {
//       var id = this.id;
//       img  = parseInt( id.replace('slider_li_','')) ;
//       for(var i = 0; i < img_count; i++){
//       $("#slide_img_" + i).css('display','none');
//       document.getElementById('slider_li_' + i).className = 'slide_li';
//        document.getElementById('slider_span_' + i ).className = 'ab1';
//  }
//   $("#slide_img_" + img).css('display','block');
//    document.getElementById('slider_li_' + img).className = 'slider_li_active';
//     document.getElementById('slider_span_' + img).className = 'ab';
//    });

    // script slider amazing

   


//=======script page product ============


 //script soom image
 $('#zoom_01').elevateZoom({
    zoomWindowPosition:'img_load_zoom',
    borderSize:0.5,
    scrollZoom:true,
    cursor: "crosshair",
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 750,
    zoomWindowWidth:500,
    zoomWindowHeight:500,

   });

//==========================================
// script show hide review
 function show_review(key){
  var review = 'review-div-' + key;
  var d = document.getElementById(review).style.display;
  if(d=='none')
  {
    $("#" + review).slideDown('slow');
    document.getElementById('review-span-'+key).className='menha';
  }else{
   $("#" + review).slideUp('slow');
   document.getElementById('review-span-'+key).className='plus';
  }
}
//show service in  page product
function show_service(){
    var d=document.getElementById('service_box_body').style.display;

    if(d=='block'){
       $("#service_box_body").slideUp('slow');
        document.getElementById('service_title_icon').className="icon";
    }else{

       $("#service_box_body").slideDown('slow');
        document.getElementById('service_title_icon').className="icon2";
    }
}


// delete user address
function del_row(id,url,token)
{

    if(!confirm('آیا از حذف این رکورد اطمینان دارید؟'))
        return false;

    var form = document.createElement("form");
    form.setAttribute('method','POST');
    form.setAttribute('action',url + '/' + id);
    var hiddenField1 = document.createElement('input');
    hiddenField1.setAttribute('name','_method');
    hiddenField1.setAttribute('value','DELETE');
    form.appendChild(hiddenField1);
    var hiddenField2 = document.createElement('input');
    hiddenField2.setAttribute('name','_token');
    hiddenField2.setAttribute('value',token);
    form.appendChild(hiddenField2);

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}
/*--------------------------------page include search-------------------------------------*/

//logout

// function logout(token){
//  if(!confirm('آیا برای خروج مطمئن هستید؟'))
//         return false;
//
//     var form = document.createElement("form");
//     form.setAttribute('method','POST');
//     form.setAttribute('action',url_site + '/' + 'logout');
//     var hiddenField1 = document.createElement('input');
//     hiddenField1.setAttribute('name','_token');
//     hiddenField1.setAttribute('value',token);
//     form.appendChild(hiddenField1);
//     document.body.appendChild(form);
//     form.submit();
//     document.body.removeChild(form);
//
// }
//---------------------------------------------------------------------------------
 function send_code(token){
  var value = $("#discount_code_value").val();
  var url = url_site + '/' + 'site_check_discount_code';
  if(value.trim() != null){
    $.ajax({
      url:url,
      type:'POST',
      data:{discount_code:value,_token:token},
      success:function(data){
        var c = $("#message_discount");
        c.css('display','block');
        c.html(data);

      }
    });
  }
}
//----------------------------------------------------------------------
function send_gift_code(token){
  var gift_code = $("#gift_code").val();
  var url = url_site + '/' + 'site_check_gift_code';
  if(gift_code.trim() != null){
    $.ajax({
      url:url,
      type:'POST',
      data:{gift_code:gift_code,_token:token},
      success:function(data){
        var c = $("#message_gift");
        c.css('display','block');
       
        if(data==-1){
          c.html('<div class="alert alert-danger">کارت هدیه وارد شده صحیح نمی باشد یا قبلا استفاده شده</div>');
        }else{
           c.html('<div class="alert alert-success">'+data+'</div>');
        }

      }
    });
  }
}

show_more_image = function(){
  $("#box_more_image").modal('show');
}
change_image2 = function(url){
  $("#single_image").attr('src',url);
   
}
 change_image = function(url){
    
   var ez =$('#zoom_01').data('elevateZoom');
    ez.swaptheimage(url,url);
  
}
 

