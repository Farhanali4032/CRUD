<?php

use App\Models\Category;

function allCate(){

    $categories = Category::all();

    return $categories;
}
function userName($id){
    $user = \App\Models\User::find($id);
    return $user->name;
}

function countUserRecords($id, $key = ''){
  if($key == 'all'){
    $count = \App\Models\user_record::all()->count();
  }else{
    $count = \App\Models\user_record::where('user_id', $id)->count();
  }
    return $count;
}

function stringClean($string){
    $string = strip_tags($string);
    return $string;
}
?>
