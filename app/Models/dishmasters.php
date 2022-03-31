<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class dishmasters extends Model
{
    use HasFactory;
    
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


     
}
