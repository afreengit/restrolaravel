<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordermasters extends Model
{
    use HasFactory;
    protected $table='ordermasters';
    protected $primaryKey='om_id';
    protected $keyType = 'int';
    public $incrementing =true;
    protected $fillable=[
        'om_totalprice',
        'om_paymentmode',
        'om_phone',
        'om_address',
        'om_location',
        'om_paymentstatus',
        'om_orderstatus',
    ];
}
