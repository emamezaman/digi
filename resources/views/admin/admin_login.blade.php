<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ورود به بخش مدریت فروشگاه دیجی آنلاین</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet/less" href="{{asset('css/main.less')}}">
</head>


<body>

<div class="admin_login">
 <div class="header_login">
     <h4>برای ورود کلیک نمائید</h4>
 </div>
   <div onclick="show_admin_form_login()" title="برای ورود کلیک نمائید" class="btn_admin_login">

   </div>

    {{--  begin modal --}}
    <div class="modal fade" id="admin_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ورود به بخش مدیت فروشگاه  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="register_form">
                        <form  method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <span>نام کاربری   </span>
                                <input type="text" name="username" class="form-control" placeholder="UserName" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <em class="red">{{ $errors->first('username') }}</em>
                                @endif
                            </div>
                            <div class="form-group">
                                <span>گذرواژه</span>
                                <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('pssword') }}">
                                @if ($errors->has('password'))
                                    <em class="red">{{ $errors->first('password') }}</em>
                                @endif
                            </div>
                            <div class="form-group">
                                <span>کد امنیتی</span> <span  class="pull-left">{!!captcha_img()!!}</span>
                                <input type="text" placeholder="Captcha Code" name="captcha" class="form-control" value="{{ old('captcha') }}">

                                @if ($errors->has('captcha'))
                                    <em class="red">{{ $errors->first('captcha') }}</em>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                مرا بخاطر بسپار
                            </div>



                            <div class="form-group">
                                <button type="submit" class="register_btn">ورود </button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        {{-- end modal --}}
</div>
</div>

</body>
</html>

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/less.min.js')}}"></script>
<script>
    function show_admin_form_login() {

      $("#admin_login").modal('show');
    }
</script>

    @if($errors->has('username') || $errors->has('password') || $errors->has('captcha') )
        <script>
            $("#admin_login").modal('show');
        </script>
    @endif


