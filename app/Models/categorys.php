<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\dishmasters;

class categorys extends Model
{
    use HasFactory;
    //use Model;
    protected $table='categorys';
    protected $primaryKey='ct_id';
    protected $keyType = 'int';
    public $incrementing =true;
<<<<<<< HEAD
    protected $fillable = ['ct_name','ct_order','ct_status'];

    public function dishmaster()
{
     return $this->hasMany(dishmasters::class,"ct_id");
}

=======
    protected $fillable = [
        'ct_name',
        'ct_order',
        'ct_status',
    ];
 
>>>>>>> 53b84cef6e7d3eb86387ac4b933a4c1aa9c99fa5
}
