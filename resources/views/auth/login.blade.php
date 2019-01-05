@extends('layouts.site')

@section('title','ورود به دیجی آنلاین')

@section('content')


<div id="page_login" class=" box">
    <div class="row">
        <div class="col-md-6 col-sm-6">
           <div class="login">
             <span class="icon_lock icon"></span>
             <h5>عضو دیجی آنلاین هستید؟</h5>
             <p>برای تکمیل فرایند خرید خود وارد شوید</p>
             <input type="button" onclick="show_login_form()" name="" class="btn btn-primary" value="ورود به دیجی آنلاین">
           </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="register">
                <span class="icon_user icon"></span>
                <h5>تازه وارد هستید؟</h5>
              <p>برای تکمیل فرایند خرید خود وارد شوید</p>
              <p><button class="btn btn-success" >ثبت نام در دیجی آنلاین</button></p>
              <p>
                  با عضویت در دیجی آنلاین تجربه متفاوتی از خرید اینترنتی داشته باشید. 
             <br>
          وضعیت سفارش خود را پیگیری نمائید و سوابق خریدتان را مشاهده کنید.</p>
            </div>
        </div>
    </div>
    {{--  begin modal --}}
    <div class="modal fade" id="login_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ورود به دیجی آنلاین</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="register_form">
                       <form  method="post" action="{{ route('login') }}">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <span>شماره همراه یا پست  الکترونیک   </span>
                           <input type="text" name="username" class="form-control" placeholder="Phone Number Or Email" value="{{ old('username') }}">
                       @if ($errors->has('username'))
                         <em class="red">{{ $errors->first('username') }}</em>
                       @endif
                       </div>
                       <div class="form-group">
                           <span>گذرواژه</span> <a href="" class="forget">گذر واژه خودم را فراموش کردم؟</a>
                           <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('apssword') }}">
                       @if ($errors->has('password'))
                         <em class="red">{{ $errors->first('password') }}</em>
                       @endif
                       </div>
        <div class="form-group">
        <input class="form-check-input" type="checkbox" name="remember" 
        id="remember" {{ old('remember') ? 'checked' : '' }}>
        مرا بخاطر بسپار
        </div>
                     
                      
                  
        <div class="form-group">
          <button type="submit" class="register_btn">ثبت نام در دیجی آنلاین  </button>
         
          </div>
</form>
    </div>
      </div>
      <div class="modal-footer">
        <span>قبلا در دیجی آنلاین ثبت نام نکرده اید؟</span>
        <a href="{{ url('register') }}">ثبت نام در دیجی آنلاین  </a>  </div>
     
  </div>
</div> 
</div>
    {{-- end modal --}}
</div>
 
 <div id="show_form">
     
 </div>


 

@endsection
@section('footer')
<script type="text/javascript">
    function show_login_form(){
     
          $.ajax({
          url:'{{ url('site/auth_check') }}', 
          type:'POST',
          data:{_token:'{{ csrf_token() }}' }, 
          success:function(r){
         $("#show_form").html(r);
         }
         });
    }
</script>

@if($errors->has('username') || $errors->has('password') )
  <script>  $("#login_Modal").modal('show');</script>
@endif
@stop
           
              
           
                
