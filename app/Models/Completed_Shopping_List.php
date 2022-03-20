<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed_Shopping_List extends Model
{
    use HasFactory;
    //protected $guarded = [];
         protected $fillable = [
        'name',
        'id',
        'user_id',
    ];
}
