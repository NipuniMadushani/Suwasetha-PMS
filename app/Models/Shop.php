<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
   
    
    
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    
    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
    
     
}
