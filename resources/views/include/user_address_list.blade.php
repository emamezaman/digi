@foreach($address as $key=>$value)
            <table>
                <tr>
                    <td  class="first_td" rowspan="3">
                      <div class="active_address_rounded">
                        <label  class=" @if($key==0) bgc-blue @endif ">
                           @if($key==0)  <span></span>  @endif
                        </label>
                          
                      </div>

                      @if($key==0)
                        <div class="active_address_mark">
                          <span class="mark">
                            
                          </span>
                        </div>
                      

                      @endif
                    </td>
                    <td colspan="3"><span>{{$value->full_name}}</span></td>
                    <td rowspan="3" class="end_td">
                       <div class="div_td">
 
                            <div class="edit_address" onclick="edit_address({{$value->id}});">
                            <i class="fa fa-edit"></i>
                           </div>

                        <div class="delete_address">
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