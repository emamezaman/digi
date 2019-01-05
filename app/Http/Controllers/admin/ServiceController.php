<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Service;
use App\lib\jdf;
use App\Color;
use DB;
use App\Http\Requests\ServiceRequest;
class ServiceController extends Controller
{
	public $product;
	public $product_id;
	public function __construct(Request $request)
	{
		if(!$request->isMethod('DELETE') && !$request->ajax()){
	    $id = $request->product_id;
		$this->product = Product::findOrFail($id);
		$this->product_id = $id;	
		}
		
	}

    public function index(){

    // $jdf = new JDF();
    // return $jdf->jdate('Y-m-d',time());

    	$service = Service::where(['parent_id'=>null,'product_id'=>$this->product_id])->orderBy('id','DESC')->paginate(10);
    	return view('admin.service.index',['product'=>$this->product,'service' => $service]);
    }

     public function create(){

    	return view('admin.service.create',array('product' =>$this->product));
    }

    public function store(ServiceRequest $request){

    	$service = new Service($request->all());
    	$service->saveOrFail();
    	$url = 'admin/service'.'/'.$service->id.'/edit?product_id='.$this->product_id;
    	return redirect($url);
    }

    public function edit($id){
    	$service = Service::findOrFail($id);
    	return view('admin.service.edit',array('service'=>$service));
    }

    public function update(ServiceRequest $request , $id){
        $message = 'خطا در ویرایش گارانتی';
    	$service =  Service::findOrFail($id);
    	$service->service_name = $request->service_name;
    	if($service->update()){
         $message = 'ویرایش با موفقیت انجام شد';
    	}
    	return redirect()->back()->with(['message'=>$message]);
    }

    public function show($id){
    	$service = Service::with(['get_color','get_service'])->findOrFail($id);
    	return view('admin.service.show',['service'=>$service,'product'=>$this->product]);
    }


    public function destroy($id){
         
         $service= Service::findOrFail($id);
         $service->delete();
         Service::where('parent_id',$service->id)->delete();
    	return redirect()->back();
    }

    public function get_price(Request $request){
    	   $date = $request->date;
    	   $service_id = $request->service_id;
    	   $product_id = $request->product_id;
    	   $product_color = Color::where('product_id',$product_id)->get();
    	   $service_price = Service::where(['parent_id'=>$service_id,'product_id'=>$product_id,'date'=>$date])->pluck('price','color_id')->toArray();

    	   return view('admin.service.add_price',['date'=>$date,'product_id'=>$product_id,'service_id'=>$service_id,'product_color'=>$product_color,'service_price'=>$service_price]);
    	    

    }

  public function set_price(Request $request){
    $jdf = new JDF();
    $color = $request->color;
    $date = $request->date;
    $service_id = $request->service_id;
    $product_id = $request->product_id;
    $d = explode('-', $date);
   
    $time = $jdf->jmktime('0','0','0',$d[1],$d[2],$d[0]);

    if(is_array($color)){

		DB::table('service')->where(['parent_id'=>$service_id,'product_id'=>$product_id,'date'=>$date])->delete();
    	foreach ($color as $key => $value) {
    		if(!empty($value)){
    			DB::table('service')->insert([
             'parent_id'=>$service_id,
             'product_id'=>$product_id,
             'date'=>$date,
             'time'=>$time,
             'color_id'=>$key,
             'price'=>$value,
             'service_name'=>'-'
    		]);
    		}
    	}
    }
 return redirect()->back();
  }


}