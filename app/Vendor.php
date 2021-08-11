<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable =['vendorName','vendorCompany','vendorPhone','vendorEmail',];
}
