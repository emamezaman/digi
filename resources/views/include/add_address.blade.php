<div class="modal fade" id="address_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> آدرس جدید </h5>
<button style="    margin-top: -21px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form id="address_form" onsubmit="add_address();return false;" id="form_address" action="{{ url('shop/add_address') }}" method="post">
{{csrf_field()}}

<div class="tbl_addrees">
<div class="table-responsive">
<table class="table">
<tbody>
<tr>
<td colspan="2">
<div class="form-group">
<label>   نام و نام خانوادگی</label>

<input id="full_name" type="text" name="full_name" class="form-control">
</div>

</td>
</tr>
<tr>
<td  colspan="2">

<span id="error_full_name" class="red">


</span> 
</td>
</tr>

<tr>
<td>
<div class="form-group">
<label> انتخاب استا ن  </label>
<select name="ostan_id" onchange="get_shar()" data-live-search="true" class="form-control " id="ostan_id">
<option value="">انتخاب استان</option>
@foreach ($ostans as $ostan)
<option value="{{ $ostan->id }}">{{ $ostan->ostan_name }} </option>
@endforeach
</select>
</div>

</td>
<td>
<div class="form-group">
<label>انتخاب شهر</label>
<select name="shar_id" class="form-control"  id="shar_id"><option value="">انتخاب شهر</option></select>
</div>



</td>
</tr>
<tr>
<td>

<span id="error_ostan_id" class="red"> </span>  
</td>
<td>

<span id="error_shar_id" class="red"> </span> 
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label>تلفن ثابت</label>
<input type="tetx" id="phone" name="phone" class="form-control"></div>

</td>
<td>
<div class="form-group">
<label>کد شهر</label>

<input type="tetx" id="city_code" name="city_code" class="form-control"></div>

</td>
</tr>
<tr>
<td>

<span id="error_phone" class="red"> </span>  
</td>
<td>

<span id="error_city_code" class="red"> </span>  
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label>شماره موبایل</label>
<input type="tetx" id="mobile" name="mobile" class="form-control"></div>

</td>
<td>
<label>کد پستی</label>
<div><input type="tetx" id="zip_code" name="zip_code" class="form-control"></div>

</td>
</tr>
<tr>
<td>

<span id="error_mobile" class="red"> </span>  
</td>
<td>

<span id="error_zip_code" class="red"> </span>  
</td>
</tr>
<tr>
<td colspan="2">
<label>آدرس</label>
<div>
<textarea id="address" name="address" class="form-control"></textarea>
</div>

</td>
</tr>
<tr>
<td colspan="2">

<span id="error_address" class="red"></span> 
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="ثبت آدرس" class="btn btn-success" name="">
</td>
</tr>
</tbody>
</table>
</div>
</div>
</form>
</div>


</div>
</div>
</div>