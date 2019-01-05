var img_count = 0; 
var img = 0;   
 
      load_slider= function(count){
      img_count = count;
  //setInterval(next,3000);
 }    
 

 //----------------------------------------------------------------------------------------
 next = function(){
  for(var i=0;i<img_count;i++){
      $("#slide_img_" + i).css('display','none');
    
  }
  img = img + 1;
  
     $("#slide_img_" + img).css('display','block');
     if(img == img_count-1)
  {
    img = -1;
  }

 }
       
 
//----------------------------------------------------------------------------------------
 previous = function(){  
   for(var i=0;i<img_count;i++){
      $("#slide_img_" + i).css('display','none');
    
  }
     
      img = img - 1;
    if(img == -1){
      img = img_count - 1;
   } 
      $("#slide_img_" + img).css('display','block');
   
    }
    //-------------------------------------------------------------------------------------
    $(document).ready(function(){
  $("#slider_box1").swipe( {
    swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
      if(direction=='right'){
        previous();
      }  else if(direction=='left'){
        next();
      }
    }
  });
   });