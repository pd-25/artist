<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','artist_id','color','description','size'];

    public function normalUser(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function artist(){
        return $this->belongsTo(User::class, 'artist_id','id');
    }
}
