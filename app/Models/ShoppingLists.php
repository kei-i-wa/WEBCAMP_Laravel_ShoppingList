<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingLists extends Model
{
    use HasFactory;
    
    //不許可リスト idは自動採番にする
    protected $guarded = ['id'];
}
