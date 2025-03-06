<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerQontak extends Model
{
    protected $table = 'tbcustomer_qontak'; 
    protected $primaryKey = 'ccustcode';
    protected $casts = [
    'ccustcode' => 'string',
];
}