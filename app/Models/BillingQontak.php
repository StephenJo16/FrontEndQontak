<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingQontak extends Model
{
    protected $table = 'tbbilling_qontak'; 
    protected $primaryKey = 'cbillhnumber';
    protected $casts = [
    'cbillhnumber' => 'string',
];
}