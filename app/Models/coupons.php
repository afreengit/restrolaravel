<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupons extends Model
{
    use HasFactory;
    protected $table='coupons';
    protected $primaryKey='cp_id';
    protected $keyType = 'int';
    public $incrementing =true;
}
