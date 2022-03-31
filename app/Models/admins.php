<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    use HasFactory;
    protected $table='admins';
    protected $primaryKey='ad_id';
    protected $keyType = 'int';
    public $incrementing =true;
    protected $fillable = [
        'ad_uname',
        'ad_pwd',
        'ad_email',
        'ad_status',
        'ad_lastlogin',
    ];
}
