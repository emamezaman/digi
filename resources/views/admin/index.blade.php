 


@extends('layouts.admin')

@section('title','داشبورد')


@section('content')
<div class="box_div">
 <div class="my_title">
 	<span>پنل مدیریتی</span>
 </div>

 
	<div id="chart" style="margin: 0 auto; direction:ltr;">
		
	</div>
 <?php   
$price ='';
$count ='';
$date='';
foreach ($total_price as $key => $value){ 
 $price.= $value.',';
 }
 foreach ($order_count as $key => $value){ 
 $count.= $value.',';
 
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
    text: 'نمودار میزان فروش این ماه فروشگاه'
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
  		if(this.series.name=="میزان درامد"){
  			return this.x+'<br>'+'میزان درامد : '+this.y+' تومان';
  		}else{
         return this.x+'<br>'+'تعداد تراکنش   :'+this.y+' بار';
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
    name: 'میزان درامد',
    data: [{{ $price }}],
    color:'green',
    
  }, {
    name: ' تعداد تراکنش',
    data: [{{ $count }}],
      color:'blue',
      marker:{
      	symbol:'circle'
      }
  }]

});
 
</script>
@endsection