@extends('layouts.site') @section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}"> @endsection @section('content')
<div id="" class="row box shipping_page">
    <div class="header_shipping">
        <ul>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>

            <li class="bullet bgc_green tick  ">
                <a href="">
            <span>ورود به دیجی آنلاین   </span>
          </a>
            </li>
            <li class=" line tall_line bgc_green "></li>
            <li class="bullet border_green">
                <a href="">
            <span>اطلاعات ارسال سفارش  </span>
          </a>

            </li>

            <li class=" line tall_line bgc_lightgray "></li>
            <li class="bullet border_lightgray">
                <a href="">
            <span>بازبینی سفارش  </span>
          </a>
            </li>
            <li class=" line tall_line bgc_lightgray "></li>
            <li class="bullet border_lightgray">
                <a href="">
            <span>اطلاعات پرداخت</span>
          </a>
            </li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
        </ul>
    </div>
     
      
    <div class="body_shipping">
        <p> <span class="fa fa-caret-left"></span> انتخاب آدرس </p>
        <button onclick="show_address_form()" type="submit" class="btn btn-default">افزودن آدرس جدید</button>
        @if(Session::has('message'))
        <p> </p>
         <div class="alert alert-info">
          {{ Session::get('message') }}
        </div>
        @endif
        <form action="{{ url('shop/review') }}" method="post">
          {{ csrf_field() }}
        
        <div id="user_address_list" class="user_address_list">
           <div id="message">
          
           </div>

            <input type="hidden"    
           value="1" name="order_type" id="order_type">  
               
             
           @foreach($address as $key=>$value)
            @if($key==0)
             <input type="hidden"   
              value="{{ $value->id }}" name="order_address" id="order_address">
            @endif 
            

            <table>
                <tr>
                    <td  class="first_td" rowspan="3">
                      
                  <div id="active_address_rounded_{{ $value->id  }}"  class="active_address_rounded" onclick="set_address( {{ $value->id }})">
                        <label id="label_{{ $value->id }}"  class=" @if($key==0) bgc-blue @endif ">
                             <span   class=" check">
                               
                             </span>  
                        </label>
                          
                      </div>

                  
                        <div id="active_address_mark_{{ $value->id  }}" class="@if($key==0) active_address_mark @endif" >
                          <span id="mark_{{ $value->id  }}" class=" @if($key==0) mark @endif">
                            
                          </span>
                        </div>
                      

                     
                    </td>
                    <td colspan="3"><span>{{$value->full_name}}</span></td>
                    <td rowspan="3" class="end_td">
                       <div class="div_td">
 
                            <div class="edit_address" onclick="edit_address({{$value->id}});">
                            <i class="fa fa-edit"></i>
                           </div>

                        <div class="delete_address" ondblclick=delete_address({{$value->id}});" onclick="del_row('{{ $value->id }}','{{ url('shop/delete_address') }}','{{ Session::token() }}')">
                            <i class="fa fa-remove"></i>
                        </div>
 

                       </div>
                    </td>
                </tr>
                <tr>
                     
                    <td ><span>استان :  </span> <span>{{$value->get_ostan->ostan_name}}</span></td>
                    <td rowspan="2"><span>{{ $value->address}}</span>
                    <br><br>
                    <span>کد پستی : </span>
                    <span> {{ $value->zip_code }} </span>
                    </td>
                    <td><span>شماره تماس اظطراری : </span>
                    <span>{{$value->mobile}}</span>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <span>شهر : </span>
                        <span>{{$value->get_shar->shar_name}}</span>
                    </td>
                    <td>
                        <span>شماره تماس ثابت : </span>
                        <span>{{ $value->phone }} - {{$value->city_code}}</span>
                    </td>
                </tr>
               
            </table>
            @endforeach

            <p class="mt20"> <span class="fa fa-caret-left"></span>  انتخاب شیوه ارسال  </p>

            <table>
                <tr>
                    <td  class="first_td"  >

                  <div id="active_type_order_rounded_1"  class=" active_type_order_rounded" onclick="set_type( 1)">
                        <label id="label-1"  class="  bgc-blue2  ">
                             <span   class=" check">
                               
                             </span>  
                        </label>
                          
                      </div>
                        <div id="active_type_order_mark_1" class=" active_order_type_mark " >
                          <span id="mark-1" class="order_mark ">
                            
                          </span>
                        </div>
                      
                    </td>
                     
                    <td>
                      <div class="pull-right">
                        <img src="{{ asset('images/post_48_icon.png') }}">
                      </div>
                      <div class="pull-right">
                        <p class="pr15">تحویل اکسپرس دیجی کالا</p>
                        <p class="pr15">زمان تحویل : 1 روز کاری در صورت ثبت سفارش تا ساعت 12 (به جز جشنواره ای فروش و روز های تعطیل)</p>
                      </div>
                    </td>
                    <td style="width: 120px;" class="text-center">
                    <p>هزینه ارسال  </p>
                    <p><span>10,000تومان  </span></p> 
                    </td>

                   
                </tr>
            </table>
             <table>
                <tr>
                    <td  class="first_td"  >

                  <div id="active_type_order_rounded_2"  class=" active_type_order_rounded" onclick="set_type( 2)">
                        <label id="label-2"  class="  bgc-white2  ">
                             <span   class=" check">
                               
                             </span>  
                        </label>
                          
                      </div>
                        <div id="active_type_order_mark_2" class=" no_active_order_type_mark " >
                          <span id="mark-2" class="no_order_mark ">
                            
                          </span>
                        </div>
                      
                    </td>
                     
                    <td>
                      <div class="pull-right">
                        <img src="{{ asset('images/vtn_48_icon.png') }}">
                      </div>
                      <div class="pull-right">
                        <p class="pr15"> باربری (پس کرایه | لوازم خانگی سنگین)   </p>
                        <p class="pr15">ویژه لوازم خانگی سنگین  </p>
                      </div>
                    </td>
                    <td style="width: 120px;" class="text-center">
                    <p>هزینه ارسال  </p>
                    <p><span>پس کرایه  </span></p> 
                    </td>

                   
                </tr>
            </table>
        </div>
        <p></p>
        <div class="form-group">
          <p>
            <button class="btn btn-success" type="submit">ادامه ثبت سفارش   
              <span class="fa fa-arrow-left"></span></button>
          </p>
        </div>
        </form>

                  
                      

              
               
               
          
           

      
          



      
            <div class="modal fade" id="edit_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> ویرایش آدرس  </h5>
                        <button style="    margin-top: -21px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>

                    <div class="modal-body" id="edit_address_form" >
                      
                   <div class="loading">
                           <span class="icon"></span>
                           <span>در حال بارگذاری اطلاعات</span>
                       </div>
                     <div id="edit_address_form2">
                       
                     </div>
                    </div>


                </div>
            </div>
        </div>
     
        
{{--start modal--}}
@include('include.add_address',['ostans'=>$ostans])
{{--end modal--}}
        </div>
       
       
    </div>


    <?php $url = url('shop/get_shar');  ?>
    <?php $url2 = url('shop/add_address');  ?>
    <?php $url3 = url('shipping');  ?>
     <?php $url4 = url('shop/edit_address_form');  ?>


