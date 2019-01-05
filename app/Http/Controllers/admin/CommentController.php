<?php

 
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Score;
use App\ProductComment;
use App\Http\Controllers\Controller;
class CommentController extends Controller
{
    public function index(){

    	$scores = Score::with('get_comment')
    	->orderBy('id','DESC')
    	->paginate(10);
    	
    	return view('admin.comment.index',compact('scores'));
   
    }

    public function set_status(Request $request){
      $id = $request->comment_id;
      $comment = ProductComment::findOrFail($id);
      $comment->status= ($comment->status==1) ? 0 : 1;
      $comment->save();
      if($comment->status==1){
      	return 'ok';
      }
      return 'no';

      
    }

    public function remove_comment($id){
    	$comment = ProductComment::findOrFail($id);
    	$comment->delete();
    	return redirect()->back();
    }

    public function remove_score($id){
    	
    	$Score = Score::findOrFail($id);
    	$Score->delete();
    	return redirect()->back();
    }

   
    
}
