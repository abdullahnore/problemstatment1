<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{  
    //table
    
    use HasFactory;
    public function user_id()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function client_pro()
    {   
        
        return $this->hasMany('App\Models\project');
    }
}
