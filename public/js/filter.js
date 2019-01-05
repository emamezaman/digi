

  add_filter = function(){
    var count = document.getElementsByClassName('product_filter_div').length+1;
   var id1= "'"+'filter_div_'+count+"'";
   var id2= '-'+count;
    var id3= "'"+'child_filter_'+"'";
  
   
   var html = '<p class="product_filter_div" id="filter_div_'+count+'">'+
     '<input type="text" class="my_input" name="filter_name[-'+count+']">'+ 
     '<input type="text" class="my_input" name="filter_ename[-'+count+']">'+ 
     '<select style="margin-right:10px;" id="filter_filed_'+count+'"  name="filter_filed[-'+count+']" class="my_input">'+
     '<option value="1">Radio</option><option value="2">Color</option></select></p>'+
     '<div><span style="color: red" onclick="add_child_filter('+id1+','+id2+','+id3+')" ><i class="icon-plus"></i></span></div>';
     $("#filter-box").append(html);
    }

    add_child_filter = function(id1,id2,id3){
      var filed_id = id1.replace('div','filed');
     var filed = document.getElementById(filed_id).value;

     var count = document.getElementsByClassName('child_filter').length+1;
     var div_id= id3+count;
     var div1='<p class="child_filter" id="'+ div_id +'"></p>';
     $("#" + id1).append(div1);
     if(filed=='1'){

       var input1='<input type="text" class="my_input" style="margin-top:10px;" name="filter_child['+id2+'][-'+count+']">';
      $("#" + div_id).append(input1);
     }else{
       var input1='<input type="text" class="my_input" style="margin-top:10px;" name="filter_child['+id2+'][-'+count+']">';
      var input2=document.createElement('input');
      input2.name='color_code['+id2+'][-'+count+']';
      input2.ClassName='color_input_code my_input';
  
      var color = new jscolor(input2);
     $("#" +div_id).append(input1);
     $("#" +div_id).append(input2);
 
     }
    }
     ///////////////////
     //script item page create
      add_item = function(){
    var count = document.getElementsByClassName('product_item_div').length + 1;
   var id1= "'"+'item_div_'+count+"'";
   var id2= '-'+count;
   var html = '<div class="product_item_div form-group" id="item_div_' + count + '">'+
      '<input type="text"  class="my_input" style="width: 300px;" name="item_name['+ id2 +']">'+
      '</div>'+
      '<div class="form-group"><span style="color: red" onclick="add_child_item('+id1+','+id2+')" ><i class="icon-plus"></i></span></div>';
     $("#item-box").append(html);
    }
     add_child_item = function(id1,id2){
     

     var count = document.getElementsByClassName('child_item').length + 1;
    
     var div1= '<div class="child_item " style="margin-top:15px;" id="child_item_'+count +'">'+
      '<input class="my_input" type="text" name="child_item_name['+id2+'][-'+count+']">'+
      '<select class="my_input" name="child_item_filed['+id2+'][-'+count+']">'+
      '<option value="1">Select</option>'+
      '<option value="2">Text</option>'+
      '<option value="3">TextArea</option>'+
      '</select>'+
     '</div>';
     $("#" + id1).append(div1);
   
    }
  
   


     





    

    