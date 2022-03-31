<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class dishmasters extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
   protected $table='dishmasters';
   protected $primaryKey="dm_id";
   protected $fillable = ['dm_name','dm_description','dm_type','dm_image','dm_status',];

    public function category()
    {
     return $this->belongsTo(categorys::class,'ct_id','ct_id');
    }

     public function dishdetail()
    {
     return $this->belongsTo(dishdetails::class,'dm_id','dm_id');
    }


     
=======
    protected $table='dishmasters';
    protected $primaryKey="dm_id";
    protected $keyType= 'int';
    public $incrementing=true;
    protected $fillable = [
        'dm_name',
        'dm_description',
        'dm_type',
        'dm_image',
        'dm_status',
    ];

    public function dishdetail()
    {
        return $this->hasMany(dishdetails::class,"dm_id");
    }
    // public function dc()
    // {
    //     return $this->hasManyThrough(dishdetails::class,dishcarts::class);
    // }
>>>>>>> 53b84cef6e7d3eb86387ac4b933a4c1aa9c99fa5
}
