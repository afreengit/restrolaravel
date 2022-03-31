<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliveryboys extends Model
{
    use HasFactory;
    protected $table='deliveryboys';
    protected $primaryKey='dl_id';
    protected $keyType = 'int';
    public $incrementing =true;
    protected $fillable=[
        'dl_name',
        'dl_mob',
        'dl_status'
    ];
}
