<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
    
    public function invoice(){
    	return $this->hasMany(Invoice::class);
    }
    
    public function invoice_pay(){
    	return $this->hasMany(InvoicePay::class);
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
