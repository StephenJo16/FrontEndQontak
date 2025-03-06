<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerQontak extends Model
{
    protected $table = 'tbcustomer_qontak'; 
    protected $primaryKey = 'ccustcode'; 
    protected $fillable = [
        'ccustcode',
        'ccustname',
        'ccust2loccode',
        'custaddress',
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
    ];

    protected $casts = [
        'ccustcode' => 'string',
        'dcustlastup' => 'datetime', 
    ];
}