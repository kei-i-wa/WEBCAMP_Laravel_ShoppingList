<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedShoppingList extends Model
{
    //public function user() {
      //  return $this->belongsTo(User::class);
    //}
    
    use HasFactory;
    //protected $guarded = [];
         protected $fillable = [
        'name',
        'id',
        'user_id',
    ];
}
