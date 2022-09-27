<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function User(){
		return $this->belongsTo('App\Models\User');
    }

    public function Tag(){
		return $this->belongsTo('App\Models\Tag');
    }
}
