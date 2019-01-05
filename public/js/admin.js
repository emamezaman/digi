 var url ='http://localhost:8000';
// var public varable
var str_id='';
//script for send form for delete category
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
// =========================
  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
  // ============================
  // script for delete a image category
  function del_img(model,id,url,token)
{
	var route = url + '/';

	if(!confirm('آیا از حذف تصویر اطمینان دارید؟'))
		return false;

	var form = document.createElement("form");
	form.setAttribute('method','POST');
	form.setAttribute('action',route + id);

 var model1 = document.createElement('input');
  model1.setAttribute('name','model');
  model1.setAttribute('value',model);

  var hiddenField2 = document.createElement('input');
  hiddenField2.setAttribute('name','_token');
  hiddenField2.setAttribute('value',token);


  form.appendChild(model1);
	form.appendChild(hiddenField2);
	document.body.appendChild(form);
	form.submit();
	document.body.removeChild(form);
}
//--------------------------------------------------------
 change_img = function(src,id,token){
    var url2 =  url + '/' + 'admin/product/del_img';
    $("#main_img_1").attr('src',src);
    var click_value='del_img(\'ProductImage\',\''+id+'\',\''+url2+'\',\''+token+'\')';
    $("#main_img_1").attr('onclick',click_value);
    window.location="#top_gallery";
}
//======================================================================
   // ==========================================\
    //validation form save image product in view gallery
    Dropzone.options.UploadForm = {
  paramName: "file",
  maxFilesize: 2,
 acceptedFiles: ".JPG,.png",
 addRemoveLinks :true,
init:function(){
  this.options.dictRemoveFile="حذف",
  this.options.dictInvalidFileType='امکان آپلود این فایل وجود ندارد',
  this.on('success',function(file,response){
    if(response==1){
          file.previewElement.classList.add('dz-success');
    }else{
     file.previewElement.classList.add('dz-error');
     $(file.previewElement).find('.dz-error-message').text('خطا در آپلود فایل');
    }
  });
}
}
//js create  product page
//script for  add tag list for product
 function tag_list(){
  var count = document.getElementsByClassName('tag_list').length+1;
      var t = $("#taglist").val();
      var key_word = $("#keyword").val();

      var string = key_word;
      t = t.split(',');
      for   (i=0;i<t.length;i++){
          if(t[i].trim()!=''){
              var n = key_word.search(t[i]);
              if(n==-1){
                 var b='<div onclick="del_tag(\'t'+ count +'\',\''+t[i]+'\' )" id="t'+ count +'" class="tag_list"><span class="icon-remove"></span>'+t[i]+'</div>';
                  $("#tag_box").append(b);

                  string =string +','+ t[i];

              }
          }
      }

      $("#keyword").val(string);
      $("#taglist").val('');
  }
  ////script for  delete tag list for  a product
    function del_tag(d,v){

        $("#"+d).remove();
        var key_word1 = document.getElementById('keyword').value;//$("#keyword").val();
        var t = v +',';
        var t2 = ','+ v;
        var a = key_word1.replace(t,'');
        var b = a.replace(t2,'');

       document.getElementById('keyword').value = b;

        // $("#keyword").val(b);
    }

    //----------------------
    //script for add color for product
      function add_color() {
        var count = document.getElementsByClassName('color_input_name').length;
        var t = '-' + count;
        var html = '<div style="margin-bottom:10px;" id="color_div_' + count + '"></div>';
        var input1 = '<input type="text" class="color_input_name my_input " name="color_name['+ t +']">';
        var input2 = document.createElement('input');
        input2.setAttribute('name', 'color_code['+ t +']');
        input2.setAttribute('class', 'my_input  color_input_code');
        var color = new jscolor(input2);
        $("#color_box").append(html);
        $("#color_div_" + count).append(input1);
        $("#color_div_" + count).append(input2);

    }







// =================================
// script delete group records
function check(id) {
var x= str_id.search(id);
if( x == -1  ){
str_id = str_id + id + ',' ;
}else{
str_id = str_id.replace(id + ',' , '');
}}

function del(url)
{

  if(str_id.trim()=='') {return;}
  window.location = url + '?id=' + str_id;
}

//====================================================================================


  function set_status_comment(id,csrf){

      $("#status_comment_" + id).html('در حال انجام  درخواست  ...');

      var _url ='admin/ajax_set_status_comment';

      $.ajax({
        url:url + "/" + _url,
        type:'POST',
        data:{comment_id:id,_token:csrf},
        success:function(data){

          if(data=='ok'){

            $("#status_comment_" + id).css('color','green');

            $("#status_comment_" + id).html('تائید شده');

          }else if(data='no'){

             $("#status_comment_" + id).css('color','red');

             $("#status_comment_" + id).html('در انتظار تائید');

          }

        }
      });
}

/*-----------------------------------------------------------------------------------*/
  function set_status_question(id,csrf){

      var _url ='admin/ajax_set_status_question';

      $.ajax({
        url:url + "/" + _url,
        type:'POST',
        data:{ question_id:id,_token:csrf },

        success:function(data){

          if(data=='ok'){

            $("#box_status_question_" + id).css('border-color','lightgray');

            $("#label_status_question_" + id).html('تائید شده');


          }else if(data='no'){

             $("#box_status_question_" + id).css('border-color','red');

            $("#label_status_question_" + id).html('در انتظار تائید');


          }

        }
      });
}

function show_form_question(id){
  var c = document.getElementById('form_question_'+ id);
  $(".form_question").slideUp();
  if(c){
    if(c.style.display=='block'){

    $("#form_question_" + id).slideUp();

    }else{

      $("#form_question_" + id).slideDown();

    }
  }
}
//----------------------
function logout(token){
 if(!confirm('آیا برای خروج مطمئن هستید؟'))
        return false;

    var form = document.createElement("form");
    form.setAttribute('method','POST');
    form.setAttribute('action',url + '/' + 'logout');
    var hiddenField1 = document.createElement('input');
    hiddenField1.setAttribute('name','_token');
    hiddenField1.setAttribute('value',token);
    form.appendChild(hiddenField1);
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
   
}




