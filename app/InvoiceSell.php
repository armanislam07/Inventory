<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceSell extends Model
{
    protected $fillable = [
    					'invoice_no',
    					'customer_id',
    					'invoice_date',
    					'grand_total',
    					'paid_amount',
    					'due_amount'];
}
