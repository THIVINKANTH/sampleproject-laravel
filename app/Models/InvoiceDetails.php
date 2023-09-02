<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table = "invoicedetails";
    protected $fillable = ['invoiceid', 'itemname', 'hsn', 'quantity', 'unit', 'price', 'amount'];

    // public function invoicefor()
    // {
    //     return $this->belongsTo(Invoicemodel::class);
    // }
}
