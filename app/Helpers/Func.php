<?php

use App\Models\Category;

function allCate(){

    $categories = Category::all();
    
    return $categories;
}

?>