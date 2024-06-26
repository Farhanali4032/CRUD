<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_images extends Model
{
    use HasFactory;
    protected $table = "user_images";
    protected $primaryKey = "image_id";
    
    protected $fillable = [
        'user_id ',
        'image_name'
    ];

    public function user_record(){
        return $this->belongsTo(user_record::class);
    }

}
