<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoicemodel extends Model
{
    use HasFactory;
    protected $table = "invoice";
    protected $fillable = ['id', 'invoicecompanyname', 'address', 'contact'];

    // public function invoiceforrign()
    // {
    //     return $this->hasMany(InvoiceDetails::class);
    // }
}
