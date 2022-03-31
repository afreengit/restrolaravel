<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderstatus extends Model
{
    use HasFactory;
    protected $table='orderstatus';
    protected $primaryKey="os_id";
    protected $keyType = 'int';
    public $incrementing =true;
    protected $fillable = [
        'os_status',
    ];
}
