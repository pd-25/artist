<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;
    protected $fillable = ['banner_image', 'user_id'];

    public function artist()
    {
        return  $this->belongsTo(User::class, 'user_id', 'id');
    }
}
