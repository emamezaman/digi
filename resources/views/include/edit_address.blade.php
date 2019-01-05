


<form onsubmit="return false;"  action="{{ url('shop/update_address').'/'.$address->id }}" method="post" id="update_address_form">
 {{ csrf_field() }}
<div class="tbl_addrees">
<div class="table-responsive">
<table class="table">
<tbody>
<tr>
<td colspan="2">
<div class="form-group">
<label>   نام و نام خانوادگی</label>

<input id="full_name" value="{{ $address->full_name }}" type="text" name="full_name" class="form-control">
</div>

</td>
</tr>
<tr>
<td  colspan="2">

<span id="error_edit_full_name" class="red">


</span> 
</td>
</tr>

<tr>
<td>
<div class="form-group">
<label> انتخاب استا ن  </label>
<select name="ostan_id" onchange="get_shar()"  class="form-control " id="ostan_id">
<option value="">انتخاب استان</option>
@foreach ($ostans as $ostan)
<option value="{{ $ostan->id }}"
  @if( $address->ostan_id==$ostan->id) selected @endif 
 
>{{ $ostan->ostan_name }} </option>
@endforeach
</select>
</div>

</td>
<td>
<div class="form-group">
<label>انتخاب شهر</label>
<select name="shar_id" class="form-control"  id="shar_id">
@foreach ($citys as $key=>$value)
<option value="{{ $value->id }}"

  @if( $address->shar_id==$value->id) selected @endif     
>{{ $value->shar_name }}</option>

@endforeach

</select>
</div>



</td>
</tr>
<tr>
<td>

<span id="error_edit_ostan_id" class="red"> </span>  
</td>
<td>

<span id="error_edit_shar_id" class="red"> </span> 
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label>تلفن ثابت</label>
<input type="tetx" id="phone" value="{{ $address->phone }}" name="phone" class="form-control"></div>

</td>
<td>
<div class="form-group">
<label>کد شهر</label>

<input type="tetx" value="{{ $address->city_code }}" id="city_code" name="city_code" class="form-control"></div>

</td>
</tr>
<tr>
<td>

<span id="error_edit_phone" class="red"> </span>  
</td>
<td>

<span id="error_edit_city_code" class="red"> </span>  
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label>شماره موبایل</label>
<input type="tetx" id="mobile" value="{{ $address->mobile }}" name="mobile" class="form-control"></div>

</td>
<td>
<label>کد پستی</label>
<div><input value="{{ $address->zip_code }}" type="tetx" id="zip_code" name="zip_code" class="form-control"></div>

</td>
</tr>
<tr>
<td>

<span id="error_edit_mobile" class="red"> </span>  
</td>
<td>

<span id="error_edit_zip_code" class="red"> </span>  
</td>
</tr>
<tr>
<td colspan="2">
<label>آدرس</label>
<div>
<textarea id="address"  name="address" class="form-control">
{{ $address->address }}
</textarea>
</div>

</td>
</tr>
<tr>
<td colspan="2">

<span id="error_edit_address" class="red"></span> 
</td>
</tr>
<tr>
<td colspan="2">
<input type="button" onclick="update_address()" value=" ویرایش  آدرس" class="btn btn-primary" name="">
</td>
</tr>
</tbody>
</table>
</div>
</div>
</form>
