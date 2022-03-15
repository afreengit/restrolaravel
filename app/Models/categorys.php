<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorys extends Model
{
    use HasFactory;
    protected $table='categorys';
    protected $primaryKey='ct_id';
    protected $keyType = 'int';
    public $incrementing =true;

}
