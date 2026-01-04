<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = ['date','amount','head','created_by'];
    public function user(){ return $this->belongsTo(User::class, 'created_by'); }
}

