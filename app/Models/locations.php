<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    use HasFactory;
    protected $table='locations';
    protected $primaryKey='lo_id';
    protected $keyType = 'int';
    public $incrementing =true; 
    protected $fillable=[
        'lo_name',
        'lo_status',
        'lo_deliverycharge',
    ];
}
