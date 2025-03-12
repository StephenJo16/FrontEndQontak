<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortalC3 extends Model
{
    protected $table = 'customer_bls_odoo_3_months';
    protected $primaryKey = 'ccustomer_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ccustomer_id',
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
        'dbillhmonths',
        'cbillhnumbers',
        'dbillhstartperiods',
        'dbillhdates',
        'dbillhendperiods',
        'fbillhnettvalues',
        'fbillhdpps',
        'fbillhppns',
        'fbillhtotals',
        'partner_name',
        'partner_email',
        'street',
        'blok',
        'number',
        'odoo_active',
        'odoo_id',
        'odoo_name',
        'odoo_amount_total',
        'odoo_service_type',
    ];

    protected $casts = [
        'ccustomer_id' => 'string',
        'odoo_active' => 'boolean',
        'dbillhmonths' => 'array',
        'cbillhnumbers' => 'array',
        'dbillhstartperiods' => 'array',
        'dbillhdates' => 'array',
        'dbillhendperiods' => 'array',
        'fbillhnettvalues' => 'array',
        'fbillhdpps' => 'array',
        'fbillhppns' => 'array',
        'fbillhtotals' => 'array',
    ];
}