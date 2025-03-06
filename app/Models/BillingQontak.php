<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingQontak extends Model
{
    protected $table = 'tbbilling_qontak'; 
    protected $primaryKey = 'cbillhnumber'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'cbillhnumber',
        'cbillhcustomerbillcd',
        'dbillhstartperiod',
        'dbillhdate',
        'dbillhendperiod',
        'fbillhnettvalue',
        'fbillhdpp',
        'fbillhppn',
        'ccust2vanumber',
        'fbillhtotal',
    ];
    protected $casts = [
    'cbillhnumber' => 'string',
];
}