@extends('layouts.site')

@section('content')
   <div class="register box row">
        
           <div class="header_register">
               <div>
                   <li></li>
                   <h5>ثبت نام در دیجی آنلاین</h5>
               </div>
           </div>
           <div class="row">
               <div class="col-md-6 col-sm-6 ">
                   <div class="register_form" >
                       <form  method="post" action="{{ route('register') }}">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <span>شماره همراه یا پپست  الکترونیک   </span>
                           <input type="text" name="username" class="form-control" placeholder="Phone Number Or Email" value="{{ old('username') }}">
                       @if ($errors->has('username'))
                         <em class="red">{{ $errors->first('username') }}</em>
                       @endif
                       </div>
                       <div class="form-group">
                           <span>گذرواژه</span>
                           <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('apssword') }}">
                       @if ($errors->has('password'))
                         <em class="red">{{ $errors->first('password') }}</em>
                       @endif
                       </div>
                               
                            <div class="form-group" >
                              <span>
                                تکرار گذرواژه 
                              </span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password" >
                                @if ($errors->has('password_confirmation'))
                         <em class="red">{{ $errors->first('password_confirmation') }}</em>
                       @endif
                             </div>

                      
                       
                       <div class="form-group">
                           <span>کد امنیتی</span> <span style="margin-left: 44px;" class="pull-left">{!!captcha_img()!!}</span>
                           <input type="text" placeholder="Captcha Code" name="captcha" class="form-control" value="{{ old('captcha') }}">
                          
                       @if ($errors->has('captcha'))
                         <em class="red">{{ $errors->first('captcha') }}</em>
                       @endif
                       </div>
                       <div class="form-group">
                         <button class="register_btn">ثبت نام در دیجی آنلاین</button>
                       </div>
                   </form>
                   </div>
               </div>
               <div class="col-md-6 col-sm-6">
                <div class="clearfix"></div>
                   <div class="li_register">
                     <ul>
                       <li>
                        <span class="icon icon_basket"></span>
                        <span>سریع  تر و ساده تر خرید کنید</span>
                      </li>
                       <li>
                        <span class=" icon icon_bag"></span>
                        <span>به سادگی سوابق خرید و فعالیت خود را مدریت کنید</span>
                      </li>
                       <li>
                        <span class="icon icon_list"></span>
                        <span>لیست علاقه مندی های خود را بسازید و تغییرات آن هار دنبال کنید</span>
                      </li>
                       <li>
                        <span class="icon icon_comment"></span>
                        <span>نقد ، برسی و نظرات خود را با دیگران به اشتراک بگذارید.</span>
                      </li>
                      <li>
                        <span class="icon icon_price"></span>
                        <span>در جریان قیمتهای ویژه و روز  محصولات قرار بگیرید</span>
                      </li>
                     </ul>
                   </div>
              </div>   
           </div>
        
   </div>
@endsection
