<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobbies extends Model
{
    use HasFactory;

    protected $table = 'hobbies';

    protected $primaryKey= 'id';

    protected $fillable = [
        'hobbies'
    ];

    public function user_record(){
        return $this->belongsTo(user_record::class);
    }

}
