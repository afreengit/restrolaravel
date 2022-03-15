<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dishcarts extends Model
{
    use HasFactory;
    protected $primaryKey= 'dc_id';
    protected $keyType= 'int';
    public $incrementing=true;
    protected $fillable = [
        'u_id',
        'dd_id',
        'qty',
    ];
}
