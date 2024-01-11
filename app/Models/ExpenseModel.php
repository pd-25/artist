<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ExpenseModel extends Model
{
    protected $table = 'expense';
    public $timestamps = false;
    use HasFactory;
}
