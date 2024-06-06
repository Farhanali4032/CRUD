<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_record extends Model
{
    use HasFactory;
    protected $table = "user_record";
    protected $primaryKey ="id";

    protected $fillable = [
        'fname',
        'email',
        'phoneNo',
        'age',
        'gander',
        'desc'
    ];

    public function subject(){
        return $this->belongsToMany(subject::class, 'subject_user_record');
    }

    public function userImage(){
        return $this->hasMany(user_images::class);
    }

    public function hobbies(){
        return $this->hasMany(Hobbies::class);
    }
}
