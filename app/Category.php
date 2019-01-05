<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable = ['title_fa','title_en','parent_id','image'];
    protected $table = 'category';
    public $timestamps = false;
// ==========================================
    public function getChild(){
    	return $this->hasMany(Category::class,'parent_id','id');
    }
// ==========================================
     public function getParent(){
      return $this->hasOne(Category::class,'id','parent_id');

    }

    // ======================================
    public static function get_cat_list(){

    	 $cat = Category::where(['parent_id'=>0])->get();
           $cat_list[0] = 'چیزی انتخاب نشده است';
          foreach ($cat as $key => $value) {
            $cat_list[$value->id] = $value->title_fa;

             foreach ($value->getChild as $key2 => $value2) {
               $cat_list[$value2->id] = ' - ' . $value2->title_fa;
                foreach ($value2->getChild as $key3 => $value3) {
               $cat_list[$value3->id] = ' - - ' . $value3->title_fa;
            }}

        }

        return $cat_list;
    }




    public static function search($data){

        $string = "";
        $categories = Category::orderBy('id','ASC');

      if(sizeof($data) > 0)
           {
             if(array_key_exists('title_fa', $data) && array_key_exists('title_en', $data)){
                  $categories = $categories
                  ->where('title_fa','like','%'.$data['title_fa'].'%')
                  ->where('title_en','like','%'.$data['title_en'].'%');
                  $string = '?title_fa='.$data['title_fa'].
                               '&title_en='.$data['title_en'];
               }
           }
            return $categories->paginate(10)->withPath($string);
    }

    // ===============================
    public function categories(){
      return $this->belongsToMany(Product::class);
    }

    public static function get_show_child_cat($cat_id){

      $array = array();

      $cats = Category::where('parent_id',$cat_id)->get();

      foreach ($cats as $key => $value) {

        if(!array_key_exists($value->title_en, $array)){

          $array[$value->title_en]['id'] = $value->id;

          $array[$value->title_en]['title_fa'] = $value->title_fa;

        }

      }

        foreach ($array as $key => $value) {

          $id = $value['id'];

          $cat = Category::where('parent_id',$id)->first();

          if($cat){
            $e = explode('_', $cat->title_en);
            if(is_array($e)){
              if(sizeof($e)==0){

                if($e[0] == 'filter'){

                  $array[$key]['cat_child'] ='no';
                }
                else{
              $array[$key]['cat_child'] ='ok';
            }
              }
              else{
              $array[$key]['cat_child'] ='ok';
            }
            }
            else{
              $array[$key]['cat_child'] ='ok';
            }
          }else{
            $array[$key]['cat_child'] = 'no';
          }

        }

      return $array;

    }

}




