//=================================script slider page mobile.index=========================

var show_product_image = 0;
var  count_show_product_image = document.getElementsByClassName("show_product_img").length - 1;
var url = 'http://localhost:8000';
var product_status =0; 
var type_sort=0;
var min_price = 0;
var max_price = 0;
 
    //------------------------------slider product ----------------------------------------
  $(document).ready(function(){
   $('.regular').slick({
  
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
   responsive: [
    {
      breakpoint: 250,
      settings: { infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        dots: false
      }
    },
    {
      breakpoint: 380,
      settings: { infinite: true,
        slidesToShow: 1.4,
        slidesToScroll: 1.4
      }
    },
    {
      breakpoint: 450,
      settings: { infinite: true,
        slidesToShow: 1.7,
        slidesToScroll: 1.7
      }
    }
    ,
    {
      breakpoint: 620,
      settings: { infinite: true,
        slidesToShow: 2.5,
        slidesToScroll: 2.5
      }
    }
     ,
    {
      breakpoint:1024,
      settings: { infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
 
  ]

});   });
//====================================================================================

     
  function hide_cat_box(){
    
    var i=100;
    var e = document.getElementById("cat_box");
    var set = setInterval(function(){
      if(i < 85){
         $("#col_shadow").hide();
      }

     if(i > 0){
      i-= 20;
      var w = i + '%';
      e.style.width = w;
     }else{

     $("#cat_box").hide();
     clearInterval(set);

     }
    }, 10);
     document.body.style.overflow ="auto";
  }
/*-------------------------------------------------------------------------------*/
    function show_cat_box(){
     $("#cat_box").show();
     

    var i=0;
    var e = document.getElementById("cat_box");
    var set = setInterval(function(){
     
     if(i < 100){
      i += 20;
     var  w = i+ '%';
      e.style.width = w;
     }else{
      $("#col_shadow").show();
      clearInterval(set) ;
     }
    }, 10);

     document.body.style.overflow ="hidden";
  }
  /*------------------------------------------------------------------------------------*/
   

  function show_child_cat(id){
      var c = document.getElementById('cat_child_ul_'+id);
    
    if(c){
      if(c.style.display=='block'){
      $("#"+c.id).slideUp('fast');
      $("#fa-angle_"+id).addClass('fa-angle-down');
      $("#fa-angle_"+id).removeClass('fa-angle-up');
      }else{
         $("#"+c.id).slideDown('fast');
         $("#fa-angle_"+id).addClass('fa-angle-up');
          $("#fa-angle_"+id).removeClass('fa-angle-down');
      }
    }
   
  }

  /*--------------------------------------------------------------------------------------------*/
   
    $(document).ready(function(){
  
    var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
      loop: false,
        responsive: {
          0: {
            items: 1
          },
          
           400: {
            items: 2
          },
          600: {
            items: 3
          }
        }
      });

 });
 /*==================================script page product ==============================*/  

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
/*-----------------------------------------------------------------------*/
  function submit_form1(){
      $("#product_form").submit();
     
  }

  /*======================================cart page ==========================*/
    function setProduct(p_id,s_id,c_id,value,csrf){
      $(".loading_div").show();
      var url2 ='site/set_ajax_cart'
   $.ajax({
            url:url +'/' + url2,
            type:'POST',
            data:{
              service_id:s_id,product_id:p_id,color_id:c_id ,value:value,_token:csrf
            },
            success:function(r){
             $("#cart").html(r);
             $(".loading_div").hide();
        }
        });
}
/*---------------------------------------------------------------------------------*/

function delProductCart(p_id,s_id,c_id,csrf){

    $(".loading_div").show();

    var url2 = 'site/del_ajax_cart';
   $.ajax({
            url:url + '/' + url2,
            type:'POST',
            data:{
               service_id:s_id,product_id:p_id,color_id:c_id ,_token:csrf},
            success:function(data)
            {
                $("#cart").html(data);

                  $(".loading_div").hide();
             }
        });
}



