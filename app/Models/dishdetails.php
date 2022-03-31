<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dishdetails extends Model
{
    use HasFactory;
    protected $table='dishdetails';
    protected $primaryKey='dd_id';
    protected $keyType = 'int';
    public $incrementing =true;
    protected $fillable = [
        'dd_portion',
        'dd_offerprice',
        'dd_price',
        'dd_status',
    ];

     public function dishmaster()
    {
        return $this->belongsTo(dishmasters::class);
    }
    // public function dcdd()
    // {
    //     return $this->hasMany('dishcarts');
    // }
}
