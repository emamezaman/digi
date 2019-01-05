
var img_count = 0; 
var img = 0; 
    load_slider= function(count){
    	img_count = count;
    setInterval(next,3000);
 }

      

 next = function(){
  for(var i=0;i<img_count;i++){
      $("#slide_img_" + i).css('display','none');
        document.getElementById('slider_li_' + i).className = 'slide_li';
        document.getElementById('slider_span_' + i).className = 'ab1';
  }
       
  if(img == img_count-1)
  {
    img = -1;
  }
  img = img + 1;
  
     $("#slide_img_" + img).css('display','block');
     document.getElementById('slider_li_' + img).className = 'slider_li_active ';
     document.getElementById('slider_span_' + img).className = 'ab'; 
 }
 	    
  
 previous = function(){  
   $("#slide_img_" + img).css('display','none');
       document.getElementById('slider_li_' + img).className = 'slide_li';
        document.getElementById('slider_span_' + img).className = 'ab1';
          img = img - 1;
    if(img == -1){
      img = img_count - 1;
   } 
 $("#slide_img_" + img).css('display','block');
    document.getElementById('slider_li_' + img).className = 'slider_li_active';
     document.getElementById('slider_span_' + img).className = 'ab';
    }
    //======================================
    $(".slider_li li").click(function() {
       var id = this.id;
       img  = parseInt( id.replace('slider_li_','')) ;
       for(var i = 0; i < img_count; i++){
       $("#slide_img_" + i).css('display','none');
       document.getElementById('slider_li_' + i).className = 'slide_li';
        document.getElementById('slider_span_' + i ).className = 'ab1';
  }
   $("#slide_img_" + img).css('display','block');
    document.getElementById('slider_li_' + img).className = 'slider_li_active';
     document.getElementById('slider_span_' + img).className = 'ab';
    });