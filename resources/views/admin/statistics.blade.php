
@extends('layouts.admin')

@section('title','نمایش آمار بازدید فروشگاه   ')


@section('content')
<div class="box_div">
 <div class="my_title">
 	<span>نمایش آمار بازدید فروشگاه  </span>
 </div>

 
	<div id="chart" style="margin: 0 auto; direction:ltr;">
		
	</div>
<br>
  <table class="table table-bordered table-striped" style="width: 95%;margin: auto;">
    <?php 
     use App\lib\JDF;
     $jdf = new JDF();
     $day_total = $total_view[$jdf->tr_num($jdf->jdate('d'))];
    ?>
 
    <tr>
      <td>آمار بازدید امروز فروشگاه</td>
      
      <td>{{  $day_total }}</td>
    </tr>

    <tr>
      <td>آمار بازدید این ماه فروشگاه </td>
      
      <td>{{ array_sum($total_view) }}</td>
    </tr>

    <tr>
      <td>آمار بازدید این سال فروشگاه</td>
      
      <td>{{ $year_view }}</td>
    </tr>

    <tr>
      <td>آمار بازدید  کل فروشگاه</td>
      
      <td>{{  $total }}</td>
    </tr>
  </table>

 <?php   
$v ='';
$t_v ='';
$date='';
foreach ($total_view as $key => $value){ 
 $t_v.= $value.',';
 }

 foreach ($view as $key => $value){ 
 $v.= $value.',';
 
 }

 

?>

</div>


 
@stop

@section('footer')
 

<script type="text/javascript" src="{{ asset('layoutAdmin/js/highcharts.js') }}">

</script>

<script type="text/javascript">
	 
  
Highcharts.chart('chart', {
  chart: {
    type: 'line',
    style:{ 
    	fontFamily:'yekan'
    	 
    }
  },
  title: {
    text: 'مایش آمار بازدید فروشگاه  '
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: [ <?php 

 foreach ($date_list as $key => $value){ 
    echo '"'.$value.'",' ;
 
 }
     ?> ]
  },
  tooltip:{
  	formatter:function(){
  		if(this.series.name=="تعداد کل بازدید"){
  			return this.x+'<br>'+'تعداد کل بازدید : '+this.y+' نفر';
  		}else{
         return this.x+'<br>'+'تعداد بازدید یکتا  :'+this.y+' نفر';
  		}
  	}
  }
  ,legend:{
  verticalAlign:'top',
  y:30
  },
  yAxis: {
    title: {
      text: ' '
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: false
      },
      enableMouseTracking: true
    }
  },
  series: [{
    name: 'تعداد کل بازدید',
    data: [{{ $t_v }}],
    color:'green',
    
  }, {
    name: 'تعداد بازدید یکتا',
    data: [{{ $v }}],
      color:'blue',
      marker:{
      	symbol:'circle'
      }
  }]

});
 
</script>
@endsection