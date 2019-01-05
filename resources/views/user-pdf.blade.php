<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
 <style type="text/css">
 	
	body{
		
direction: rtl;
text-align: right;
}
p,span{
	 background: green; color: red;
}

}
}
 </style>

 </head>
<body>
@foreach($users as $key=>$user)
<p>
	<SPAN>{{$user->username}}</SPAN><span>نام کاربری :</span>
	
</p>
<p><SPAN>{{$user->password}}</SPAN><span>رمز عبور :</span></p>
<hr>
@endforeach

</body>
</html>