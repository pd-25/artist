<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','style_id','placement_id','subject_id','image','title'];

    public function user () {
        return  $this->belongsTo(User::class, 'user_id', 'id'); 
    }
}