@endsection @section('footer')

<script type="text/javascript">
    function get_shar() {
        var html = '';
        var ostan_id = document.getElementById('ostan_id').value;
        $.ajax({
            url: '{{ $url }}',
            type: 'POST',
            data: {
                ostan_id: ostan_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(result) {

                for (i = 0; i < result.length; i++) {
                    html += '<option value="' + result[i].id + '">' + result[i].shar_name + '</option>';

                }
                $("#shar_id").html(html); //.selectpicker('refresh');
            }
        });
    }
    //================
    
//    $("#form_address").submit(function(event){
//        alert(event.keyCode);
//    });

</script>
<script>
function show_address_form() {
        $("#address_Modal").modal('show');
    }</script>

<script>
function add_address(){
                  
              var field_form =[
                  'full_name',
                  'phone',
                  'city_code',
                  'mobile',
                  'ostan_id',
                  'shar_id',
                  'address',
                  'zip_code'
              ];
                  
     for (var i=0;i<field_form.length;i++){
        $("#error_"+field_form[i]).html('');
    }
    
  $.ajax({
      url:'{{$url2}}',
      type:'POST',
      data:$("#address_form").serialize(),
      success:function(result){
          if(result=='ok'){
              window.location = '{{ $url3 }}';
          }else if(result=='error'){
              alert('خطا در ثبت اطلاعات');
          }
          else{
    
             
              
          $.each(result,function(key,value){
              $("#error_"+key).html(value);
              
          });
          }
      }
  });
}
   
</script>
     <script>
        function edit_address(address_id){
     $("#edit_address").modal('show');
     $(".loading").show();

     $.ajax({
      url:'{{$url4}}',
      type:'POST',
      data:{address_id:address_id,_token:'{{ csrf_token() }}'},
      success:function(result){

        if(result=='error'){
             $(".loading").hide();
             $("#edit_address").modal('hide');
        }else{
          $(".loading").hide('fast');
          $("#edit_address_form2").html(result);
      }
     }
  }); 
            
   }

   function update_address(){
             var field_form =[
                  'full_name',
                  'phone',
                  'city_code',
                  'mobile',
                  'ostan_id',
                  'shar_id',
                  'address',
                  'zip_code'
              ];
                  
     for (var i=0;i<field_form.length;i++){
        $("#error_edit_"+field_form[i]).html('');
    }
    
    var url= $("#update_address_form").attr('action');
 
  $.ajax({
      url:url,
      type:'POST',
      data:$("#update_address_form").serialize(),
      success:function(result){
          if(result=='ok'){
             // $("#edit_address").modal('hide');
            //$("#user_address_list").html(result);
                window.location = '{{ $url3 }}';  
          }else
            if(result=='error'){
              alert('خطا در ثبت اطلاعات');
          }
          else{
          $.each(result,function(key,value){
              $("#error_edit_"+key).html(value);
          });
          }
      }
  });
   
   }


   // delete user address
   function delete_address(id){
    if(!confirm('آیا برای حذف  مطمئن هستید؟'))
      return false;
    var url = '{{ url('shop/delete_address') }}';
    $.ajax({
      url:url + '/' + id,
      type:'post',
      data:{_token:'{{ csrf_token() }}'},
      success:function(data){
       if(data==1){
         window.location = '{{ $url3 }}'; 
        document.getElementById('message').className='success';
        // $("#message").html("با موفقیت حذف گردید ");
         
        //  setTimeout(function(){
        //  $("#message").fadeOut('slow');
        //  document.getElementById('message').className='';
        //  $("#message").html("");
        // },5000);
       }
      }
    });
   } 
 
  
   function set_address(id){
   document.getElementById('order_address').value = id;
   
   var c = document.getElementsByClassName("bgc-blue");
  for(var i=0;i<c.length;i++){
 
       c[i].className="bgc-white";
 }
   var c2 = document.getElementsByClassName("active_address_mark");
   var c3 = document.getElementsByClassName("mark");
  for(var j=0;j<c2.length;j++){
 
       c2[j].className="no_active_address_mark";
       c3[j].className="no_mark";
 }
    
     document.getElementById("label_" + id).className="bgc-blue";
     document.getElementById("active_address_mark_" + id).className="active_address_mark";
     document.getElementById("mark_" + id).className="mark";
    
   }

  function set_type(id){
    document.getElementById('order_type').value=id;
    
     var c = document.getElementsByClassName("bgc-blue2");
    for(var i=0;i<c.length;i++){
       c[i].className="bgc-white2";
 
       }
        document.getElementById("label-"+id).className="bgc-blue2";

          c2 = document.getElementsByClassName("order_mark");
          c3 = document.getElementsByClassName("active_order_type_mark");
         for(var j=0;j<c2.length;j++){
 


          c2[j].className="no_active_order_type_mark";
          c3[j].className="no_order_mark";

         }

    document.getElementById("mark-"+id).className="order_mark";
    document.getElementById("active_type_order_mark_"+id).className="active_order_type_mark";
  }

var t = document.getElementByTagName('p');
   t.className="bgc-blue"; 
  
   
   </script>
  
  
    

    

    
    
    
             
              
              
         
     
      

    
       

  
          
             
              
           
          
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
@stop
