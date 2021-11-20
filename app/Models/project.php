<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    public function project_id()
    {
        return $this->belongsTo('App\Models\client');
    }
  
}
