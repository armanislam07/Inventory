<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetaile extends Model
{
    protected $fillable = [
    					'invoice_no',
    					'customer_id',
    					'cat_id',
    					'product_id',
    					'chalan_id',
    					'quantity',
    					'discount',
    					'discount_type',
    					'sub_total'];
}
