<html>
<head>
    <link rel="stylesheet" href="css/a.css">
<style type="text/css">


label.cabinet {
width: 79px;
height: 22px;
background: url(btn-choose-file.png) 0 0 no-repeat;
display: block;
overflow: hidden;
cursor: pointer;
}

    label.cabinet input.file {
        position: relative;
        height: 100%;
        width: auto;
        opacity: 0;
        -moz-opacity: 0;
        filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
    }
    .aa{
         color: red;;
    }
</style>
</head>
<body>

<div class="label-style  ">Please select the documents to import : </div>
<form name="import_form" action='<%= request.getParameter("bps_url") %>/http/upload_archive' method="post" enctype="multipart/form-data">
    <label class="cabinet">
        <input type="file" class="file" name="zip_file_import" />
    </label>
    <label class="cabinet">
        <input type="file" class="file" name="manifest_file_import" />
        انتخاب تصویر
    </label>

    <input type="submit" value="Upload" class="button-style" />
<a href="http://"></a>
<section></section>
<div>
    <ul>
        <a href="">
            <span><i></i></span>
        </a>
    </ul>
</div>
<div class="col">
    <ul class="ol">
        <li class="list ">
            <a href="" id="ww"></a>


        </li>
    </ul>
</div>
</form>
</body>
</html>
