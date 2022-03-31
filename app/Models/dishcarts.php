<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dishcarts extends Model
{
    use HasFactory;
    protected $table='dishcarts';
    protected $primaryKey= 'dc_id';
    protected $keyType= 'int';
    public $incrementing=true;
    protected $fillable = [
        'u_id',
        'dd_id',
        'qty',
    ];
    public function products()
    {
        // oneToMany Inverse / belongsTo 
        return $this->belongsTo(dishdetails::class,'dd_id','dd_id');
        // first dd_id is the FK in this table, second dd_id is the PK of the parent table ie. OWNER KEY
        // 1-final Model
        // 2-FK
        // 3-PK of final modal
    }
    public function dmname()
    {
        return $this->hasOneThrough(dishmasters::class,dishdetails::class,'dd_id','dm_id','dd_id','dm_id');
        // return $this->hasOneThrough(dishmasters::class,dishdetails::class,'dm_id','dm_id','dd_id','dd_id');
        // 1-final model
        // 2-intermediate model
        // 3-FK on the intermediate model
        // 4-FK on the final model
        // 5-local key
        // 6-local key of the intermediate model
    }


}