//==========================================show product script=======================================================

   show_filter_box = function()
   {

    $(".filter_box").show();

    document.body.style.overflow="hidden";

   }
   /*------------------------------------------------------------------------------------------------------*/

    hide_filter_box = function()
   {

    $(".filter_box").hide();

    document.body.style.overflow="auto";

   }
   /*------------------------------------------------------------------------------------------------------*/

    show_child_filter = function(id){
    
    $(".filter_child_box").hide();

    $("#filter_child_box_" + id).show();

   }

   /*------------------------------------------------------------------------------------------------------*/


function send_ajax(url2,csrf,cat3_id){

    $(".loading_div").show();
    var j=0;
    var checks_value= new Array;
    var checks= new Array;
    checks_value=[-1];
    var checks =  document.getElementsByClassName('check_filter_product');
    for (var i = 0; i<checks.length;i++){
        if(checks[i].checked){
            checks_value[j] = checks[i].value;
            j++;
        }
    }

    $.ajax({
        url:url+'/'+url2 ,
        type:'POST',
        data:{
          checks_value:checks_value,
          product_status:product_status,
          min_price:min_price,
          max_price:max_price,
          cat3_id:cat3_id,
          type_sort:type_sort,
          _token:csrf
        },
        success:function(data){

            $(".loading_div").hide();
            hide_filter_box ();
            $("#list_product").html(data);
        }
    });

}


/*------------------------------------------------------------------------------------------------------*/

no_check = function(){
  var checks =  document.getElementsByClassName('check_filter_product');
    for (var i = 0; i<checks.length;i++){

        checks[i].checked =false;
           
            
        }
}
no_check();
    

/*------------------------------------------------------------------------------------------------------*/


    function set_filter(id){

    var c = document.getElementById('check_filter_'+id);
    if(c){

      if(c.className=="check_filter"){

         c.className="check_filter_active";

    }
    else if(c.className="check_filter_active"){

      c.className="check_filter";

    }
    }
        var c2 = document.getElementById('filter_checkbox_'+id);
        
        if(c2){
              
                c2.checked =!c2.checked;

              }
      
    }


   

 
    
 
 
function off_checkbox(){
   var a = $(".checkbox_price_filter");

   for (var i = 0;i < a.length ; i++) {
      a[i].checked=false;

  }
}

off_checkbox();

    function set_price_filter(id){
  var f = $("#checkbox_price_filter_" + id);
  var c = $("#check_filter_" + id);

  var d = c.attr('class');
  if(c){
    
     var r=f.prop('checked');
     f.prop('checked',!r);

    if(d == 'check_filter'){
      c.attr('class','check_filter_active');

    }else{
      c.attr('class','check_filter');
    }
    
    
       
    
    


  var e = $(".checkbox_price_filter");
  var value = new Array;
  var j=0;
for (var i = 0;i < e.length ; i++) {
  if(e[i].checked==true){
    var v = e[i].value.split('_');
    if(v.length==2){
    value[j]=parseInt(v[0]);
    j=j+1;
    value[j]=parseInt(v[1]);
    }
  }
}

 min_price=value[0];
 max_price=value[0];
for (var i = 1;i < value.length ; i++) {
  if(value[i] > max_price){
    max_price = value[i]; 
  }
  if(value[i] < min_price){
    min_price = value[i]; 
  }
}

  }
}
// ---------------------------------------------------------------------------
  $('.toggle-light').toggles({
      type:'select',
      text:{'on':'موجود','off':'همه'}
    });

     $('.toggle-light').on('toggle',function(e,action){
      if(action){
      product_status=1;

      }else{
       product_status=0;
      }
     });
     //-----------------------------------------------------------
  function remove_all_filter(url2,csrf,cat3_id){
     product_status=0;
     min_price=0;
     max_price=0;
     $(".check_filter_active").attr('class','check_filter');
     $(".checkbox_price_filter").prop('checked',false);
     $('.check_filter_product').prop('checked',false);
     send_ajax(url2,csrf,cat3_id);
  }
   
    /*------------------------------------------------------------------------------------------------------*/
  function sort_product(url2,csrf,cat3_id){
    val = $("#sort_select").val();
    type_sort = val;
    send_ajax(url2,csrf,cat3_id);

  }
   


  
   
    
     
  
    
 

             

