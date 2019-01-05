<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\product;
class QuestionController extends Controller
{
    public function index(){
    	$questions = Question::with(['get_user','get_answers2','get_product'])

    	->orderBy('id','DESC')->paginate(10);

    	return view('admin.question.index',compact('questions'));
    }

     public function set_status(Request $request){
      $id = $request->question_id;
      $question = Question::findOrFail($id);
      $question->status= ($question->status==1) ? 0 : 1;
      $question->save();
      if($question->status==1){
      	return 'ok';
      }
      return 'no';

      
    }

    public function remove_question($id){
    	$question = Question::findOrFail($id);
    	$question->delete();
    	return redirect()->back()->with('msg','با موفقیت  حذف گردید');
    }

     public function add_answers(Request $request){
      $request->validate(['question'=>'required'],[],['question'=>'متن پاسخ']);
      $product_id = $request->product_id;
      $parent_id = $request->parent_id;
      $product = Product::findOrFail($product_id);
      $question = Question::findOrFail($parent_id);
      $time = time();
      $user_id = \Auth::id();
      $new_question = new Question($request->all());
      $new_question->time = $time;
      $new_question->user_id = $user_id;
      $new_question->status = 1;
      $new_question->save();
        return redirect()->back();

    }
}
