<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    use HasFactory;
    protected $table= 'orderdetails';
    protected $primaryKey='od_id';
    protected $keyType= 'int';
    public $incrementing=true;
    protected $fillable = [
        'od_id',
        'od_price',
        'od_quantity',
    ];
}
