<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
   
    
    public function medicine(){
    	return $this->belongsTo(Medicine::class);
    }
    
   
    
}
