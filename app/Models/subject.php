<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $table = 'subject_seeder';
    protected $primaryKey = 'id';


    public function user_record() {
        return $this->belongsToMany(User::class, 'subject_user_record');
    }

}
