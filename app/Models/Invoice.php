<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'postcode',
        'total_price',
        'payment_status',
        'message',
        'traking_no',
        'user_id',
    ];
    // shipping_method ==== add hote pare may be
    public function orderItem(){
        return $this->hasMany(InvoiceProduct::class);
    }
}
