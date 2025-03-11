<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerBilling extends Model
{
    protected $table = 'customerbilling'; 
    protected $primaryKey = 'ccustcode'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'ccustcode',
        'ccustname',
        'custaddress',
        'ccust2loccode',
        'ccustemail',
        'ccustphone',
        'ccust2vanumber',
        'ccust2provider',
        'ccust2bank',
        'ccust2mobile1',
        'ccust2mobile2',
        'ccust2email1',
        'ccust2type',
        'ccuststatus',
        'dcustlastup',
        'cbillhnumber',
        'dbillhstartperiod',
        'dbillhdate',
        'dbillhendperiod',
        'fbillhnettvalue',
        'fbillhdpp',
        'fbillhppn',
        'fbillhtotal',
    ];

    protected $casts = [
        'ccustcode' => 'string',
        'cbillhnumber' => 'string',
    ];
}